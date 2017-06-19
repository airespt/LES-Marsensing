<?php
session_start();
//unset($_SESSION['SESS_LOGGEDIN']);
//unset($_SESSION['SESS_USERNAME']);
//unset($_SESSION['SESS_USERID']);
unset($_SESSION['username']);
session_destroy();
header('Location: indexa.html');
?>