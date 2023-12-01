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

function carregarVeterinarios(filtro) {
    console.log('Chamando carregarVeterinarios com filtro:', filtro);
    $.ajax({
        url: 'listagemVeterinario.php',
        type: 'POST',
        data: { filtro: filtro },
        dataType: 'json',
        success: function (data) {
            console.log('Dados obtidos com sucesso:', data);
            renderizarLista(data);
        },
        error: function (error) {
            console.error('Erro ao obter veterinários:', error);
        }
    });
}

function renderizarLista(veterinarios) {
    const tabela = $('#listaVeterinarios tbody');
    tabela.empty();

    veterinarios.forEach(veterinario => {
        const status = veterinario.statusVet == 1 ? 'Ativo' : 'Inativo';
        tabela.append(`<tr>
                <th scope="row">${veterinario.id}</th>
                <td>${status}</td>
                <td>${veterinario.nome}</td>
                <td>${veterinario.telefone}</td>
                <td>${veterinario.sexo}</td>
                <td>${veterinario.email}</td>
                <td>${veterinario.dataNascimento}</td>
                <td>${veterinario.dataAdmissao}</td>
                <td>${veterinario.CRMV}</td>
                <td>${veterinario.dataDemissao}</td>
                <td>
                    <a href="editarVeterinario.php?id=${veterinario.id}" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                    </a>
                    <a href="listagemVeterinario.php?id=${veterinario.id}" class="btn btn-danger" onclick="return confirm('Confirma exclusão?')">
                        <i class="fa-solid fa-trash" style="color: #000000;"></i>
                    </a>
                </td>
            </tr>`);
    });
}

// Ao abrir a página, mostrar todos os veterinários
carregarVeterinarios("");

// Botão para mostrar todos os veterinários
$('#btnMostrarTodos').click(function () {
    carregarVeterinarios("");
});

// Botão para mostrar apenas os ativos
$('#btnMostrarAtivos').click(function () {
    carregarVeterinarios("Ativo");
});

// Botão para mostrar apenas os inativos
$('#btnMostrarInativos').click(function () {
    carregarVeterinarios("Inativo");
});

