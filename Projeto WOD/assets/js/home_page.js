const button_list = document.querySelectorAll(".button_icon");
const config = document.querySelectorAll(".config");

button_list.forEach((button_icon, indice) => {
button_icon.addEventListener("click", () => {
    desselecionarBotao();
    desselecionarConfig();

    button_icon.classList.add("selecionado");
    config[indice].classList.add("selecionado");
});
});

function desselecionarConfig() {
const configSelecionada = document.querySelector(".config.selecionado");
configSelecionada.classList.remove("selecionado");
}

function desselecionarBotao() {
const button_iconSelecionado = document.querySelector(".button_icon.selecionado");
button_iconSelecionado.classList.remove("selecionado");
}

// NavBar Hamburber

const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}

const navLink = document.querySelectorAll(".nav-link");

navLink.forEach(n => n.addEventListener("click", closeMenu));

function closeMenu() {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}