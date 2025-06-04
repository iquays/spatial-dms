// Top Right
var enableBrowserPrint = true;
// var enableFullscreenControl = true;
var enableMeasureControl = true;
var enablePolylineMeasure = true;
var enableZoomBar = true;

// Bottom Right
var enableLayerControl = true;
var enableMinimap = true;

// Bottom Left
var enableScaleControl = true;

function getColor(d) {
    return d > 45000 ? '#800026' :
        d > 35000 ? '#BD0026' :
            d > 25000 ? '#E31A1C' :
                d > 15000 ? '#FC4E2A' :
                    d > 5000 ? '#FD8D3C' :
                        d > 200 ? '#FEB24C' :
                            d > 10 ? '#FED976' :
                                '#FFEDA0';
}


// kabupaten border
function mapBorderStyle() {
    return {
        color: 'magenta',
        opacity: 0.5,
        fillOpacity: 0.03,
        weight: 3,
        clickable: false
    };
}

// Kecamatan Choropleth Style
function getKecamatanStyle(feature) {
    return {
        color: 'white',
        fillColor: getColor(feature.properties.populasi),
        opacity: 0.5,
        fillOpacity: 0.70,
        weight: 2
    }
}

function getKelurahanStyle(feature) {
    return {
        color: 'white',
        fillColor: 'yellow',
        opacity: 0.5,
        fillOpacity: 0.70,
        weight: 2
    }
}


