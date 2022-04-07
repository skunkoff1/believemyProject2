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
        <div class="form-container">
            <h2>Formulaire de connexion</h2>
            <form action="index.php?page=login" method="post">
                <label for="email">Votre email ou pseudo</label>
                <input type="text" name="email">
                <label for="password">Votre mot de passe</label>
                <input type="password" name="password">
                <button class="btn btn-outline-success button" type="submit">Soumettre</button>
            </form>

            <?php if (isset($_GET['error']) && isset($_GET['messageEmail'])) { ?>
            <div class="alert error">
                <p>Veuillez renseigner votre email ou pseudo</p>
            </div>
            <?php } ?>

            <?php if (isset($_GET['error']) && isset($_GET['messageUser'])) { ?>
            <div class="alert error">
                <p>Email ou pseudo non reconnu</p>
            </div>
            <?php } ?>

            <?php if (isset($_GET['error']) && isset($_GET['messagePassword'])) { ?>
            <div class="alert error">
                <p>Veuillez renseigner votre mot de passe</p>
            </div>
            <?php } ?>

            <?php if (isset($_GET['error']) && isset($_GET['messagePassword2'])) { ?>
            <div class="alert error">
                <p>Le mot de passe est invalide</p>
            </div>
            <?php } ?>

            <?php if (isset($_GET['messageSuccess'])) { ?>
            <div class="alert success">
                <p>Vous êtes maintenant connecté. <a href="../index.php">Inscrivez vous</a>.</p>
            </div>
            <?php } ?>
            <div>
                <button class="btn btn-outline-primary" type="button" id="registerBtn">S'enregistrer</button>
            </div>
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