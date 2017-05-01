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


<script language="javascript" type="text/javascript"
        src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"
        integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg=="
        crossorigin="">

var myMap = L.map("mapid").setView({center: [39.505, 7.09],zoom: 10});
var esriStreets = L.esri.basemapLayer('Streets').addTo(myMap);
if(myMap.resize() == true) {
    esriStreets.invalidateSize(true);
}
var layersJson = {layersJson};
console.log(layersJson);

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
