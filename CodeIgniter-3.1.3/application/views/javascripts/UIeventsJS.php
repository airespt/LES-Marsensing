<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script language="javascript" type="text/javascript">

// layer button handlers
function onClick_noise() {
    if( currCustomLayer !== 'map') {
        StopPLayer();
        currCustomLayer = "map";
        startRefreshTimer();
    }
    show_hide('button_player', 'button_comparator');

}
function onClick_p05() {
    if (currCustomLayer !== 'p05') {
        StopPLayer();
        currCustomLayer = "p05";
        startRefreshTimer();
    }
    show_hide('button_comparator', 'button_player');
    hide('slider1');
}
function onClick_p95() {
    if( currCustomLayer !== 'p95') {
        StopPLayer();
        currCustomLayer = "p95";
        startRefreshTimer();
    }
    show_hide('button_comparator', 'button_player');
    hide('slider1');
}
function onClick_sel7() {
    if( currCustomLayer !== 'sel7') {
        StopPLayer();
        currCustomLayer = "sel7";
        startRefreshTimer();
    }
    show_hide('button_comparator', 'button_player');
    hide('slider1');
}

//document.getElementById("comp").style.visibility = "hidden";



</script>
