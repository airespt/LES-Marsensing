<?php 

require_once("lib/raelgc/view/Template.php");
use raelgc\view\Template;

// connect to the database
include("includes/db.inc");
$db = dbconnect($hostname,$db_name,$db_user,$db_passwd); 

// Cria um novo objecto template
   $tpl = new Template("admin.html");
   
   $tpl->IDADM = $_SESSION['username'];
          
// Faz o parse do bloco ADMIN
   $tpl->block("BLOCK_ADMIN");

// Mostra a tabela
   $tpl->show();
 
?>