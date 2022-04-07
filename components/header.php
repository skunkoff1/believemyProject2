<nav class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
    <a href="index.php?page=accueil"><img class="navlogo" src="ressources/logo/navlogo.png" alt="logo site"></a>


    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <?php if (isset($_SESSION['connect'])) { ?>
        <li><a href="index.php?page=adminHome" class="nav-link px-12 link-primary">Home</a></li>
        <?php } else { ?>
        <li><a href="index.php?page=accueil" class="nav-link px-12 link-primary">Home</a></li>
        <?php } ?>

        <?php if (isset($_SESSION['connect'])) { ?>
        <li><a href="index.php?page=adminProject" class="nav-link px-12 link-light">Gestion des Projets</a></li>
        <?php } else { ?>
        <li><a href="index.php?page=allProjects" class="nav-link px-12 link-light">Tous les Projets</a></li>
        <?php } ?>

        <?php if (isset($_SESSION['connect'])) { ?>
        <li><a href="index.php?page=adminArticle" class="nav-link px-12 link-light">Gestion du Blog</a>
        </li>
        <?php } else { ?>
        <li><a href="index.php?page=allArticles" class="nav-link px-12 link-light">Tous les billets de Blog</a></li>
        <?php } ?>
    </ul>

    <div class="d-flex justify-content-end col-md-3 text-end">
        <?php if (isset($_SESSION['connect'])) { ?>
        <div>
            <p>Bienvenue <?= $_SESSION['pseudo'] ?></p>
        </div>
        <?php } ?>
        <?php if (isset($_SESSION['connect'])) { ?>
        <button id="logoutBtn" type="button" class="btn logBtn btn-outline-light me-2">Logout</button>
        <?php } else { ?>
        <button id="loginBtn" type="button" class="btn logBtn btn-outline-light me-2">Login</button>
        <?php } ?>
    </div>
</nav>