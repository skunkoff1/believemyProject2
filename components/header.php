<nav>
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <h1>Mon Logo</h1>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <?php if(isset($_SESSION['connect'])) { ?>
            <li><a href="/views/homeView.php" class="nav-link px-12 link-primary">Home</a></li>
            <?php } else { ?>
            <li><a href="/index.php" class="nav-link px-12 link-primary">Home</a></li>
            <?php } ?>
            <li><a href="#" class="nav-link px-12 link-light">Projets</a></li>
            <li><a href="" class="nav-link px-12 link-light">Blog</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <?php if(isset($_SESSION['connect'])) { ?>
            <button id="logoutBtn" type="button" class="btn btn-outline-light me-2">Logout</button>
            <?php } else { ?>
            <button id="loginBtn" type="button" class="btn btn-outline-light me-2">Login</button>
            <?php } ?>
        </div>
    </header>
</nav>