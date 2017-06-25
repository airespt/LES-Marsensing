<?php

$hostname = "127.0.0.1";
$db_name = "noiseship";
$db_user = "root";
$db_passwd = "root";


function dbconnect($hostname, $db_name,$db_user,$db_passwd)
 {
   $db = @ mysql_connect($hostname,$db_user,$db_passwd);
  	
   if(!$db) {
    die("Error " . mysql_errno() . " : " . mysql_error());
   } 
         
   if(!( @ mysql_select_db($db_name, $db))){
    die("Error " . mysql_errno() . " : " . mysql_error());
   } 
  mysql_set_charset('utf8');
  session_start();
  return $db;
 }
?>
