CREATE OR REPLACE FUNCTION update_peta_jsondata(v_peta_id integer)
    RETURNS void AS
$BODY$
DECLARE
    v_latest_pv_id INT;
    v_jsondata     TEXT;
    v_tablename    VARCHAR;


BEGIN

    SELECT versi_peta, nama_tabel
    FROM peta
    WHERE peta.id = v_peta_id
    INTO v_latest_pv_id, v_tablename;

    EXECUTE format('
    SELECT jsonb_build_object(
      ''type'',     ''FeatureCollection'',
      ''features'', jsonb_agg(feature)
    )
    FROM (
      SELECT jsonb_build_object(
        ''type'',       ''Feature'',
        ''lid'', ' || v_peta_id || ',
         ''gid'',         gid,
        ''geometry'',   ST_AsGeoJSON(geom)::JSONB,
        ''properties'', to_jsonb(row) - ''gid'' - ''geom''
      ) AS feature
      FROM (SELECT * FROM ' || v_tablename || ') row
    ) AS features;
    ') INTO v_jsondata;

    INSERT INTO peta_jsondata(peta_id, peta_version, jsondata)
    VALUES (v_peta_id, v_latest_pv_id, v_jsondata)
    ON CONFLICT(peta_id)
        DO UPDATE SET peta_version = v_latest_pv_id, jsondata = v_jsondata;

END;
$BODY$
    LANGUAGE 'plpgsql' VOLATILE
                       COST 100;