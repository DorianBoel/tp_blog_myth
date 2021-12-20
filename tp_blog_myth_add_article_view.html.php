<?php
session_start();
include_once "tp_blog_myth_db_func.php";
include_once "tp_blog_myth_verif_session.php";
if (isset($_GET['error'])) {
	$error = $_GET['error'];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Ajouter un article - HEKATONCHEIRES</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="assets/script/bulmaScript.js" defer></script>
</head>
<body>

<?php
include_once "tp_blog_myth_header.html.php";
if ($login && $isAdmin == 1) {
?>
<h1 class="pt-3 is-size-2 has-text-centered">Ajouter un article</h1>
<form class="pt-5 pb-5" action="tp_blog_myth_add_article.php" method="POST" enctype="multipart/form-data">
    <div class="container is-fluid">
        <?php if (isset($_GET["add"])) { ?>
            <div class="notification is-warning is-light">
                <button class="delete"></button>
                L'article <a class="has-text-weight-semibold" href="tp_blog_myth_display_article_view.html.php?article=<?=selectArticle($_GET["add"])->id_article?>">"<?=selectArticle($_GET["add"])->titre_article?>"</a> a bien été publié.
            </div>
        <?php } ?>
        <div class="field">
            <label class="label">
                Titre de l'article (50 caractères max.)
            </label>
            <div class="control">
                <input  name="articleTitle" class="input" type="text" placeholder="Titre de l'article (50 caractères max.)" maxlength="50" autocomplete="on" required>
                <?php if (!empty($error) && strstr($error, "title")) { ?>
                    <small class="has-text-danger">
                        Le titre ne doit pas comprendre plus de 50 caractères
                    </small>
                <?php } ?>
            </div>
        </div>
        <div class="field">
            <label class="label">
                Résumé de l'article (150 caractères max.)
            </label>
            <div class="control">
                <textarea name="articleSummary" class="textarea" type="text" placeholder="Résumé de l'article (150 caractères max.)" maxlength="150" autocomplete="on" required></textarea>
                <?php if (!empty($error) && strstr($error, "summary")) { ?>
                    <small class="has-text-danger">
                        Le résumé ne doit pas comprendre plus de 150 caractères
                    </small>
                <?php } ?>
            </div>
        </div>
        <div class="field">
            <label class="label">Illustration</label>
            <div class="file is-normal has-name">
                <label class="file-label">
                    <input name="articleImg" class="file-input" type="file" autocomplete="on" required>
                    <span class="file-cta">
                        <span class="file-label">
                            Selectionnez une image…
                        </span>
                    </span>
                    <span class="file-name">
                        Aucun fichier selectionnné
                    </span>
                </label>
                
            </div>
            <?php if (!empty($error)) {
                if (strstr($error, "fileExtension")) { ?>
                    <small class="has-text-danger">
                        Le fichier doit avoir l'extension .jpg ou .png
                    </small><br>
                <?php }
                if (strstr($error, "fileSize")) { ?>
                    <small class="has-text-danger">
                        Le fichier est trop lourd (max. 1Mo)
                    </small><br>
                <?php }
            } ?>
        </div>
        <div class="field">
            <label class="label">
                Contenu de l'article (100 caractères min.)
            </label>
            <div class="control">
                <textarea name="articleContent" class="textarea" type="text" placeholder="Contenu de l'article (100 caractères min.)" minlength="100" autocomplete="on" required></textarea>
                <?php if (!empty($error) && strstr($error, "content")) { ?>
                    <small class="has-text-danger">
                        Le résumé doit comprendre au moins 100 caractères
                    </small>
                <?php } ?>   
            </div>
        </div>
        <?php if (!empty($error)) {
            if ($error == "emptyInput") { ?>
                <div class="notification is-danger is-light">
                    <p>Tous les champs doivent être complétés</p>
                </div>
            <?php } elseif ($error == "dbError") { ?>
                <div class="mt-2 notification is-danger is-light">
                    <p>Une erreur est survenue lors de la publication de l'article. Veuillez réessayer</p>
                </div>
            <?php } elseif ($error == "fileError") { ?>
                <div class="mt-2 notification is-danger is-light">
                    <p>L'image n'a pas pu être enregistrée. Veuillez réessayer</p>
                </div>
            <?php }
        } ?>
        <div class="field mt-3 pb-6 is-grouped">
            <div class="control">
                <input class="button is-warning is-light" type="submit" value="Publier l'article" role="button">
            </div>
        </div>
    </div>
</form>
<?php } else { ?>
    <div class="container is-fluid">
        <div class="mt-2 notification is-danger is-light">
            Vous n'avez pas les droits requis pour accéder à cette page
        </div>
    </div>
<?php } ?>
</body>

</html>
