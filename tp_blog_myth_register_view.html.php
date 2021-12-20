<?php 
session_start();
include_once "tp_blog_myth_verif_session.php";
if ($login) {
    header("Location: index.php");
}

if (isset($_GET['error'])) {
	$error = $_GET['error'];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inscription - HEKATONCHEIRES</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>

<body>

<div class="m-auto pt-2">
    <a href="index.php">
        <img class="img-logo ml-1" src="assets/img/logo.png" alt="Logo Hekatoncheires" loading="lazy">
    </a>
</div>
<div class="pattern-separator bg-line mt-3"></div>
<h1 class="pt-5 is-size-2 has-text-centered">Inscription</h1>
<form class="pt-5 pb-5" action="tp_blog_myth_register.php" method="POST">
    <div class="container is-fluid">
        <div class="field">
            <label class="label">Nom d'utilisateur</label>
            <div class="control">
                <input name="username" class="input" type="text" placeholder="Nom d'utilisateur" required>
            </div>
            <?php if (!empty($error) && $error == "existingUsername") { ?> 
                    <small class="has-text-danger">
                        Ce nom d'utilisateur est déjà pris
                    </small>
            <?php } ?>
        </div>
        <div class="field">
            <label class="label">Mot de passe</label>
            <div class="control">
                <input name="password" class="input" type="password" placeholder="Mot de passe" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Confirmer le mot de passe</label>
            <div class="control">
                <input name="confirmPassword" class="input" type="password" placeholder="Confirmer le mot de passe" required>
                <?php if (!empty($error) && $error == "diffPassword") { ?> 
                    <small class="has-text-danger">
                        Les mots de passe ne correspondent pas
                    </small>
                <?php } ?>
            </div>
        </div>
        <div class="field mt-3 is-grouped">
            <div class="control">
                <input class="button is-warning is-light" type="submit" value="S'inscrire" role="button">
            </div>
        </div>
        <div class="has-text-centered">
			<p>
                Déjà inscrit ?
                <a href="tp_blog_myth_login_view.html.php" class="is-underlined has-text-weight-semibold">
                    Se connecter
                </a>
            </p>
		</div>
        <?php if (!empty($error)) { ?>
            <div class="mt-2 notification is-danger is-light">
                <?php if (!empty($error) && $error == "emptyInput") { ?>
                    <p>Tous les champs doivent être complétés</p>
                <?php } elseif (!empty($error) && $error == "dbError") {?>
                    <p>Une erreur est survenue lors de la création du compte. Veuillez réessayer</p>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</form>


</body>

</html>
