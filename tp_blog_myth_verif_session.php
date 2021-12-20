<?php
$login = (isset($_COOKIE['id']) || isset($_SESSION['id']));
if ($login) {
    $userId = isset($_COOKIE['id']) ? $_COOKIE['id'] : $_SESSION['id'];
    $loginUser = isset($_COOKIE['pseudo']) ? $_COOKIE['pseudo'] : $_SESSION['pseudo'];
    $isAdmin = isset($_COOKIE['is_admin']) ? $_COOKIE['is_admin'] : $_SESSION['is_admin'];
}
?>
