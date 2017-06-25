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



    var layersJson2; // = JSON.parse('{layersJson}');

    var camadasLayerGroup2;
    var camadas2 = [];

    var currCustomLayer2 = 'p05'; // global do current customlayer. possui o tipo 'map/p05/p95/sel7'. mais tarde, talvez definir mais tipos para o player e comparador
    // Esta é chamada pelo refreshJS

    function setCustomLayer2(tipo2)
    {
        console.log("setCustomLayer2:"+ tipo2);
        if( camadasLayerGroup2 !== undefined) {
            camadasLayerGroup2.clearLayers();
            camadas2 = [];
        }

        for (var l in layersJson2) {
           if( layersJson2[l]["tipo"] === tipo2 ) {
                camadas2.push(new L.ImageOverlay(layersJson2[l]["url"], JSON.parse(layersJson2[l]["bounds"]), {zIndex: 99}));
            }
        }
        camadasLayerGroup2 = L.layerGroup(camadas2).addTo(mymap02);




        if( layerControls2 !== undefined )
            layerControls2.remove();
        layerControls2 = L.control.layers(layerGroupFundo2).addTo(mymap02);   // http://leafletjs.com/examples/layers-control/

        currCustomLayer2 = tipo2;
        console.log(layersJson2);
    }
    var xhttp2 = new XMLHttpRequest();
    var responseJSON2;
    var d4;

    xhttp2.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            responseJSON2 = JSON.parse(this.responseText);
            console.log(responseJSON2);
            if (d4 !== responseJSON2['datahora']){
                d4 = responseJSON2['datahora'];
                layersJson2 = responseJSON2['camadas'];
               // console.log("Layer2:"+ currCustomLayer);
                setCustomLayer2(currCustomLayer);
            }
        }
    }

    function updateJson2(){
//      console.log("<?php echo base_url(); ?>");
        console.log("updating json");
        var url2 = '<?php echo base_url('/Respondao');?>';
        var lastDate2 = document.getElementById("date4").value + " 00:00:00";
        if(lastDate2 !== "")
            url2 += "?dt=" + lastDate2;
        console.log("B -> " + lastDate2);
        xhttp2.open("GET", url2, true);
        xhttp2.send();
    }
    updateJson2();


</script>