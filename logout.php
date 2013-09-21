<?php
setcookie("SCP-u", "", time() - 3600); 
setcookie("SCP-p", "", time() - 3600);
header("Location: login.php"); 
?>