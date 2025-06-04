CREATE OR REPLACE FUNCTION on_peta_update()
    RETURNS trigger AS
$BODY$
DECLARE
    old_pv_id INT;
    new_pv_id INT;

BEGIN
    SELECT peta_id
    FROM peta_jsondata
    WHERE peta_id = OLD.id
    INTO old_pv_id;

    SELECT versi_peta
    FROM peta
    WHERE peta.id = OLD.id
    INTO new_pv_id;

--     IF old_pv_id <> new_pv_id THEN
    PERFORM update_peta_jsondata(OLD.id);
--     END IF;

    RETURN OLD;
END;
$BODY$
    LANGUAGE 'plpgsql' VOLATILE
                       COST 100;

DROP TRIGGER IF EXISTS peta_update ON peta;
CREATE TRIGGER peta_update
    AFTER UPDATE
    ON peta
    FOR EACH ROW
EXECUTE PROCEDURE on_peta_update();