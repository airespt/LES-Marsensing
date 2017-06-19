<?php

require_once("lib/raelgc/view/Template.php");
use raelgc\view\Template;

// connect to the database
include("includes/db.inc");
 
// ligação à base de dados
$db = dbconnect($hostname,$db_name,$db_user,$db_passwd); 

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) 
	{
	   // get form data, making sure it is valid
       $id = $_GET['id'];
	}

 if($db) {
		   
   // criar query numa string
   $query  = "SELECT * FROM perguntas where cat_id = $id";
   
   // executar a query
   if(!($result = @mysql_query($query,$db )))
     showerror();
   
   // Cria um novo objecto template
   $tpl = new Template("verfaq.html");

   
   // mostra o resultado da query utilizando o template

   $nrows  = mysql_num_rows($result);
    for($i=0; $i<$nrows; $i++) {
      $tuple = mysql_fetch_array($result,MYSQL_ASSOC);
      
      
      $tpl->IDFAQ = $tuple["id_faq"];
      $tpl->NOME =  $tuple["nome"];
          
      // Faz o parse do bloco PERGUNTAS
      $tpl->block("BLOCK_PERGUNTAS");

    } // end for
	
	// criar query numa string
   $queryc  = "SELECT * FROM categorias";
   
      // executar a query
   if(!($resultc = @mysql_query($queryc,$db )))
    showerror();
	
	$nrowsc  = mysql_num_rows($resultc);
    for($i=0; $i<$nrowsc; $i++) {
      $tuplec = mysql_fetch_array($resultc,MYSQL_ASSOC);
      
      $tpl->IDCAT =  $tuplec["id_cat"];
      $tpl->NOME =  $tuplec["nome"];
          
      // Faz o parse do bloco CATEGORIAS
      $tpl->block("BLOCK_CATEGORIAS");

    } // end for
	
	$tpl->IDADM =  $_SESSION['username'];
	
    // Faz o parse do bloco ADMIN
   $tpl->block("BLOCK_ADMIN");

   // Mostra a tabela
   $tpl->show();

   // fechar a ligação à base de dados
   mysql_close($db);
	
 } // end if 
?> 