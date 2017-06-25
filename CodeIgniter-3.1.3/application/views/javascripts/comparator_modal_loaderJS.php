<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

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