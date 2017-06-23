<?php

 // connect to the database
 include("includes/db.inc");
 
 //
// ligacao a base de dados
//
 $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);

if (isset($_POST['submit']))
 { 
 //
//   obtain form data
//
	$idi_id = @ mysql_real_escape_string(htmlspecialchars($_POST['cat_id']));
    $pergunta = @ mysql_real_escape_string(htmlspecialchars($_POST['pergunta']));
	$resposta = @ mysql_real_escape_string(htmlspecialchars($_POST['resposta']));
		

if ($idi_id == '' || $pergunta == '' || $resposta == '')
   {
          // generate error message
          echo 'ERROR: Please fill in all required fields!';
   }
else
   {
	   
	// save the data to the database
	@mysql_query("INSERT perguntas SET idi_id =$idi_id, pergunta='$pergunta', resposta='$resposta'")
	or die(mysql_error()); 
 
	// once saved, redirect back to the view page
	header("Location: verfaq.php"); 
	   
						
	}
 
 }
   // fechar a ligação à base de dados
   mysql_close($db);
 
?> 