<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="ressources/css/style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="ressources/logo/final16px.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DIDRICH Damien | PHP Blog/Portfolio</title>
</head>

<body>
    <?php include('components/header.php'); ?>

    <header class="container-sm text-center">
        <h1 class="title">Bienvenue <?php if (isset($_SESSION['connect'])) { ?>
            <?= $_SESSION['pseudo'] ?>
            <?php } ?> dans votre espace administrateur</h1>
    </header>

    <section>
        <div class="container-sm text-center">
            <h1 class="section-title">Les 6 derniers articles du blog</h1>
        </div>
        <div class="container-sm d-flex flex-wrap articles">
            <?php
            foreach ($articleArray as $article) { ?>
            <article class="card border-secondary">
                <img class="card-image" src="ressources/images/<?= $article->getHeadImg() ?>">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h1 class="card-title text-dark text-capitalize"><?= $article->getTitle() ?></h1>
                    <p class="card-text"><?= $article->getResume() ?></p>
                    <p class="tag border border-2 rounded-1 border-warning"><?= $article->getTag() ?></p>
                </div>
                <div class="card-footer d-flex justify-content-around align-items-baseline">
                    <a href="index.php?page=displayArticle&id=<?= $article->getId() ?>" class="btn btn-primary">Lire
                        l'article</a>
                    <p class="border border-secondary border-2 rounded-1 author">Auteur : <?= $article->getUser() ?></p>
                </div>
            </article>
            <?php } ?>
        </div>
    </section>

    <section>
        <div class="container-sm text-center">
            <h1 class="section-title">Les 6 derniers projets</h1>
        </div>
        <div class="container-sm d-flex flex-wrap articles">
            <?php
            foreach ($projectArray as $project) { ?>
            <article class="card border-secondary">
                <img class="card-image" src="ressources/images/<?= $project->getImg() ?>">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h1 class="card-title text-dark text-capitalize"><?= $project->getTitle() ?></h1>
                    <p class="card-text"><?= $project->getResume() ?></p>
                </div>
                <div class="card-footer d-flex justify-content-around align-items-baseline">
                    <a href="index.php?page=displayProject&id=<?= $project->getId() ?>" class="btn btn-primary">Voir le
                        projet</a>
                    <p class="border border-secondary border-2 rounded-1 author">Auteur : <?= $project->getUser() ?></p>
                </div>
            </article>
            <?php } ?>
        </div>
    </section>

    <?php include('components/footer.php'); ?>

    <script src="ressources/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>