<?php

require_once("lib/raelgc/view/Template.php");
use raelgc\view\Template;

// connect to the database
include("includes/db.inc");
 
// ligação à base de dados
$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);

 // confirm that the 'id' value is a valid integer before getting the form data
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
    //if (is_numeric($_POST['id']))
 {
		
       // get form data, making sure it is valid
       $id = $_GET['id'];
	   
	   // criar query numa string
	   $query  = "SELECT * FROM pabertas WHERE id_pa=$id";
	   
	   // executar a query
	   if(!($result = @ mysql_query($query,$db )))
		  showerror();
	   
	   
	   // mostra o resultado da query utilizando o template
       $tuple = mysql_fetch_array($result,MYSQL_ASSOC);
	   
	   $idioma = $tuple["idioma_pa"];
       $pergunta = $tuple["pergunta_pa"];
	   $resposta = $tuple["resposta_pa"];
	   
 // check that filled in
       if ($idioma == '' || $pergunta == '' || $resposta == '')
       {
          // generate error message
          $error = 'ERROR: Please fill in all required fields!';
 
          //error, display form
		  
          // Carrega o template novopro.html
		  $tpl = new Template("editpab.html");
		  
		  // Mostra a tabela
		  $tpl->show();
		  
       }
       else
       {
  // save the data to the database
          @ mysql_query("UPDATE pabertas SET faq_pa='S' WHERE id_pa=$id")
          or die(mysql_error()); 
 
  // save the data to the database
		  @mysql_query("INSERT perguntas SET cat_id =$idioma, nome='$pergunta', descricao='$resposta'")
		  or die(mysql_error()); 
 
	// once saved, redirect back to the view page
		  header("Location: verpab.php"); 
	   }
	}
else
    {
       // if the 'id' isn't valid, display an error
       echo 'Error!';
       
    }
 
 
?> 