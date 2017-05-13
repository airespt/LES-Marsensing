<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--
/** Created by PhpStorm.
 * User: Daniel
 * Date: 13-05-2017
 * Time: 19:00
 * To be called from CodeIgniter via template parser (as view).
 * This script initializes variable 'layersJson to be used by leadletJS
 */
-->
<head>
    
</head>

<script language="javascript" type="text/javascript">

//layersJson = JSON.parse('{layersJson}');
//setCustomLayer(currCustomLayer);
var layersJson="";
var lastDate = "";
var s ="ola";
var refreshTimer;// timer object
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      responseJSON = JSON.parse(this.responseText);
      
      //s = this.responseText;
      var correntDate = responseJSON['datahora']
      if (lastDate!=responseJSON['datahora']){
            lastDate = responseJSON['datahora'];
            layersJson = responseJSON['camadas'];
            //setCustomLayer(currCustomLayer);
            //alert();
            //console.log("ola");
      }
      console.log(responseJSON);
      
    }
  };

function updateJson(){
        var url= "http://localhost/cod3/index.php/Respondao/";
        if(lastDate!="")
            url += "?dt=" + lastDate;
        xhttp.open("GET", url, true);
        xhttp.send();      
}



function myTimer() {
    updateJson();
    
}

function enableTimer(isEnable){
    if(isEnable==true)
        refreshTimer = setInterval(myTimer, 60000); // um minuto de intrevalo
    else
        clearTimeout(refreshTimer);
}

updateJson();
enableTimer(true);


</script>
