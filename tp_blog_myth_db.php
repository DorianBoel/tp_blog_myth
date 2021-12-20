<?php 
try {
    $db = new PDO("mysql:host=localhost;dbname=tp_blog_myth;charset=utf8", "root", "");
} catch (Exception $e) {
    die($e->getMessage());
}
?>
