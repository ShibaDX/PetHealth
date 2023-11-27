const handlePhone = (event) => {
    let input = event.target
    input.value = phoneMask(input.value)
}

const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g, '')
    value = value.replace(/(\d{2})(\d)/, "($1) $2")
    value = value.replace(/(\d)(\d{4})$/, "$1-$2")
    return value
}
function applyCpfMask(input) {
    input.value = cpf(input.value);
}

function cpf(v) {
    v = v.replace(/\D/g, ""); // Remove tudo o que não é dígito
    v = v.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca um ponto entre o terceiro e o quarto dígitos
    v = v.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca um ponto entre o terceiro e o quarto dígitos novamente (para o segundo bloco de números)
    v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2"); // Coloca um hífen entre o terceiro e o quarto dígitos
    return v;
}

function validarFormulario() {
    // Obter os valores dos campos
    var nome = document.getElementById("nome").value;
    var telefone = document.getElementById("telefone").value;
    var endereco = document.getElementById("endereco").value;
    var cidade = document.getElementById("cidade").value;
    var uf = document.getElementById("uf").value;
    var sexo = document.getElementById("sexo").value;
    var dataNascimento = document.getElementById("dataNascimento").value;
    var cpf = document.getElementById("cpf").value;

    // Verificar se algum campo obrigatório está vazio
    if (
        nome === "" ||
        telefone === "" ||
        endereco === "" ||
        cidade === "" ||
        uf === "" ||
        sexo === "" ||
        dataNascimento === "" ||
        cpf === "" 

    ) {
        alert("Por favor, preencha todos os campos obrigatórios.");
        return false; // Impede o envio do formulário
    }

    // Outras verificações podem ser adicionadas conforme necessário

    return true; // Permite o envio do formulário
}

function togglePassword() {
    var passwordInput = document.getElementById("senha");
    var confirmInput = document.getElementById("confirmarSenha");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        confirmInput.type = "text";
    } else {
        passwordInput.type = "password";
        confirmInput.type = "password";
    }
}