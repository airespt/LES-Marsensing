<?php
/* 
 DELREG.PHP
 Deletes a specific entry from the 'players' table
*/

 // connect to the database
 include("includes/db.inc");
 $db = dbconnect($hostname,$db_name,$db_user,$db_passwd); 
 
    
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
    // get id value
    $id = $_GET['id'];
	$tabela = $_GET['tabela'];
	$chave = $_GET['chave'];
	
	//echo "Registo:".$id."Tabela: ".$tabela." Chave: ".$chave;
 
    // delete the entry
    $result = mysql_query("DELETE FROM $tabela WHERE $chave=$id")
    or die(mysql_error()); 
 
    // redirect back to the view page
	if ($tabela == "categorias") {
		header("Location: vercat.php");
	}
	if ($tabela == "perguntas") {
		header("Location: verfaq.php");
	}
	if ($tabela == "pabertas") {
		header("Location: verpab.php");
	}
 }
 else
    // if id isn't set, or isn't valid, redirect back to view page
 {
    if ($tabela == "categorias") {
		header("Location: vercat.php");
	}
	if ($tabela == "perguntas") {
		header("Location: verfaq.php");
	}
	if ($tabela == "pabertas") {
		header("Location: verpab.php");
	}
  }
?>