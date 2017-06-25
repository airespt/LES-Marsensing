<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--
/** Created by PhpStorm.
 * User: Aires
 * Date: 29-04-2017
 * Time: 23:46
 * To be called from CodeIgniter via template parser (as view).
 * This script initializes 'LeafLet' cell provider and adds custom noiseMaps for each statistic layer.
 * It also configures each button in layers tab with corresponding onClick actions to to swap current layer.
 *
 * Requires field 'layersJson' from zonaModel describing one or more zonas for each of the four noiseLayers
 *  defaults to first layer found.
 */
-->
<head>
    <!-- Load Leaflet from CDN-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" >
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@2.0.8/dist/esri-leaflet.js"></script>

    <style>
        #basemaps-wrapper {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 900;
            background: white;
            padding: 10px;
        }
        #basemaps {
            margin-bottom: 5px;
        }
    </style>

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

    var mymap02 = L.map("map02_comparator", {
        zoomSnap: 0.1,
        zoomDelta: 0.2,
        layers: [defaultBaseLayer]    // init map on defaultLayerFundo
    }).setView([40, -4], 5);        // posicao e zoom inicial
    var layerControls2 = L.control.layers(layerGroupFundo).addTo(mymap02);



</script>