<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--
/** Created by PhpStorm.
 * User: Daniel
 * Date: 18-05-2017
 * Time: 19:00
 * To be called by player.
 * This script interacts with player
 */
-->

<script language="javascript" type="text/javascript">
    var inicio = '2010-01-01 00:00:00';
    var fim = '2010-01-01 00:01:00';
    var json;
    var Player_init=false;
    var totalFrames=0;
    var player_timer;
    var intrevale = 2000;
    var xhttp1 = new XMLHttpRequest();
    var url = '<?php echo base_url();?>' + "camadao";
    //var urlImg = '<?php echo base_url('imagens/p1.png')?>'
    //var urlImg = 'http://localhost/cod5/imagens/p1.png';
    
    var pos=0;
    xhttp1.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        
            json= JSON.parse(this.responseText);
            totalFrames = json['frames'].length;
            //console.log(totalFrames);
            document.getElementById('slider1').value=0;
            document.getElementById('slider1').max=totalFrames-1;
            enableTimer(false);
            pos=0;
            Player_init=true;
            enableTimePLayer(true);
            //swampLayer(pos);
        }
    };
    //evento do botao play
    //Verifica se o player ja foi inicialisado, caso negativo inicialisa o player.
    //Activa o player
    function startPlayer(){
        if(Player_init) 
        {
            enableTimePLayer(true);
        }
        else{
            xhttp1.open("GET", url+"/?dts=" + inicio + "&dte=" + fim  , true);
            xhttp1.send();
        }
    }
    
    //evento do botao pause
    //pausa o player
    function PausePlayer(){
        enableTimePLayer(false);
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
    function enableTimePLayer(isEnable){
        if(isEnable==true) {
            player_timer = setInterval(setNextFrame, intrevale); 
            setNextFrame();
        }
        else
            clearTimeout(player_timer);
    }
    
    //Carrega os frames seguinte
    function setNextFrame(){
        swampLayer(pos);
        document.getElementById('slider1').value=pos;
        pos++;
        if(pos==totalFrames)
            enableTimePLayer(false);
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