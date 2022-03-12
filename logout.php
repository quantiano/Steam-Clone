<?php
session_start();
session_destroy();
unset($_SESSION['userlevel']);
unset($_SESSION['username']);
unset($_SESSION['userid']);
unset($_SESSION['pid']);
header('Location: index.php');
exit;
?>