<?php
session_start();
    include_once "tp_blog_myth_db_func.php";
    include_once "tp_blog_myth_verif_session.php";
    if (!isset($_GET["article"])) {
        header("Location: index.php");
    }
    $currentArticle = selectArticle($_GET["article"]);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title><?=htmlspecialchars($currentArticle->titre_article)?> - HEKATONCHEIRES</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="assets/script/bulmaScript.js" defer></script>
</head>
<body>
<?php include_once "tp_blog_myth_header.html.php";?>
<div class="container is-fluid">
    <?php if (!empty($currentArticle)) { 
        $currentArticleDate = new DateTime($currentArticle->date_article); ?>
        <?php if ($login && $isAdmin == 1) { ?>
            <div class="is-flex is-justify-content-end delete-article-div">
                <a class="button mt-5 is-danger is-light" href="tp_blog_myth_delete_confirm_view.html.php?article=<?=$currentArticle->id_article?>">Supprimer l'article</a>
            </div>
        <?php } ?>
        <div class="p-3 columns is-flex is-flex-direction-column is-align-items-center">
            <div class="is-flex pt-5 pb-3 is-flex-direction-column is-align-items-center max-width-max-content">
                <h1 class="is-size-3 has-text-centered"><?=htmlspecialchars($currentArticle->titre_article)?></h1>
                <div>
                    <small><?=htmlspecialchars("Publié par ".$currentArticle->pseudo_user." le ".$currentArticleDate->format("d/m/Y à H:i"))?></small>
                </div>
            </div>
            <div>
                <img class="article-img" src="assets/img/<?=$currentArticle->image_article?>">
            </div>
            <div class="column is-four-fifths">
                <p class="p-5"><?=nl2br(htmlspecialchars($currentArticle->contenu_article))?></p>
            </div>
        </div>
    <?php } else { ?>
        <div class="notification mt-5 is-danger is-light">
            Cet article n'existe pas ou a été supprimé. <a href="index.php" class="has-text-weight-semibold">Retour à la liste des articles</a>
        </div>
    <?php } ?>
</div>
