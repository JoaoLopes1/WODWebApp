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