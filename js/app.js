const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
var sideMenu = document.getElementById('btnMenu');

sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});

let navigation = document.querySelector('.navigation');

sideMenu.onclick = function(){
    navigation.classList.toggle('active');
}

// Holaaaa
// Hola mundo