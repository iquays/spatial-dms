/**
 * Created by syauqi on 09-Sep-16.
 */
// by SQ

jQuery(function ($) {

    const osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a>',
        maxZoom: 19,
        edgeBufferTiles: 1,
    });

    const Esri_WorldImagery = L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; <a href="http://www.openstreetmap.org/copyright">Esri</a>',
        edgeBufferTiles: 1,
        maxZoom: 17,
    });

    const OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
        maxZoom: 17,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)',
        // edgeBufferTiles: 1
    });

    const RBI_Indonesia = L.tileLayer('http://portal.ina-sdi.or.id/arcgis/rest/services/IGD/RupabumiIndonesia/MapServer/tile/{z}/{y}/{x}', {
        maxZoom: 15,
        edgeBufferTiles: 1
    });

    let map = new L.Map("map", {
        minZoom: 3,
        doubleClickZoom: false,
        zoomControl: false,
        preferCanvas: true,
        layers: [osm]
    }).setView([-6.96, 111.89], 11);
    map.createPane("pointPane");
    map.getPane("pointPane").style.zIndex = 621;
    map.createPane("linePane");
    map.getPane("linePane").style.zIndex = 611;
    map.createPane("polygonPane");
    map.getPane("polygonPane").style.zIndex = 210;

    // create a zoom control using LeafletZoomBar
    if (enableZoomBar) {
        new L.Control.ZoomBar({position: "topright"}).addTo(map);
    }


    // create a distance measurement using LeafletPolylineMeasure
    if (enablePolylineMeasure) {
        L.control.polylineMeasure({
            draw: false,
            position: "topright",
            measureControlTitleOn: "Aktifkan Penghitung Jarak",
            measureControlTitleOff: "Nonaktifkan Penghitung Jarak"
        }).addTo(map);
    }

    // create Browser Print button and add to the map
    if (enableBrowserPrint) {
        L.browserPrint({position: "topright", title: "Cetak Peta"}).addTo(map);
    }

    // Create MiniMap control //
    const rect1 = {color: "#ff1100", weight: 3};
    const rect2 = {color: "#0000AA", weight: 1, opacity: 0, fillOpacity: 0};
    if (enableMinimap) {
        const Esri_WorldStreetMap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
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

    $("#layer-modal-toggle").click(function () {
        $("#layerModal").modal("show");
    });

    // Add Layer Modal
    $(".add-layer-modal-button").click(function () {
        if (!$("#" + this.value).length > 0) {
            $(".layer-list-container").prepend(
                "<div class='pt-1 pb-1 media align-items-center'>" +
                "                        <div class='col col-12 custom-control custom-checkbox media-body pr-0'>" +
                "                            <input type='checkbox' value=" + this.value +
                "                                   id=" + this.value +
                "                                   data-peta_id=" + this.dataset.peta_id +
                "                                   class='checkbox-layer custom-control-input'>" +
                "                            <label for=" + this.value + " class='custom-control-label'> " +
                "                                <strong>" + this.name + "</strong> " +
                "                            </label>" +
                "                        </div>" +
                "                        <button data-tablename=" + this.value +
                "                               class='pr-2 pl-2 pull-right fa fa-trash btn btn-outline-danger btn-sm btn-round remove-layer' title = 'Sembunyikan peta' >" +
                "                        </button>" +
                "                    </div>"
            )
            ;
            $("#" + this.value).click();
        }
    });

    // Function to show Point layer
    // these function will be called from #showHideMapLayer
    let customLayers = {};
    let selected;
    let markerColor;
    let layerName;

    function showPointLayer(response) {
        // var selected;
        // style for marker
        markerColor = randomColor();
        let geojsonMarkerOptions = {
            radius: 9,
            fillColor: markerColor,
            color: markerColor,
            weight: 3,
            fillOpacity: 0.8
        };
        // console.log(response);
        customLayers[layerName] = new L.geoJSON(response, {
            pointToLayer: function (feature, latlng) {
                return L.circleMarker(latlng, geojsonMarkerOptions);
            },
            // pane: 'pointPane',
            onEachFeature: onEachFeature
        }).on('click', function (e) {
            if (selected) {
                e.target.resetStyle(selected)
            }
            selected = e.layer
            selected.bringToFront()
            selected.setStyle({
                'color': 'lime',
                'weight': '5',
                'fillOpacity': '0.9'
            })
        }).on('remove', function () {
            customLayers[layerName].resetStyle(selected);
            selected = null;
        });
        map.addLayer(customLayers[layerName]);
    }

    function showLineLayer(response) {
        // var selected;
        // style for marker
        markerColor = randomColor();
        // console.log(response);
        customLayers[layerName] = new L.geoJSON(response, {
            style: {
                color: markerColor,
                fillOpacity: 0.3,
            },
            // pane: 'linePane',
            onEachFeature: onEachFeature
        }).on('click', function (e) {
            if (selected) {
                e.target.resetStyle(selected)
            }
            selected = e.layer
            selected.bringToFront()
            selected.setStyle({
                'color': 'red',
                'weight': '5',
                'fillOpacity': '0.7'
            })
        }).on('remove', function () {
            customLayers[layerName].resetStyle(selected);
            selected = null;
        });
        map.addLayer(customLayers[layerName]);
    }

    function showPolygonLayer(response) {
        // var selected;
        // style for marker
        markerColor = randomColor();
        customLayers[layerName] = new L.geoJSON(response, {
            style: {
                color: markerColor,
                weight: 2,
                fillOpacity: 0.3,
            },
            // pane: 'polygonPane',
            onEachFeature: onEachFeature
        }).on('click', function (e) {
            if (selected) {
                e.target.resetStyle(selected)
            }
            selected = e.layer
            selected.bringToFront()
            selected.setStyle({
                'color': 'red',
                'weight': '3',
                'fillOpacity': '0.5'
            })
        }).on('remove', function () {
            customLayers[layerName].resetStyle(selected);
            selected = null;
        });
        map.addLayer(customLayers[layerName]);
    }


    // Show and hide map layer #showHideMapLayer
    let styleColor;
    let mapType;
    // $(".checkbox-layer").change(function () {
    $("body").on('change', '.checkbox-layer', function () {
        layerName = this.id;
        let layerId = this.dataset.peta_id;
        // console.log(randomColor());
        if (this.checked) {
            if (typeof (customLayers[layerName]) == "undefined") {
                customLayers [layerName] = layerName;
                // console.log(customLayers[layerName]);
                $.ajax({
                    dataType: 'json',
                    url: homeUrl + "map/getlayer?petaId=" + layerId
                }).done(function (response) {
                    mapType = response['features'][1]['geometry']['type'];
                    switch (mapType) {
                        case 'Point':
                        case 'MultiPoint':
                            showPointLayer(response);
                            break;
                        case 'LineString':
                        case 'MultiLineString':
                            showLineLayer(response);
                            break;
                        default:
                            showPolygonLayer(response);
                            break;
                    }
                });
            } else {
                map.addLayer(customLayers[layerName]);
            }
        } else {
            map.removeLayer(customLayers[layerName]);
            // console.log('Unchecked');
        }
    }).on("click", ".remove-layer", function () {
        // console.log(this.dataset.tablename);
        if (customLayers[this.dataset.tablename] != undefined) {
            map.removeLayer(customLayers[this.dataset.tablename])
        }
        $(this).parent().remove();
    });

    function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
    }

    function showInfoWindow(e) {
        if (e.target.getPopup() == undefined) {


            $.ajax({
                dataType: 'json',
                url: homeUrl + "map/info?petaId=" + e.target.feature.lid + "&gid=" + e.target.feature.gid
            }).done(function (response) {


                // console.log(e.target);
                // popupContent = e.target.feature.lid + ' - ' + e.target.feature.gid;
                // popupContent = '<pre>' + JSON.stringify(response, null, ' ').replace(/[\{\}"]/g, '') + '</pre>';
                popupContent = generateInfoTable(response);
                // popupContent = response;
                e.target.bindPopup(popupContent, {maxWidth: 560}).openPopup();
            })
        } else {
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

    function generateInfoTable(response) {
        myInfo = "<div class='card'><div class='card-header pt-1 pb-1'><h5 class='card-title'>";
        myInfo += response.nama;
        myInfo += "</h5></div><div class='card-body pt-1 pb-1'><table class='table table-hover'><tbody>"

        data = response.data;
        keys = Object.keys(data);
        if (keys.length > 10) {
            for (i = 0; i < keys.length; i = i + 2) {
                myInfo += "<tr class='mt-1 mb-1'><td><strong>" + keys[i] + "</strong></td><td>" + data[keys[i]] + "</td><td><strong>" + keys[i + 1] + "</strong></td><td>" + data[keys[i + 1]] + "</td></tr>";
            }
        } else {
            for (i = 0; i < keys.length; i++) {
                myInfo += "<tr class='mt-1 mb-1'><td><strong>" + keys[i] + "</strong></td><td>" + data[keys[i]] + "</td></tr>";
            }
        }
        myInfo += "</tbody></table></div></div>";
        return myInfo;
    }

});