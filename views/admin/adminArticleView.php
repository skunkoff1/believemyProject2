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

    <header class="container-sm">
        <div class="header-title">
            <h2>Bienvenue dans la section de gestion des articles</h2>
        </div>
        <div class="buttonDiv">
            <button type="button" class="btn btn-primary" id="addArticle">Ajouter un article</button>
            <button type="button" class="btn btn-primary" id="modifyArticle">Modifier un article</button>
            <button type="button" class="btn btn-primary" id="deleteArticle">Supprimer un article</button>
        </div>
    </header>
    <section>
        <div class="container-sm">
            <?php if ($error == 0 && $message != '') { ?>
            <div class="alert success">
                <p><?= $message ?></p>
            </div>
            <?php } ?>
            <?php if ($error == 1 && $message != '') { ?>
            <div class="alert error">
                <p><?= $message ?></p>
            </div>
            <?php } ?>
        </div>
        <div class="container-sm">
            <h2><?= $pageMode ?></h2>
        </div>
        <div class="container-sm tiny">
            <form method="post"
                action="index.php?page=adminArticle<?php if ($mode == "edit") { ?>&mode=edit&id=<?= $id ?><?php } ?>"
                enctype="multipart/form-data">
                <label for="title">Titre de l'article</label>
                <input type="text" name="title" <?php if ($article != null) { ?> value="<?= $article->getTitle() ?>"
                    <?php } ?>>
                <div id="inputDiv">
                    <label for="headImg">Image d'illustration de l'article</label>
                    <input type="file" name="headImg" accept="image/*" onchange="openFile(event)" />
                    <img id="output"
                        src="<?php if ($article != null) { ?>ressources/images/<?= $article->getHeadImg() ?><?php } ?> ">
                </div>
                <label for="article">Contenu de l'article</label>
                <textarea id="mytextarea"
                    name="article"><?php if ($article != null) { ?><?= $article->getContent() ?><?php } ?></textarea>
                <input name="image" type="file" id="upload">
                <label for="tagSelect">Chosir la catégorie de l'article</label>
                <select name="tagSelect">
                    <?php
                    foreach ($tagArray as $tag) { ?>
                    <option value="<?= $tag ?>"><?= $tag ?></option>
                    <?php } ?>
                </select>
                <button type="submit" class="btn btn-outline-success">Envoyer</button>
            </form>
        </div>
    </section>

    <?php include('components/footer.php'); ?>

    <script>
    tinymce.init({
        selector: 'textarea',
        paste_data_images: true,
        plugins: 'a11ychecker advcode image casechange export formatpainter image linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck image addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table image',
        toolbar_mode: 'floating',
        file_picker_callback: function(callback, value, meta) {
            if (meta.filetype == 'image') {
                $('#upload').trigger('click');
                $('#upload').on('change', function() {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        callback(e.target.result, {
                            alt: ''
                        });
                    };
                    reader.readAsDataURL(file);
                });
            }
        },
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
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