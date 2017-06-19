<?php
/* 
 EDITFAQ.PHP
 Allows user to edit specific entry in database
*/

 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 
require_once("lib/raelgc/view/Template.php");
use raelgc\view\Template;
 
 
// connect to the database
 include("includes/db.inc");
 $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
    // confirm that the 'id' value is a valid integer before getting the form data
	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
    //if (is_numeric($_POST['id']))
    {
		
       // get form data, making sure it is valid
       $id = $_GET['id'];
	   $cat_id = @ mysql_real_escape_string(htmlspecialchars($_POST['cat_id']));
       $nome = @ mysql_real_escape_string(htmlspecialchars($_POST['nome']));
	   $descricao = @ mysql_real_escape_string(htmlspecialchars($_POST['descricao']));
	   
 
       // check that filled in
       if ($cat_id == '' || $nome == '' || $descricao == '')
       {
          // generate error message
          $error = 'ERROR: Please fill in all required fields!';
 
          //error, display form
		  
          // Carrega o template novopro.html
		  $tpl = new Template("editfaq.html");
		  
		  // Mostra a tabela
		  $tpl->show();
		  
       }
       else
       {
          // save the data to the database
          @ mysql_query("UPDATE perguntas SET cat_id='$cat_id', nome='$nome', descricao='$descricao' WHERE id_faq=$id")
          or die(mysql_error()); 
 
          // once saved, redirect back to the view page
          header("Location: verfaq.php"); 
       }
    }
    else
    {
       // if the 'id' isn't valid, display an error
       echo 'Error!';
       
    }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
    // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
    {
		// get id value
		$id = $_GET['id'];
		/////
		// criar query numa string
		$query  = "SELECT * FROM perguntas WHERE id_faq=$id";
   
		// executar a query
		if(!($result = @ mysql_query($query,$db )))
			showerror();

		// Carrega o template novofaq.html
		$tpl = new Template("editfaq.html");


		// mostra o resultado da query utilizando o template

		$tuple = mysql_fetch_array($result,MYSQL_ASSOC);
      
		$tpl->IDFAQ = $tuple["id_faq"];
		$tpl->CATID = $tuple["cat_id"];
		$tpl->NOME =  $tuple["nome"];
		$tpl->DESCRICAO = $tuple["descricao"];
		      
		// Faz o parse do bloco PERGUNTAS
		$tpl->block("BLOCK_PERGUNTAS");

		} // end for

		// Mostra a tabela
		$tpl->show();

		// fechar a ligação à base de dados
		mysql_close($db);
	} // end if 
			
		
?>