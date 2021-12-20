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
	<title>Connexion - HEKATONCHEIRES</title>
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
<h1 class="pt-5 is-size-2 has-text-centered">Connexion</h1>
<form class="pt-5 pb-5" action="tp_blog_myth_login.php" method="POST">
    <div class="container is-fluid">
        <div class="field">
            <label class="label">
                Nom d'utilisateur
            </label>
            <div class="control">
                <input  name="username" class="input" type="text" placeholder="Nom d'utilisateur" required>
                <?php if (!empty($error) && $error == "userNotFound") { ?> 
                    <small class="has-text-danger">
                        Utilisateur inexistant
                    </small>
                <?php } ?>
            </div>
        </div>
        <div class="field">
            <label class="label">
                Mot de passe
            </label>
            <div class="control">
                <input name="password" class="input" type="password" placeholder="Mot de passe" required>
                <?php if (!empty($error) && $error == "incorrectPassword") { ?>
                    <small class="has-text-danger">
                        Mot de passe incorrect
                    </small>
                <?php } ?>
            </div>
        </div>
        <?php if (!empty($error) && $error == "emptyInput") { ?>
			<div class="notification is-danger is-light">
                <p>Tous les champs doivent être complétés</p>
            </div>
		<?php } ?>
        <label class="checkbox is-unselectable">
            <input name="rememberMe" type="checkbox">
            Rester connecté
        </label>
        <div class="field mt-3 is-grouped">
            <div class="control">
                <input class="button is-warning is-light" type="submit" value="Se connecter" role="button">
            </div>
        </div>
        <div class="has-text-centered">
			<p>
                Pas encore inscrit ?
                <a href="tp_blog_myth_register_view.html.php" class="is-underlined has-text-weight-semibold">
                    Créer un compte
                </a>
            </p>
		</div>
    </div>
</form>

</body>

</html>
