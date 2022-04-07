<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="ressources/css/style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <title>Bienvenue sur mon blog</title>
</head>

<body>
    <?php include('components/header.php'); ?>

    <header class="container-sm text-center">
        <h1>Bienvenue sur ce projet portfolio / blog </h1>
        <hr>
    </header>

    <section>
        <div class="container-sm text-center">
            <h1 class="section-title">Tous les projets</h1>
        </div>
        <div class="container-sm d-flex flex-wrap articles">

            <?php
            foreach ($projectArray as $project) { ?>
            <article class="card border-primary">
                <img class="card-image" src="ressources/images/<?= $project->getImg() ?>">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h1 class="card-title"><?= $project->getTitle() ?></h1>
                    <p class="card-text"><?= $project->getResume() ?></p>
                </div>
                <div class="card-footer d-flex justify-content-around align-items-baseline">
                    <a href="index.php?page=displayArticle&id=<?= $project->getId() ?>" class="btn btn-primary">Lire
                        l'article</a>
                    <p class="border border-primary border-2 rounded-1 author">Auteur : <?= $project->getUser() ?></p>
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