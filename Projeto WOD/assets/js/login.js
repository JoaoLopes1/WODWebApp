const formulario = document.getElementById('form');
const emailInput = document.getElementById('verify_email');

formulario.addEventListener('submit', function (event) {
  if (!emailInput.checkValidity()) {
    event.preventDefault(); // Impede o envio do formulário se o email for inválido
    alert('Por favor, insira um endereço de email válido.');
  }
});

