<?php

 // connect to the database
 include("includes/db.inc");
  
 $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
  
 $nome = mysql_real_escape_string(htmlspecialchars($_POST['nomecat']));
  
 // check to make sure fields are entered
 if ($nome == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 }
 else
 {
 // save the data to the database
 @mysql_query("INSERT categorias SET nome='$nome'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: vercat.php"); 
 }
 }
 
   mysql_close($db);
 
?> 