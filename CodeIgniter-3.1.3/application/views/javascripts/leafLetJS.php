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

    var layerGroupFundo = {};   // lista de layer groups da camada de fundo
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

    var leafMap = L.map("mapid", {
        zoomSnap: 0.1,
        zoomDelta: 0.2,
        layers: [defaultBaseLayer]    // init map on defaultLayerFundo
    }).setView([40, -4], 5);        // posicao e zoom inicial


    var layerControls = L.control.layers(layerGroupFundo).addTo(leafMap);   // http://leafletjs.com/examples/layers-control/
// *********************************************************************

// para serem preenchidos pelo timer quando recebe dados atualizados
var layersJson; // = JSON.parse('{layersJson}');
var barcosJson;

var currCustomLayer = 'map'; // global do current customlayer. possui o tipo 'map/p05/p95/sel7'. mais tarde, talvez definir mais tipos para o player e comparador

    // Esta é chamada pelo refreshJS
    function setCustomLayer(tipo)
    {
        console.log("setCustomLayer:"+ tipo);
        leafMap.eachLayer(function(lay){    // remove all custom layers
            if( lay.pane === 'overlayPane' )
                leafMap.removeLayer(lay);
        });

        for (var l in layersJson) {
            if( layersJson[l]["tipo"] === tipo )
                leafMap.addLayer(new L.ImageOverlay(layersJson[l]["url"], JSON.parse(layersJson[l]["bounds"]), {zIndex: 99}));
        }
        currCustomLayer = tipo;
        if( tipo === "map") {
            setBarcosMarkers();

            if( layerControls !== undefined )
                layerControls.remove();
            layerControls = L.control.layers(layerGroupFundo, {"Ships": shipsLayerGroup}).addTo(leafMap);   // http://leafletjs.com/examples/layers-control/
        }
        else {
            removeBarcosMarkers();

            if( layerControls !== undefined )
                layerControls.remove();
            layerControls = L.control.layers(layerGroupFundo).addTo(leafMap);   // http://leafletjs.com/examples/layers-control/
        }
    }

    var shipsLayerGroup;
    var ships = [];
    function setBarcosMarkers() {
        var shipRadius = 5;
        var shipMarkerOptions = {"radius": shipRadius, "color": '#DD3311', "fill": true, "weight": 5};

        if( ships !== [] )
            removeBarcosMarkers();

        for (var l in barcosJson) {
//            console.log(barcosJson[l]);
            ships.push(new L.CircleMarker(JSON.parse(barcosJson[l]["localizacao"]), shipMarkerOptions)
                            .bindTooltip('Name: '+ barcosJson[l]["Nome"])
                            .bindPopup('<p>Location: '+ barcosJson[l]["localizacao"] +'</p>'
                                      +'<p>Speed: '+ barcosJson[l]["Velocidade"] +'</p>')
            );
        }
        shipsLayerGroup = L.layerGroup(ships).addTo(leafMap);
    }

    function removeBarcosMarkers() {
        if( shipsLayerGroup !== undefined ) {
            shipsLayerGroup.clearLayers();
            ships = [];
        }
    }
// *********************************************************************

var lastDate = "";
var refreshTimerID = 0;// timer object
var xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
        responseJSON = JSON.parse(this.responseText);
        console.log(responseJSON);
        if (lastDate !== responseJSON['datahora']){
            lastDate = responseJSON['datahora'];
            layersJson = responseJSON['camadas'];
            barcosJson = responseJSON['barcos'];
            setCustomLayer(currCustomLayer);
        }
    }
};

function updateJson(){
//      console.log("<?php echo base_url(); ?>");
//    console.log("updating json");
    var url = '<?php echo base_url('/Respondao');?>';
    if(lastDate !== "")
        url += "?dt=" + lastDate;
    xhttp.open("GET", url, true);
    xhttp.send();
}

function startRefreshTimer(){
    if( refreshTimerID === 0) {
        console.log("startRefreshTimer");
        lastDate = "";
        refreshTimerID = setInterval(updateJson, 60000); // um minuto de intrevalo
        updateJson();
    }
    else {
        setCustomLayer(currCustomLayer);
    }
}

function stopRefreshTimer() {
    if( refreshTimerID !== 0) {
        console.log("stopRefreshTimer");
        clearTimeout(refreshTimerID);
        refreshTimerID = 0;
    }
}

startRefreshTimer(); // entrypoint

</script>
