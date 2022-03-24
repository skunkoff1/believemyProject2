let loginBtn = document.getElementById('loginBtn');
if (loginBtn != null) {
    loginBtn.addEventListener("click", () => {
        window.location.href = "/controllers/loginController.php"
    });

}

let loginBtn2 = document.getElementById('loginBtn2');
if (loginBtn2 != null) {
    loginBtn2.addEventListener("click", () => {
        window.location.href = "/controllers/loginController.php"
    });

}

let registerBtn = document.getElementById('registerBtn');
if (registerBtn != null) {
    registerBtn.addEventListener("click", () => {
        window.location.href = "/controllers/registerController.php"
    })
}

let logoutBtn = document.getElementById('logoutBtn');
if (logoutBtn != null) {
    logoutBtn.addEventListener("click", () => {
        console.log("wesh")
        window.location.href = "/controllers/logout.php"
    })
}