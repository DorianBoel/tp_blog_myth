<header class="m-auto pt-2 is-flex is-justify-content-space-between">
    <a href="index.php">
        <img class="img-logo ml-1" src="assets/img/logo.png" alt="Logo Hekatoncheires" loading="lazy">
    </a>
    <?php if ($login) { ?>
        <div class="mr-3 is-flex is-flex-direction-column is-justify-content-center is-align-items-end">
            <p class="has-text-weight-semibold">
                Bienvenue, <?=(($isAdmin == 1) ? "ADMIN ": "").htmlspecialchars($loginUser)?>.
            </p>
            <a href="index.php" class="mt-2">Liste des articles</a>
            <?php if ($isAdmin == 1) { ?>
                <a href="tp_blog_myth_add_article_view.html.php">Ajouter un article</a>
            <?php } ?>
            <a href="tp_blog_myth_logout.php" class="mt-2 has-text-weight-semibold">Se déconnecter</a>
        </div>
    <?php } else { ?>
        <div class="mr-3 is-flex is-flex-direction-column is-justify-content-center">
            <a href="tp_blog_myth_login_view.html.php" class="mb-2 button is-warning">Se connecter</a>
            <a href="tp_blog_myth_register_view.html.php" class="button is-warning is-light">S'inscrire</a>
        </div>
    <?php } ?>
</header>
<div class="pattern-separator bg-line mt-3"></div>
