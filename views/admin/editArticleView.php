<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/6vyldap08tf4dft2363wjdktfdg6vuyfn8fvg1ubc40e0emd/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Bienvenue sur mon blog</title>
    <link rel="stylesheet" href="ressources/css/style.css">
</head>

<body>
    <?php include('components/header.php'); ?>

    <header class="container buttonDiv">
        <button type="button" class="btn btn-primary" id="addArticle">Ajouter un article</button>
        <button type="button" class="btn btn-primary" id="modifyArticle">Modifier un article</button>
        <button type="button" class="btn btn-primary" id="deleteArticle">Supprimer un article</button>
    </header>
    <div class="container-sm text-center">
        <h1 class="title">Voici vos articles <?php if (isset($_SESSION['connect'])) { ?>
            <?=$_SESSION['pseudo']?>
            <?php } ?></h1>
    </div>
    <section>
        <div class="container d-flex flex-wrap articles">
            <?php
            foreach ($articleArray as $article) { ?>
            <div class="card">
                <img class="card-image" src="ressources/images/<?= $article->getHeadImg() ?>">
                <div class="card-body">
                    <h1 class="card-title"><?= $article->getTitle() ?></h1>
                    <p class="card-text"><?= $article->getResume() ?></p>
                </div>
                <div class="card-footer">
                    <a href="index.php?page=adminArticle&mode=edit&id=<?= $article->getId() ?>"
                        class="btn btn-warning">Modifier cet article</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <?php include('components/footer.php'); ?>

    </script>
    <script src="ressources/js/script.js"></script>
    <script src="ressources/js/fileupload.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>