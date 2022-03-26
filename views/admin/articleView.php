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
    <link rel="stylesheet" href="../../ressources/css/style.css">
</head>

<body>
    <?php include('../../components/header.php'); ?>

    <div class="container buttonDiv">
        <button type="button" class="btn btn-primary">Ajouter un article</button>
        <button type="button" class="btn btn-primary">Modifier un article</button>
        <button type="button" class="btn btn-primary">Supprimer un article</button>
    </div>
    <div class="container tiny">
        <form method="post" action="/controllers/admin/articleController.php" enctype="multipart/form-data">
            <label for="title">Titre de l'article</label>
            <input type="text" name="title">
            <div id="inputDiv">
                <label for="headImg">Image d'illustration de l'article</label>
                <input type="file" name="headImg" accept="image/*" onchange="openFile(event)" />
                <img id="output" src="">
            </div>
            <textarea id="mytextarea" name="article"></textarea>
            <input name="image" type="file" id="upload" onchange="">
            <button type="submit" class="btn btn-outline-success">Envoyer</button>
        </form>
    </div>

    <script>
    tinymce.init({
        selector: 'textarea',
        paste_data_images: true,
        plugins: 'a11ychecker advcode casechange export formatpainter image linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table image',
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
    <script src="../../ressources/js/script.js"></script>
    <script src="../../ressources/js/fileupload.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>