
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


function startComparator(){
    //stopRefreshTimer();
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
    setCustomLayer1(currCustomLayer);
    setCustomLayer2(currCustomLayer);

}

function stopComparator(){
    startRefreshTimer();
}
</script>
