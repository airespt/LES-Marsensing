<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
/**
 * Created by PhpStorm.
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
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css"
      integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ=="
      crossorigin=""/>
</head>';


<script language="javascript" type="text/javascript">
src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js";
src="https://unpkg.com/esri-leaflet@2.0.4/dist/esri-leaflet.js";

var myMap = L.map("mapid").setView([39.505, 7.09], 10);

var layersJson = {layersJson};

var currLayerGp = null;
var layerGpArray = Array();
for(var layer in layersJson) {
    var layerGp = new L.layerGroup();
    for(var zona in layer) {
        layerGp.addLayer(new L.ImageOverlay( zona["url"], zona["bounds"], {zIndex:99}));
    }
    layerGpArray.Add(layerGp);

    if( currLayerGp === null ) { // enable first as currentLayer
        layerGp.addTo(myMap);
        currLayerGp = layerGp;
    }
}

// layer button handlers
// TODO

</script>