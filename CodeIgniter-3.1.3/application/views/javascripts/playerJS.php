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
            
            StartPlayerTimer();
            //swampLayer(pos);
        }
    };
    //evento do botao play
    //Verifica se o player ja foi inicialisado, caso negativo inicialisa o player.
    //Activa o player
    function StartPlayer(){
        if(PlayerActive) 
        {
            StartPlayerTimer();
        }
        else{
            stopRefreshTimer();
            var d1 = document.getElementById("date1").value;
            var d2 = document.getElementById("date2").value;
            //console.log(d1);
            //var inicio1 = d1.substring(6,11) + "-" + d1.substring(3,5) + d1.substring(0,2) + " 00:00:00";
            inicio = d1 + " 00:00:00";
            fim = d2 + " 00:00:00";
            //console.log(inicio1);
            
            
            xhttp1.open("GET", url+"/?dts=" + inicio + "&dte=" + fim  , true);
            xhttp1.send();
        }
    }
    
    function StopPlayerTimer(){
        if(playerTimerID!=0){
            console.log("pause!222!");
            clearTimeout(playerTimerID);
            playerTimerID=0;
        }
    }
    
    //evento do botao pause
    //pausa o player
    function PausePlayer(){
        console.log("pause!!");
        StopPlayerTimer();
    }
    
    //evento do botao stop
    //para o player e retoma o refresh do site
    function StopPLayer(){
       //console.log("ola");
        if(PlayerActive==true)
        {
            console.log("stop!!");
            //lastDate = "";
            PlayerActive=false;
            clearTimeout(playerTimerID);
            playerTimerID=0;
            currCustomLayer='map';
            startRefreshTimer();
            //enableTimer(true);
        }
    }
    
    //timer do player
    function StartPlayerTimer(){
        if(playerTimerID===0) {
            console.log("startPlayerTimer");
            playerTimerID = setInterval(SetNextFrame, intrevale); 
            SetNextFrame();
        }
    }
    
    /*
    function StopPlayerTimer(){
        if(playerTimerID!=0) {
            console.log("devia parar");
            clearInterval(playerTimerID);
            //clearTimeout(playerTimerID);
            playerTimerID=0;
        }
    }*/
    //Carrega os frames seguinte
    function SetNextFrame(){
        SwapLayer(pos);
        document.getElementById('slider1').value=pos;
        pos++;
        if(pos==totalFrames)
            StopPlayerTimer();
    }
    
    //evento do sidebar
    //salta para os frames selevionados no sidebar
    function JumpFrame(){
        pos=document.getElementById('slider1').value;
        console.log(pos);
        SetNextFrame();
    }
    
    //atualisa o mapa
    function SwapLayer(pos)
    {
        var frames = json['frames'];
        var list = frames[pos];
        layersJson = list;
        console.log(layersJson);
        setCustomLayer("player");
        
    }
    
    //var newDate = new Date();
    //var datetime = newDate.today();
    //console.log(newDate);
    
    function startTime(){
        var today = new Date();
        console.log(PlayerActive);
        //var yesterday = newDate.today();
        var yesterday = new Date();
        yesterday.setDate(yesterday.getDate()-1);
        var box1 = today.toISOString();
        var pos = box1.indexOf("T");
        box1 = box1.substring(0, pos);
        document.getElementById("date2").value = box1;
        console.log(box1);
        var box2 = yesterday.toISOString();
        pos = box2.indexOf("T");
        box2 = box2.substring(0, pos);
        document.getElementById("date1").value = box2;
        
    }
    
    function updateDate1(){
        var d1 = document.getElementById("date1").value;
        var d2 = document.getElementById("date2").value;
        var date1 = new Date(d1);
        var date2 = new Date(d2);
        console.log("aqui data1!!");
        if (d1 >= d2)
        {
            date2.setDate(date1.getDate()+1);
            console.log("data2 invalida!!");
            d2 = date2.toISOString();
            pos = d2.indexOf("T");
            document.getElementById("date2").value= d2.substring(0, pos);
        }
    }
    
    function updateDate2(){
        var d1 = document.getElementById("date1").value;
        var d2 = document.getElementById("date2").value;
        var date1 = new Date(d1);
        var date2 = new Date(d2);
        console.log("aqui data1!!");
        if (d1 >= d2)
        {
            date1.setDate(date2.getDate()-1);
            console.log("data1 invalida!!");
            d1 = date1.toISOString();
            pos = d1.indexOf("T");
            document.getElementById("date1").value= d1.substring(0, pos);
        }
    }
    
    
    
    
    
    
    function printD(){
        var myElement = document.getElementById("date1").innerHTML;
        //console.log(myElement);
        var d = new Date(myElement);
        console.log(document.getElementById("date1").value);
    }
    startTime();
    
  
</script>