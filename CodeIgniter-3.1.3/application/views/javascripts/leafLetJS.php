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
    <script src="https://unpkg.com/esri-leaflet@2.0.4/dist/esri-leaflet.js"></script>
</head>

<script language="javascript" type="text/javascript">

var myMap = L.map("mapid").setView([40, -4], 5);
var esriStreets = L.esri.basemapLayer('Streets').addTo(myMap);
//var esriOceans = L.esri.basemapLayer('Oceans').addTo(myMap);

var layersJson = JSON.parse('{layersJson}');

addLayer("map");

function addLayer(tipo)
{
    myMap.eachLayer(function(layer){
//        console.log(layer);
        if(layer.pane == 'overlayPane')
            myMap.removeLayer(layer);
    });

    for (var l in layersJson) {
        if (layersJson[l]["tipo"] == tipo)
            myMap.addLayer(new L.ImageOverlay(layersJson[l]["url"], JSON.parse(layersJson[l]["bounds"]), {zIndex: 99}));
    }
}

// layer button handlers
document.getElementById("noiseMap").onclick = function() { addLayer("map") };
document.getElementById("p05").onclick = function() { addLayer("p05") };
document.getElementById("p95").onclick = function() { addLayer("p95") };
document.getElementById("SEL7").onclick = function() { addLayer("sel7") };



</script>
