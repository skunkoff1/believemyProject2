<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" sizes="16x16" href="ressources/logo/final16px.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DIDRICH Damien | PHP Blog/Portfolio</title>
    <script src="https://cdn.tiny.cloud/1/6vyldap08tf4dft2363wjdktfdg6vuyfn8fvg1ubc40e0emd/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="ressources/css/style.css">
</head>

<body>
    <?php include('components/header.php'); ?>

    <header class="container-sm">
        <div class="header-title">
            <h2>Bienvenue dans la section de gestion des Projets</h2>
        </div>
        <div class="buttonDiv">
            <button type="button" class="btn btn-primary" id="addProject">Ajouter un projet</button>
            <button type="button" class="btn btn-primary" id="modifyProject">Modifier un projet</button>
            <button type="button" class="btn btn-primary" id="deleteProject">Supprimer un projet</button>
        </div>
    </header>
    <div class="container-sm text-center">
        <h1 class="title">Voici vos projets <?php if (isset($_SESSION['connect'])) { ?>
            <?= $_SESSION['pseudo'] ?>
            <?php } ?></h1>
    </div>
    <section>
        <div class="container d-flex flex-wrap articles">
            <?php
            foreach ($projectArray as $project) { ?>
            <div class="card">
                <img class="card-image" src="ressources/images/<?= $project->getImg() ?>">
                <div class="card-body">
                    <h1 class="card-title"><?= $project->getTitle() ?></h1>
                    <p class="card-text"><?= $project->getResume() ?></p>
                </div>
                <div class="card-footer">
                    <a href="index.php?page=adminProject&mode=edit&id=<?= $project->getId() ?>"
                        class="btn btn-warning">Modifier ce project</a>
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