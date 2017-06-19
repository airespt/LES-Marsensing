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
	$cat_id = @ mysql_real_escape_string(htmlspecialchars($_POST['cat_id']));
    $nome = @ mysql_real_escape_string(htmlspecialchars($_POST['nomeper']));
	$descricao = @ mysql_real_escape_string(htmlspecialchars($_POST['descricao']));
		

if ($cat_id == '' || $nome == '' || $descricao == '')
   {
          // generate error message
          echo 'ERROR: Please fill in all required fields!';
   }
else
   {
	   
	// save the data to the database
	@mysql_query("INSERT perguntas SET cat_id =$cat_id, nome='$nome', descricao='$descricao'")
	or die(mysql_error()); 
 
	// once saved, redirect back to the view page
	header("Location: verfaq.php"); 
	   
						
	}
 
 }
   // fechar a ligação à base de dados
   mysql_close($db);
 
?> 