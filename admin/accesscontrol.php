<?php 

include_once 'includes/common.inc';
include_once 'includes/db.inc';

require_once("lib/raelgc/view/Template.php");
use raelgc\view\Template;

$uid = isset($_POST['uid']) ? $_POST['uid'] : $_SESSION['uid'];
$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : $_SESSION['pwd'];

if(!isset($uid))
  header("Location: login.html");

$_SESSION['uid'] = $uid;
$_SESSION['pwd'] = $pwd;

$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);

$query = "SELECT * FROM admins 
          WHERE utilizador = '$uid' 
            AND senha = '$pwd'";
$result = @mysql_query($query,$db );
$tuple = mysql_fetch_array($result,MYSQL_ASSOC);
if (!$result)
  error('A database error occurred while checking your login details.');

if (mysql_num_rows($result) == 0) {
  unset($_SESSION['uid']);
  unset($_SESSION['pwd']);
  header('Location: login.html');
  exit;
}

$_SESSION['username'] = $tuple["utilizador"];

// Cria um novo objecto template
   $tpl = new Template("admin.html");
   
   $tpl->IDADM =  $_SESSION['username'];
          
   // Faz o parse do bloco ADMIN
   $tpl->block("BLOCK_ADMIN");


// Mostra a tabela
   $tpl->show();

   // fechar a ligação à base de dados
   mysql_close($db);

?>