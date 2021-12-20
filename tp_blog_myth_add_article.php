<?php
session_start();
include_once "tp_blog_myth_db_func.php";
include_once "tp_blog_myth_valid_func.php";
include_once "tp_blog_myth_verif_session.php";
if (!$login) {
    header("Location: index.php");
}

if (!empty(trim($_POST["articleTitle"])) && !empty(trim($_POST["articleSummary"])) && !empty($_FILES["articleImg"]) && !empty(trim($_POST["articleContent"]))) {
    $error = "";
    if (!verifyLength($_POST["articleTitle"], 50)) {
        $error = "title";
    }
    if (!verifyLength($_POST["articleSummary"], 150)) {
        $error .= "-summary";
    }
    if (!verifyLength($_POST["articleContent"], 100, "minimum")) {
        $error .= "-content";
    }
    if (empty($error)) {
        $checkFile = verifyFile($_FILES["articleImg"]);
        if (is_bool($checkFile)) {
            $time = time();
            $imgName = "$time.".pathinfo($_FILES["articleImg"]["name"])["extension"];
            if (move_uploaded_file($_FILES["articleImg"]["tmp_name"], "assets/img/$imgName")) {
                $result = addArticle($_POST["articleTitle"], $_POST["articleSummary"], $imgName, $_POST["articleContent"], $userId);
                if ($result) {
                    header("Location: tp_blog_myth_add_article_view.html.php?add=".selectArticle($imgName, "image_article")->id_article);
                } else {
                    $error = "dbError";
                    header("Location: tp_blog_myth_add_article_view.html.php?error=$error");
                }
            } else {
                $error = "fileError";
                header("Location: tp_blog_myth_add_article_view.html.php?error=$error");
            }
        } else {
            $error .= "-$checkFile";
            header("Location: tp_blog_myth_add_article_view.html.php?error=$error");
        }
    } else {
        header("Location: tp_blog_myth_add_article_view.html.php?error=$error");
    }
} else {
    $error = "emptyInput";
    header("Location: tp_blog_myth_add_article_view.html.php?error=$error");
}
?>
