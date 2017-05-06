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
// Add combobox mapas de fundo ao conteudo do div do mapa
var tagMap = document.getElementById("mapid");
    tagMap.innerHTML = '<div id="basemaps-wrapper" class="leaflet-bar">'
        +'<select name="basemaps" id="basemaps" onChange="setBasemap(basemaps.value)">'
            +'<option value="Topographic">Topographic</option>'
            +'<option value="Streets">Streets</option>'
            +'<option value="NationalGeographic">National Geographic</option>'
            +'<option value="Oceans" selected>Oceans</option>'
            +'<option value="Gray">Gray</option>'
            +'<option value="DarkGray">Dark Gray</option>'
            +'<option value="Imagery">Imagery</option>'
        +'</select>'
    +'</div>';

var leafMap = L.map("mapid", {zoomSnap: 0.1, zoomDelta: 0.2}).setView([40, -4], 5);
//var layerFundo = L.esri.basemapLayer('Streets').addTo(leafMap);
var layerFundo = '';        // global do layer de fundo
var layerFundoLabels = '';  // global dos labels do layer de fundo
setBasemap('Oceans');

// para remover na US8 RF9
var layersJson = JSON.parse('{layersJson}');

var layerCustom = ''; // global do layerCustom atual. possui o tipo 'map/p05/p95/sel7'. falta definir mais tipos para o player e o comparador
setCustomLayer("map");

    function setCustomLayer(tipo)
    {
        leafMap.eachLayer(function(l){    // remove all custom layers
            if( l.pane == 'overlayPane' )
                leafMap.removeLayer(l);
        });

        for (var l in layersJson) {
            if( layersJson[l]["tipo"] == tipo )
                leafMap.addLayer(new L.ImageOverlay(layersJson[l]["url"], JSON.parse(layersJson[l]["bounds"]), {zIndex: 99}));
        }
        layerCustom = tipo;
    }

    // mapa de fundo handlers
    function setBasemap(basemap) {
        if( layerFundo ) {
            leafMap.removeLayer(layerFundo);
        }

        layerFundo = L.esri.basemapLayer(basemap);

        leafMap.addLayer(layerFundo);

        if( layerFundoLabels ) {
            leafMap.removeLayer(layerFundoLabels);
        }

        if( basemap === 'ShadedRelief'
            || basemap === 'Oceans'
            || basemap === 'Gray'
            || basemap === 'DarkGray'
            || basemap === 'Imagery'
            || basemap === 'Terrain'
        ) {
            layerFundoLabels = L.esri.basemapLayer(basemap + 'Labels');
            leafMap.addLayer(layerFundoLabels);
        }
    }

    // layer button handlers
    document.getElementById("noiseMap").onclick = function() { addLayer("map") };
    document.getElementById("p05").onclick = function() { addLayer("p05") };
    document.getElementById("p95").onclick = function() { addLayer("p95") };
    document.getElementById("SEL7").onclick = function() { addLayer("sel7") };

</script>
