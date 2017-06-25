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
</head>

<script language="javascript" type="text/javascript">


    var defaultLayerFundo2 = "Oceans";
    var listaLayerFundo2 = ["Oceans", "NationalGeographic", "Topographic", "Terrain", "Streets", "Gray", "DarkGray", "Imagery"]; // http://esri.github.io/esri-leaflet/examples/switching-basemaps.html

    var layerGroupFundo2 = {};// lista de layer groups da camada de fundo
    for(var i in listaLayerFundo2) {
        var name = listaLayerFundo2[i];
        layerGroupFundo2[name] = getLayerGroupFundo(name); // agrupa layerFundo com layerFundoLabels caso existam Labels à parte
        if( name === defaultLayerFundo2 )
            var defaultBaseLayer2 = layerGroupFundo2[name];
    }

    // generate layerGroup to include Labels layer
    function getLayerGroupFundo(basemap) {
        var baseLayer = L.esri.basemapLayer(basemap);
        if( basemap === 'Oceans' || basemap === 'Gray' || basemap === 'DarkGray'
            || basemap === 'Imagery' || basemap === 'Terrain' ) {
            var baseLayerLabels2 = L.esri.basemapLayer(basemap + 'Labels');
            return L.layerGroup([baseLayer, baseLayerLabels2]);
        }
        else {
            return baseLayer;
        }
    }

    var mymap02 = L.map("map02_comparator", {
        zoomSnap: 0.1,
        zoomDelta: 0.2,
        layers: [defaultBaseLayer2]    // init map on defaultLayerFundo
    }).setView([40, -4], 5);        // posicao e zoom inicial
    var layerControls2 = L.control.layers(layerGroupFundo2).addTo(mymap02);



</script>