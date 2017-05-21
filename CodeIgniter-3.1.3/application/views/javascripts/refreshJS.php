
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
var lastDate = "";
var refreshEnable=false;
var refreshTimer;// timer object
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
        console.log("updating json");
        var url = '<?php echo base_url('/Respondao');?>';
        if(lastDate !== "")
            url += "?dt=" + lastDate;
        xhttp.open("GET", url, true);
        xhttp.send();
}

function myTimer() {
    updateJson();
    
}

function enableTimer(isEnable){
    if(isEnable==true) {
        if(refreshEnable==false){
            refreshEnable=true;
            console.log("refresh enabled!!!!!!!!!!");
            lastDate = "";
        }
        console.log("aqui + -> " + lastDate);
        refreshTimer = setInterval(myTimer, 60000); // um minuto de intrevalo
        //console.log(refreshTimer);
        myTimer();
    }
    else{
        console.log("aqui stop!!!");
        clearTimeout(refreshTimer);
        refreshEnable=false;
    }
}
enableTimer(true);

</script>
