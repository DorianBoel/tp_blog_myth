<?php
session_start();
    include_once "tp_blog_myth_db_func.php";
    include_once "tp_blog_myth_verif_session.php";
    $allArticles = selectAllArticles();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>HEKATONCHEIRES - Blog Mythologie Grecque</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="assets/script/bulmaScript.js" defer></script>
</head>
<body>
<?php include_once "tp_blog_myth_header.html.php" ?>
<h1 class="pt-5 is-size-2 has-text-centered">Mythes et Legendes</h1>

<div class="container is-fluid">
    <?php if (isset($_GET["register"])) {
            if ($_GET["register"] == "success") { ?>
                <div class="notification is-warning is-light">
                    <button class="delete"></button>
                    Compte enregistré avec succès
                </div>
            <?php } 
        }?>
    <div class="columns pb-6 is-flex is-justify-content-center">
        <div class="column is-four-fifths">
            <?php foreach($allArticles as $article) { 
                $date = new DateTime($article->date_article); ?>
                <div id="<?=($article->id_article)?>" class="card mt-5 p-5 is-flex is-justify-content-space-between">
                    <div class="is-flex is-flex-direction-column is-justify-content-center">
                        <small class=""><?=$date->format('d/m/Y à H:i')?></small>
                        <h2 class="title is-4"><?=htmlspecialchars($article->titre_article)?></h2>
                        <p class="mb-4"><?=htmlspecialchars($article->resume_article)?></p>
                        <small><?=substr(htmlspecialchars($article->contenu_article), 0, 250)."(...)"?></small>
                        <a class="is-size-5 has-text-weight-semibold is-underlined" href="tp_blog_myth_display_article_view.html.php?article=<?=$article->id_article?>">Lire la suite >></a>
                    </div>
                    <img src="assets/img/<?=$article->image_article?>" alt="<?=$article->titre_article?>">
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
?>
</body>

</html>
