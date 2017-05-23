<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
/**
 * Created by PhpStorm.
 * User: Aires
 * Date: 23-05-2017
 * Time: 18:50
 */
// Contem todos os eventos chamados devido a interacção do utilizador
<script language="javascript" type="text/javascript">

// layer button handlers
function onClick_noise() {
    if( currCustomLayer !== 'map') {
        //stopPlayerTimer();
        currCustomLayer = "map";
        startRefreshTimer();
    }
}
function onClick_p05() {
    if (currCustomLayer !== 'p05') {
        //stopPlayerTimer();
        currCustomLayer = "p05";
        startRefreshTimer();
    }
}
function onClick_p95() {
    if( currCustomLayer !== 'p95') {
        //stopPlayerTimer();
        currCustomLayer = "p95";
        startRefreshTimer();
    }
}
function onClick_sel7() {
    if( currCustomLayer !== 'sel7') {
        //stopPlayerTimer();
        currCustomLayer = "sel7";
        startRefreshTimer();
    }
}


</script>
