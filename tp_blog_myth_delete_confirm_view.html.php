<?php
session_start();
    include_once "tp_blog_myth_db_func.php";
    include_once "tp_blog_myth_verif_session.php";
    if (!$login || $isAdmin != 1 || (!isset($_GET["article"]) && !isset($_GET["error"]) && !isset($_GET["deleted"]))) {
        header("Location: index.php");
    }
    if (isset($_GET["article"])) {
        $currentArticle = selectArticle($_GET["article"]);
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Suppression d'article - HEKATONCHEIRES</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>
<?php include_once "tp_blog_myth_header.html.php";?>
<div class="container is-fluid">
    <?php if (!empty($currentArticle)) { ?>
        <div class="notification is-warning mt-5">
            <p>Êtes-vous sûr de vouloir supprimer définitivement l'article "<?=htmlspecialchars($currentArticle->titre_article)?>" ?</p>
            <div>
                <a class="button is-success is-light mr-3" href="tp_blog_myth_delete.php?article=<?=$_GET['article']?>">Oui</a>
                <a class="button is-danger is-light" href="tp_blog_myth_display_article_view.html.php?article=<?=$_GET['article']?>">Non</a>
            </div>
        </div>
    <?php } elseif (isset($_GET["error"])) { ?>
        <div class="notification is-danger is-light mt-5">
            <p>
                <?php if ($_GET["error"] == "notFound") {
                    echo "L'article n'existe pas ou a déjà été supprimé";
                } elseif ($_GET["error"] == "dbError") {
                    echo "Une erreur est survenue lors de la suppression. Veuillez réessayer";
                } ?>
            </p>
        </div>
    <?php } elseif (isset($_GET["deleted"]) && $_GET["deleted"] == "ok") { ?>
        <div class="notification is-warning is-light mt-5">
            <p>L'article a bien été supprimé. <a href="index.php" class="has-text-weight-semibold">Retour à la liste des articles</a></p>
        </div>
    <?php } else {
        header("Location: tp_blog_myth_display_article_view.html.php?article=notFound");
    } ?>
        
</div>
