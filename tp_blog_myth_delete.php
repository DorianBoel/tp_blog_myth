<?php
session_start();
include_once "tp_blog_myth_db_func.php";
include_once "tp_blog_myth_verif_session.php";
if (!$login || $isAdmin != 1) {
    header("Location: index.php");
}
if (!isset($_GET["article"])) {
    header("Location: index.php");
} elseif (!empty(selectArticle($_GET["article"])))  {
    if (deleteArticle($_GET["article"])) {
        header("Location: tp_blog_myth_delete_confirm_view.html.php?deleted=ok");
    } else {
        header("Location: tp_blog_myth_delete_confirm_view.html.php?erorr=dbError");
    }
} else {
    header("Location: tp_blog_myth_delete_confirm_view.html.php?error=notFound");
}
?>
