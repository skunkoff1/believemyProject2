let loginBtn = document.getElementById('loginBtn');
if (loginBtn != null) {
    loginBtn.addEventListener("click", () => {
        window.location.href = "index.php?page=login";
    });

}

let loginBtn2 = document.getElementById('loginBtn2');
if (loginBtn2 != null) {
    loginBtn2.addEventListener("click", () => {
        window.location.href = "index.php?page=login";
    });

}

let registerBtn = document.getElementById('registerBtn');
if (registerBtn != null) {
    registerBtn.addEventListener("click", () => {
        window.location.href = "index.php?page=register";
    })
}

let logoutBtn = document.getElementById('logoutBtn');
if (logoutBtn != null) {
    logoutBtn.addEventListener("click", () => {
        window.location.href = "index.php?page=logout";
    })
}

let addArticleBtn = document.getElementById('addArticle');
if (addArticleBtn != null) {
    addArticleBtn.addEventListener("click", () => {
        window.location.href = "index.php?page=adminArticle&mode=add";
    })
}

let modifyArticleBtn = document.getElementById('modifyArticle');
if (modifyArticleBtn != null) {
    modifyArticleBtn.addEventListener("click", () => {
        window.location.href = "index.php?page=adminEditArticle";
    })
}

let deleteArticleBtn = document.getElementById('deleteArticle');
if (deleteArticleBtn != null) {
    deleteArticleBtn.addEventListener("click", () => {
        window.location.href = "index.php?page=adminDeleteArticle";
    })
}