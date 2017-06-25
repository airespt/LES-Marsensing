
<!--
/** comparatorJS.
 * User: Daniel
 * Date: 25-06-2017
 * Time: 20:00
 * To be called from CodeIgniter via template parser (as view).
 * This script updates the comparator model
 */
-->
<?php
?>

<head>
</head>

<script language="javascript" type="text/javascript">

var layersJson1; // = JSON.parse('{layersJson}');
var layersJson2; // = JSON.parse('{layersJson}');
//var dd1 = document.getElementById("time_stamp1").value;
//var dd2 = document.getElementById("time_stamp1").value;
var JSONcomparator;
var xhttpcompA = new XMLHttpRequest();
var xhttpcompB = new XMLHttpRequest();
var d3;
var d4;
xhttpcompA.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
        JSONcomparator = JSON.parse(this.responseText);
        console.log(responseJSON);
        d3 = responseJSON['datahora'];
        layersJson1 = responseJSON['camadas'];
    }
};

xhttpcompB.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
        JSONcomparator = JSON.parse(this.responseText);
        console.log(responseJSON);
        d4 = responseJSON['datahora'];
        layersJson2 = responseJSON['camadas'];
    }
};


function startComparator(){
    stopRefreshTimer();
    var today = new Date();
    var yesterday = new Date();
    yesterday.setDate(yesterday.getDate()-1);
    var box1 = today.toISOString();
    var pos = box1.indexOf("T");
    box1 = box1.substring(0, pos);
    document.getElementById("date3").value = box1;
    console.log(box1);
    var box2 = yesterday.toISOString();
    pos = box2.indexOf("T");
    box2 = box2.substring(0, pos);
    document.getElementById("date4").value = box2;
    updatemap1();
    updatemap2();
    accordion('comparator', false);
}

function updatemap1(){
    var url = '<?php echo base_url('/Respondao');?>';
    var nextDate = document.getElementById("date3").value + " 00:00:00";
    url += "?dt=" + nextDate;
    console.log("A -> " + nextDate);
    xhttpcompA.open("GET", url, true);
    xhttpcompA.send();
    
}

function updatemap2(){
    var url = '<?php echo base_url('/Respondao');?>';
    var nextDate = document.getElementById("date4").value + " 00:00:00";
    url += "?dt=" + nextDate;
    console.log("B -> " +nextDate);
    xhttpcompB.open("GET", url, true);
    xhttpcompB.send();
    
}



function stopComparator(){
    startRefreshTimer();
}
</script>
