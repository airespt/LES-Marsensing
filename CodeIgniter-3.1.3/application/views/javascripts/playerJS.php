<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--
/** 
 * User: Daniel
 * Date: 18-05-2017
 * Time: 19:00
 * To be called by player.
 * This script interacts with player
 */
-->

<script language="javascript" type="text/javascript">
    var inicio = '2010-01-01 00:00:00';
    var fim =    '2010-01-02 00:01:00';
    var json;
    var PlayerActive=false;
    var totalFrames=0;
    var playerTimerID=0;
    var intrevale = 2000;
    var xhttp1 = new XMLHttpRequest();
    var url = '<?php echo base_url();?>' + "camadao";
    
    var pos=0;
    xhttp1.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        
            console.log(this.responseText);
            json= JSON.parse(this.responseText);
            totalFrames = json['frames'].length;
            console.log(json['frames']);
            console.log(totalFrames);
            document.getElementById('slider1').value=0;
            document.getElementById('slider1').max=totalFrames-1;
            pos=0;
            PlayerActive=true;
            startPlayerTimer();
            //swampLayer(pos);
        }
    };
    //evento do botao play
    //Verifica se o player ja foi inicialisado, caso negativo inicialisa o player.
    //Activa o player
    function startPlayer(){
        if(PlayerActive) 
        {
            startPlayerTimer();
        }
        else{
            stopRefreshTimer();
            xhttp1.open("GET", url+"/?dts=" + inicio + "&dte=" + fim  , true);
            xhttp1.send();
        }
    }
    
    function stopPlayerTimer(){
        if(playerTimerID!==0){
            clearTimeout(playerTimerID);
            playerTimerID=0;
        }
    }
    
    //evento do botao pause
    //pausa o player
    function PausePlayer(){
        stopPlayerTimer();
    }
    //por acabar
    //evento do botao stop
    //para o player e retoma o refresh do site
    function StopPLayer(){
        console.log("stop!!");
        //lastDate = "";
        Player_init=false;
        clearTimeout(player_timer);
        enableTimer(true);
    }
    
    //timer do player
    function startPlayerTimer(){
        if(playerTimerID===0) {
            console.log("startPlayerTimer");
            player_timer = setInterval(setNextFrame, intrevale); 
            setNextFrame();
        }
    }
    
    function stopPlayerTimer(){
        if(playerTimerID===0) {
            clearTimeout(playerTimerID);
            playerTimerID=0;
        }
    }
    //Carrega os frames seguinte
    function setNextFrame(){
        swampLayer(pos);
        document.getElementById('slider1').value=pos;
        pos++;
        if(pos==totalFrames)
            stopPlayerTimer();
    }
    
    //evento do sidebar
    //salta para os frames selevionados no sidebar
    function jumpFrame(){
        pos=document.getElementById('slider1').value;
        console.log(pos);
        setNextFrame();
    }
    
    //atualisa o mapa
    function swampLayer(pos)
    {
        var frames = json['frames'];
        var list = frames[pos];
        layersJson = list;
        console.log(layersJson);
        setCustomLayer(currCustomLayer);
        
    }
  
</script>