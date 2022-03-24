<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Bienvenue sur mon blog</title>
    <link rel="stylesheet" href="../ressources/css/style.css">
</head>

<body>
    <?php include('../components/header.php'); ?>
    <div class="form-container">
        <h2>Formulaire d'enregistrement</h2>
        <form action="../controllers/registerController.php" method="post">
            <label for="name">Votre pseudo ou nom</label>
            <input type="text" name="name" <?php if(isset($_GET['name'])) {echo 'value="'.$_GET['name'].'"'; } ?>>
            <label for="email">Votre email</label>
            <input type="email" name="email" <?php if(isset($_GET['mail'])) {echo 'value="'.$_GET['mail'].'"'; } ?>>
            <label for="password">Votre mot de passe</label>
            <input type="password" name="password">
            <label for="password2">Confirmer le mot de passe</label>
            <input type="password" name="password2">
            <button class="btn btn-outline-success" type="submit">Soumettre</button>
        </form>

        <?php if (isset($_GET['error']) && isset($_GET['messageName'])) { ?>
        <div class="alert error">
            <p>Veuillez renseigner votre pseudo</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['messageEmail'])) { ?>
        <div class="alert error">
            <p>Veuillez renseigner votre email</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['usedEmail'])) { ?>
        <div class="alert error">
            <p>Email déjà utilisé</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['usedName'])) { ?>
        <div class="alert error">
            <p>Pseudo déjà utilisé</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['messageInvalidEmail'])) { ?>
        <div class="alert error">
            <p>L'email est invalide</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['messagePassword'])) { ?>
        <div class="alert error">
            <p>Veuillez renseigner votre mot de passe</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['messageInvalidPassword'])) { ?>
        <div class="alert error">
            <p>Le mot de passe doit contenir au moins 8 caractères, dont au moins une majuscule et un chiffre</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['messagePassword2'])) { ?>
        <div class="alert error">
            <p>Veuillez confirmer votre mot de passe</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['messageNotEqualsPassword'])) { ?>
        <div class="alert error">
            <p>Les mots de passe sont différents</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['messageSuccess'])) { ?>
        <div class="alert success">
            <p>Vous êtes maintenant connecté. <a href="./loginView.php">Inscrivez vous</a>.</p>
        </div>
        <?php } ?>
        <div>
            <button class="btn btn-outline-primary" type="button" id="loginBtn2">Se connecter</button>
        </div>
    </div>


    <script src="../ressources/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>