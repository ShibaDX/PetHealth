<?php
//1. Conectar no BD (IP, usuario, senha, nome do banco)
require_once("verificaAutenticacao.php");
require_once("conexao.php");
date_default_timezone_set('America/Sao_Paulo');
//Busca o usuário selecionado pelo usuarioListar.php
$sql = "select * from veterinario where id = " . $_GET['id'];
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editar Veterinário</title>

    <!-- Custom fonts for this template-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/javascript.js"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0215a38eba.js" crossorigin="anonymous"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon1.png" type="image/x-icon" />
    <!-- Paw icon by <a target="_blank" href="https://icons8.com">Icons8</a> -->
</head>



<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once("sidebarAdmin.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php require_once("topbarAdmin.php"); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- Editar Médico Veterinário -->
                    <div class="container">
                        <h1 class="mb-4"><i class="fa-solid fa-user-doctor"></i> Editar Veterinário</h1>
                        <p class="h6">Os campos marcados com * são obrigatórios</p> <br>
                        <form method="post" onsubmit="return validarTelefone();">
                            <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Nome*</label>
                                        <input name="nome" type="text" class="form-control" oninput="validarLetras(this)" value="<?= $linha['nome'] ?>" required><br>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Email*</label>
                                        <input name="email" type="email" class="form-control" value="<?= $linha['email'] ?>" required><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Telefone*</label>
                                        <input name="telefone" id="telefone" type="text" maxlength="15" class="form-control" onkeyup="handlePhone(event)" value="<?= $linha['telefone'] ?>" required><br>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Data de Nascimento*</label>
                                        <input name="dataNascimento" type="date" class="form-control" value="<?= $linha['dataNascimento'] ?>" required><br>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">CRMV*</label>
                                        <input name="crmv" type="text" class="form-control" value="<?= $linha['CRMV'] ?>" required><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="sexo" class="form-label">Sexo*</label>
                                    <select id="sexo" name="sexo" class="form-control">
                                        <option value="M" <?php echo ($linha['sexo'] == 'M') ? 'selected' : ''; ?>>Masculino</option>
                                        <option value="F" <?php echo ($linha['sexo'] == 'F') ? 'selected' : ''; ?>>Feminino</option>
                                        <option value="O" <?php echo ($linha['sexo'] == 'O') ? 'selected' : ''; ?>>Outro</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Senha*</label>
                                        <input name="senha" id="senha" type="password" class="form-control" value="<?= $linha['senha'] ?>" required>
                                        <button type="button" id="togglePass" class="botao btn btn-link">Mostrar Senha</button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <div class="mb-1">
                                            <label for="formGroupExampleInput" class="form-label">Data de Demissão</label>
                                            <input name="dataDemissao" id="dataDemissao" type="date" class="form-control" value="<?= $linha['dataDemissao'] ?>">
                                            <button type="button" class="btn" onclick="limpar()">Limpar</button>
                                            <!-- Adicione um campo oculto para enviar um valor especial quando o botão "Limpar" for clicado -->
                                            <input type="hidden" name="limparDataDemissao" id="limparDataDemissao" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button name="salvar" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i>
                                Salvar</button>
                            <a href="listagemVeterinario.php" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i>
                                Voltar</a>
                    </div>
                </div>
                </form><br>
            </div>

            <script>
                function validarLetras(input) {
                    // Substituir qualquer caractere que não seja uma letra por vazio
                    input.value = input.value.replace(/[^a-zA-Z\sàáâãäåçèéêëìíîïòóôõöùúûü-]/g, '');
                }

                function limpar() {
                    document.getElementById("dataDemissao").value = null;
                    // Defina o valor do campo oculto como 1 quando o botão "Limpar" for clicado
                    document.getElementById("limparDataDemissao").value = 1;
                }

                const senhaInput = document.querySelector("#senha");
                const togglePassButton = document.querySelector("#togglePass");
                togglePassButton.addEventListener('click', togglePass);

                function togglePass() {
                    if (senhaInput.type == "password") {
                        senhaInput.type = "text";
                        togglePassButton.textContent = "Esconder Senha";
                    } else {
                        senhaInput.type = "password";
                        togglePassButton.textContent = "Mostrar Senha";
                    }
                }

                function validarTelefone() {
                    var telefoneInput = document.getElementById("telefone");
                    var telefone = telefoneInput.value;

                    // Expressão regular para validar o formato do telefone
                    var regex = /^\(\d{2}\) \d{4,5}-\d{4}$/;

                    if (!regex.test(telefone)) {
                        alert("Por favor, insira um número de telefone válido no formato (11) 1234-5678 ou (11) 12345-6789.");
                        telefoneInput.focus();
                        return false;
                    }

                    return true;
                }
            </script>

            <?php
            if (isset($_POST['salvar'])) {

                //2. Receber os dados para inserir no BD
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $telefone = $_POST['telefone'];
                $dataNascimento = $_POST['dataNascimento'];
                $email = mysqli_real_escape_string($conexao, $_POST['email']);
                $senha = $_POST['senha'];
                $crmv = mysqli_real_escape_string($conexao, $_POST['crmv']);
                $sexo = $_POST['sexo'];
                $dataDemissao = isset($_POST['limparDataDemissao']) && $_POST['limparDataDemissao'] == 1 ? null : $_POST['dataDemissao'];

                // Verificar se o e-mail já está cadastrado em qualquer uma das tabelas
                $check_query = "SELECT * FROM veterinario WHERE email='$email' AND id != '$id'
                        UNION
                        SELECT * FROM admin WHERE email='$email'
                        UNION
                        SELECT * FROM atendente WHERE email='$email'";

                $check_result = $conexao->query($check_query);

                //Verifica se há mais de um CRMV
                $sql = "SELECT * FROM veterinario WHERE CRMV = '$crmv' AND id != '$id'";
                $resultado = mysqli_query($conexao, $sql);

                // Converte a data de demissão para um objeto DateTime
                $dataDemissaoObj = new DateTime($dataDemissao);

                // Obtém o ano da data de demissão
                $anoDemissao = $dataDemissaoObj->format('Y');


                // Calcular a idade
                $dataAtual = new DateTime();
                $DN = new DateTime($dataNascimento);
                $idade = $dataAtual->diff($DN)->y;

                if ($check_result->num_rows > 0) {
                    // E-mail já cadastrado
                    $mensagem = "E-mail já cadastrado";
                }
                // Verificar se a idade é pelo menos 18 anos
                else if ($idade < 18) {
                    $mensagem = "O veterinário precisa ter pelo menos 18 anos";
                } else if (strlen($nome) < 3) {
                    $mensagem = "O nome deve ter no mínimo 3 caracteres.";
                } else if (strtotime($dataNascimento) > time()) {
                    // Data de nascimento é no futuro, mostrar mensagem de erro
                    $mensagem = "Data de nascimento não pode ser no futuro";
                } else if (mysqli_num_rows($resultado) > 0) {
                    // Já existe um veterinário com esse CRMV, exiba uma mensagem de erro ou redirecione
                    $mensagem = "Já existe um veterinário cadastrado com esse CRMV.";
                    // Pode redirecionar de volta ao formulário ou realizar outras ações necessárias
                } else if ($anoDemissao < 2020) {
                    $mensagem = "A data de demissão deve ser até o ano de 2020.";
                }
                 else {

                    // Verificar se a data de demissão foi fornecida
                    if (!empty($dataDemissao) || $dataDemissao != null) {

                        // Atualizar o registro do veterinário no banco de dados
                        $sql = "UPDATE veterinario SET nome = '$nome', telefone = '$telefone', sexo = '$sexo', dataNascimento = '$dataNascimento', email = '$email', senha = '$senha' , statusVet = 'Inativo', CRMV = '$crmv', dataDemissao = '$dataDemissao' WHERE id = $id";
                    } else {
                        //3. Preparar a SQL
                        $sql = "UPDATE veterinario SET nome = '$nome', telefone = '$telefone', sexo = '$sexo', dataNascimento = '$dataNascimento', email = '$email', senha = '$senha' , statusVet = 'Ativo', CRMV = '$crmv', dataDemissao = '$dataDemissao' WHERE id = $id";
                    }
                    //4. Executar a SQL
                    mysqli_query($conexao, $sql);

                    //5. Mostrar mensagem ao usuário
                    $mensagem = "Alterado com Sucesso";
                }
            ?>

                <!-- Mostrar mensagem ao usuário -->
                <?php if ($mensagem) { ?>
                    <div class="alert <?= strpos($mensagem, 'Sucesso') !== false ? 'alert-success' : 'alert-danger' ?> mb-2" role="alert">
                        <i class="fa-solid <?= strpos($mensagem, 'Sucesso') !== false ? 'fa-check' : 'fa-x' ?>" style="color: <?= strpos($mensagem, 'Sucesso') !== false ? '#12972c' : '#b70b0b' ?>;"></i>
                        <?= $mensagem ?>
                    </div>
            <?php }
            }
            require_once("footer.php");
            ?>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

</body>

</html>