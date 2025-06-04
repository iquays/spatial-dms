/**
 * Created by syauqi on 09-Sep-16.
 */
// by SQ


jQuery(function ($) {

    var osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a>',
        maxZoom: 19,
        edgeBufferTiles: 1,
    });

    var Esri_WorldImagery = L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; <a href="http://www.openstreetmap.org/copyright">Esri</a>',
        edgeBufferTiles: 1,
        maxZoom: 17,
    });

    var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
        maxZoom: 17,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)',
        // edgeBufferTiles: 1
    });

    var RBI_Indonesia = L.tileLayer('http://portal.ina-sdi.or.id/arcgis/rest/services/IGD/RupabumiIndonesia/MapServer/tile/{z}/{y}/{x}', {
        maxZoom: 15,
        edgeBufferTiles: 1
    });

    var map = new L.Map('map', {
        minZoom: 3,
        doubleClickZoom: false,
        zoomControl: false,
        preferCanvas: true,
        layers: [osm]
    }).setView([-7.000, 111.900], 8);

    // create a zoom control using LeafletZoomBar
    if (enableZoomBar) {
        new L.Control.ZoomBar({position: 'topright'}).addTo(map);
    }


    // create a distance measurement using LeafletPolylineMeasure
    if (enablePolylineMeasure) {
        L.control.polylineMeasure({
            draw: false,
            position: 'topright',
            measureControlTitleOn: 'Aktifkan Penghitung Jarak',
            measureControlTitleOff: 'Nonaktifkan Penghitung Jarak'
        }).addTo(map);
    }

    // create Browser Print button and add to the map
    if (enableBrowserPrint) {
        L.browserPrint({position: 'topright', title: 'Cetak Peta'}).addTo(map);
    }

    // Create MiniMap control //
    var rect1 = {color: "#ff1100", weight: 3};
    var rect2 = {color: "#0000AA", weight: 1, opacity: 0, fillOpacity: 0};
    if (enableMinimap) {
        var Esri_WorldStreetMap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012',
        });
        new L.Control.MiniMap(Esri_WorldStreetMap, {
            aimingRectOptions: rect1,
            shadowRectOptions: rect2,
            toggleDisplay: true,
            // minimized: true,
            // collapsedWidth: 44,
            // collapsedHeight: 44
            // autoToggleDisplay: true
        }).addTo(map);
    }

    // Create scale control
    if (enableScaleControl) {
        L.control.graphicScale({
            fill: 'hollow',
            showSubunits: false
        }).addTo(map);
    }

    // Create layers selection control
    if (enableLayerControl) {
        var baseLayers = {"Peta Jalan": osm, "Peta Satelit": Esri_WorldImagery, "Peta Rupa Bumi": RBI_Indonesia};
        L.control.layers(baseLayers, null, {
            position: 'bottomleft',
            collapsed: false
        }).addTo(map);
    }


    // Layer Control Operation
    // Show and Hide Layer Sidebar
    $("#layer-sidebar-toggle").click(function () {
        $(this).toggleClass('layer-sidebar-hide btn-outline-danger btn-primary')
            .children('i').toggleClass('fa-chevron-left fa-chevron-right');
        $('#layer-sidebar').toggleClass('collapsed');
    });

    $('#layer-modal-toggle').click(function () {
        $("#layerModal").appendTo("body").modal('show');
    });

    // Add Layer Modal
    $('.add-layer-modal-button').click(function () {
        if (!$('#' + this.value).length > 0) {
            $('.layer-list-container').prepend(
                '<div class="media align-items-center">' +
                '                        <div class="col col-12 custom-control custom-checkbox media-body pr-0">' +
                '                            <input type="checkbox" value=' + this.value +
                '                                   id=' + this.value +
                '                                   data-map_layer_id=' + this.dataset.map_layer_id +
                '                                   class="checkbox-layer custom-control-input">' +
                '                            <label for=' + this.value + ' class="custom-control-label"> ' +
                '                                <strong>' + this.name + '</strong> ' +
                '                            </label>' +


                '                        </div>' +
                '                        <button data-tablename=' + this.value +
                '                               class="pr-2 pl-2 pull-right fa fa-trash btn btn-danger remove-layer" title = "Remove Layer" >' +
                '                        </button>' +
                // '                        <button class="pr-2 pl-2 pull-right fa fa-arrows btn btn-info rearrange-layer" title = "Rearrange Layer" >' +
                // '                        </button>' +
                '                    </div>'
            )
            ;
            $('#' + this.value).click();
        }
    });

    // Show and hide map layer
    var customLayers = {};
    // $(".checkbox-layer").change(function () {
    $("body").on('change', '.checkbox-layer', function () {
        layerName = this.id;
        layerId = this.dataset.map_layer_id;
        // console.log(randomColor());
        if (this.checked) {
            if (typeof(customLayers[layerName]) == "undefined") {
                customLayers [layerName] = layerName;
                // console.log(customLayers[layerName]);
                $.ajax({
                    dataType: 'json',
                    url: homeUrl + "map/getlayer?mapLayerId=" + layerId
                }).done(function (response) {
                    // console.log(response);
                    customLayers[layerName] = new L.GeoJSON(response, {
                        color: randomColor(),
                        fillOpacity: 0.5,
                        // style: getKecamatanStyle,
                        // pane: 'paneKecamatan',
                        onEachFeature: onEachFeature
                    });
                    map.addLayer(customLayers[layerName]);
                });
            } else {
                map.addLayer(customLayers[layerName]);
            }
        } else {
            map.removeLayer(customLayers[layerName]);
            // console.log('Unchecked');
        }
    });

    function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
    }

    function showInfoWindow(e) {
        if (e.target.getPopup() == undefined) {
            console.log(e.target.feature.gid);
            popupContent = '<pre>' + JSON.stringify(e.target.feature.properties, null, ' ').replace(/[\{\}"]/g, '') + '</pre>';
            e.target.bindPopup(popupContent).openPopup();
        } else {
            console.log('exist');
            e.target.openPopup();
        }
    }

    function onEachFeature(feature, layer) {
        layer.on({
            // mouseover: highlightFeature,
            // mouseout: resetHighlight,
            dblclick: zoomToFeature,
            click: showInfoWindow
        });
    }

    $("body").on("click", ".remove-layer", function () {
        if (customLayers[this.dataset.tablename] != undefined) {
            map.removeLayer(customLayers[this.dataset.tablename])
        }
        $(this).parent().parent().remove();
    });

});