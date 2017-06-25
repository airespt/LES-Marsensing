<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<head>

</head>
<script language="javascript" type="text/javascript">


    var defaultLayerFundo1 = "Oceans";
    var listaLayerFundo1 = ["Oceans", "NationalGeographic", "Topographic", "Terrain", "Streets", "Gray", "DarkGray", "Imagery"]; // http://esri.github.io/esri-leaflet/examples/switching-basemaps.html

    var layerGroupFundo1 = {};// lista de layer groups da camada de fundo
    for(var i in listaLayerFundo1) {
        var name = listaLayerFundo1[i];
        layerGroupFundo1[name] = getLayerGroupFundo(name); // agrupa layerFundo com layerFundoLabels caso existam Labels à parte
        if( name === defaultLayerFundo1 )
            var defaultBaseLayer1 = layerGroupFundo1[name];
    }
    // generate layerGroup to include Labels layer
    function getLayerGroupFundo(basemap) {
        var baseLayer = L.esri.basemapLayer(basemap);
        if( basemap === 'Oceans' || basemap === 'Gray' || basemap === 'DarkGray'
            || basemap === 'Imagery' || basemap === 'Terrain' ) {
            var baseLayerLabels1 = L.esri.basemapLayer(basemap + 'Labels');
            return L.layerGroup([baseLayer, baseLayerLabels1]);
        }
        else {
            return baseLayer;
        }
    }

    var mymap01 = L.map("map01_comparator", {
        zoomSnap: 0.1,
        zoomDelta: 0.2,
        layers: [defaultBaseLayer1]    // init map on defaultLayerFundo
    }).setView([40, -4], 5);        // posicao e zoom inicial


    var layerControls1 = L.control.layers(layerGroupFundo1).addTo(mymap01);
</script>