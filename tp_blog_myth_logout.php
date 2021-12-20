<?php
session_start();

session_destroy();
setcookie('id', "", 1);
setcookie('pseudo', "", 1);
setcookie('is_admin', "", 1);

header("Location: index.php");
?>
