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
    <section>
        <article class="container-sm articles d-flex justify-content-between">
            <div>
                <img class="article-img" src="/ressources/images/<?= $article->getHeadImg() ?>">
            </div>
            <div>
                <h1 class="title"><?= $article->getTitle() ?></h1>
                <p classe="article-content"><?= $article->getContent() ?></p>
            </div>
        </article>
    </section>

    <?php include('components/footer.php'); ?>

    <script src=" ressources/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>