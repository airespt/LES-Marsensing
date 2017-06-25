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




    var layersJson1; // = JSON.parse('{layersJson}');

    var camadasLayerGroup1;
    var camadas1 = [];

    var currCustomLayer1 = 'p05'; // global do current customlayer. possui o tipo 'map/p05/p95/sel7'. mais tarde, talvez definir mais tipos para o player e comparador
    // Esta é chamada pelo refreshJS

    function setCustomLayer1(tipo1)
    {
        console.log("setCustomLayer1:"+ tipo1);
        if( camadasLayerGroup1 !== undefined) {
            camadasLayerGroup1.clearLayers();
            camadas1 = [];
        }

        for (var l in layersJson1) {
            if( layersJson1[l]["tipo"] === tipo1) {
                camadas1.push(new L.ImageOverlay(layersJson1[l]["url"], JSON.parse(layersJson1[l]["bounds"]), {zIndex: 99}));
            }
        }
        camadasLayerGroup1 = L.layerGroup(camadas1).addTo(mymap01);




            if( layerControls1 !== undefined )
                layerControls1.remove();
            layerControls1 = L.control.layers(layerGroupFundo1).addTo(mymap01);   // http://leafletjs.com/examples/layers-control/

        currCustomLayer1 = tipo1;
        console.log(layersJson1);
    }

    var xhttp01 = new XMLHttpRequest();
    var responseJSON1;
    var d3;

    xhttp01.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            responseJSON1 = JSON.parse(this.responseText);
            console.log(responseJSON1);
            if (d3 !== responseJSON1['datahora']){
                d3 = responseJSON1['datahora'];
                layersJson1 = responseJSON1['camadas'];
               // console.log(currCustomLayer1);
                setCustomLayer1(currCustomLayer);
            }
        }
    }
    function updateJson1(){
//      console.log("<?php echo base_url(); ?>");
    console.log("updating json");
        var url1 = '<?php echo base_url('/Respondao');?>';
        var lastDate1 = document.getElementById("date3").value + " 00:00:00";
        if(lastDate1 !== "")
            url1 += "?dt=" + lastDate1;
        console.log("A -> " + lastDate1);
        xhttp01.open("GET", url1, true);
        xhttp01.send();
    }
    updateJson1();


</script>