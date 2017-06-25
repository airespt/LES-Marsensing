<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 6/25/2017
 * Time: 12:27 PM
 */
<head>

</head>
<script language="javascript" type="text/javascript">


    var defaultLayerFundo = "Oceans";
    var listaLayerFundo = ["Oceans", "NationalGeographic", "Topographic", "Terrain", "Streets", "Gray", "DarkGray", "Imagery"]; // http://esri.github.io/esri-leaflet/examples/switching-basemaps.html

    var layerGroupFundo = {};// lista de layer groups da camada de fundo
    for(var i in listaLayerFundo) {
        var name = listaLayerFundo[i];
        layerGroupFundo[name] = getLayerGroupFundo(name); // agrupa layerFundo com layerFundoLabels caso existam Labels à parte
        if( name === defaultLayerFundo )
            defaultBaseLayer = layerGroupFundo[name];
    }
    // generate layerGroup to include Labels layer
    function getLayerGroupFundo(basemap) {
        var baseLayer = L.esri.basemapLayer(basemap);
        if( basemap === 'Oceans' || basemap === 'Gray' || basemap === 'DarkGray'
            || basemap === 'Imagery' || basemap === 'Terrain' ) {
            baseLayerLabels = L.esri.basemapLayer(basemap + 'Labels');
            return L.layerGroup([baseLayer, baseLayerLabels]);
        }
        else {
            return baseLayer;
        }
    }

    var mymap01 = L.map("map01_comparator", {
        zoomSnap: 0.1,
        zoomDelta: 0.2,
        layers: [defaultBaseLayer]    // init map on defaultLayerFundo
    }).setView([40, -4], 5);        // posicao e zoom inicial


    var layerControls1 = L.control.layers(layerGroupFundo).addTo(mymap01);
</script>