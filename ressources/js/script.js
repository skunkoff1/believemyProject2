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

let addProjectBtn = document.getElementById('addProject');
if (addProjectBtn != null) {
    addProjectBtn.addEventListener("click", () => {
        window.location.href = "index.php?page=adminProject&mode=add";
    })
}

let modifyProjectBtn = document.getElementById('modifyProject');
if (modifyProjectBtn != null) {
    modifyProjectBtn.addEventListener("click", () => {
        window.location.href = "index.php?page=adminEditProject";
    })
}

let deleteProjectBtn = document.getElementById('deleteProject');
if (deleteProjectBtn != null) {
    deleteProjectBtn.addEventListener("click", () => {
        window.location.href = "index.php?page=adminDeleteProject";
    })
}

let addTagBtn = document.getElementById('addTag');
if (addTagBtn != null) {
    addTagBtn.addEventListener("click", () => {
        let form = document.getElementById("tagForm");
        form.style.display = "block";
    })
}


let footerText = document.getElementById('copyright');
let date = new Date();
footerText.innerHTML = "&copy; Didrich Damien aka Skunkoff " + date.getUTCFullYear();