<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 6/25/2017
 * Time: 11:46 AM
 */
<head>
</head>
<script language="javascript">
    function comparator_modal_loader(){
        document.getElementById('comparator_modal').style.display='block'
        setTimeout(function() {
            mymap01.invalidateSize();
        }, 100);
        setTimeout(function() {
            mymap02.invalidateSize();
        }, 100);
    }

</script>