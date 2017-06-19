<?php

require_once("lib/raelgc/view/Template.php");
use raelgc\view\Template;

// connect to the database
include("includes/db.inc");
 
// ligação à base de dados
$db = dbconnect($hostname,$db_name,$db_user,$db_passwd); 
 if($db) {
     
   // criar query numa string
   $queryc  = "SELECT * FROM categorias";
   
   // executar a query
   if(!($resultc = @ mysql_query($queryc,$db )))
    showerror();

   // Cria um novo objecto template
   $tpl = new Template("vercat.html");

   
   // mostra o resultado da query utilizando o template

   	$nrowsc  = mysql_num_rows($resultc);
    for($i=0; $i<$nrowsc; $i++) {
      $tuplec = mysql_fetch_array($resultc,MYSQL_ASSOC);
      
      $tpl->IDCAT = $tuplec["id_cat"];
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