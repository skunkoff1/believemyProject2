<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Bienvenue sur mon blog</title>
    <link rel="stylesheet" href="../ressources/css/style.css">
</head>

<body>
    <?php include('components/header.php'); ?>

    <header class="container">
        <h1>Bienvenue <?php if (isset($_SESSION['connect'])) {
                            echo $_SESSION['pseudo'];
                        } ?></h1>
    </header>
    <section>
        <div class="container d-flex articles">
            <?php
            foreach ($articleArray as $article) { ?>
                <div class="card">
                    <img class="card-image" src="ressources/images/<?= $article->getHeadImg() ?>">
                    <div class="card-body">
                        <h1 class="card-title"><?= $article->getTitle() ?></h1>
                        <p class="card-text"><?= $article->getResume() ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="index.php?page=displayArticle&id=<?= $article->getId() ?>" class="btn btn-primary">Lire l'article</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <?php include('components/footer.php'); ?>

    <script src="ressources/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>