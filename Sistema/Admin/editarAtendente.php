<?php
//1. Conectar no BD (IP, usuario, senha, nome do banco)
require_once("verificaAutenticacao.php");
require_once("conexao.php");
date_default_timezone_set('America/Sao_Paulo');
//Busca o usuário selecionado pelo usuarioListar.php
$sql = "select * from atendente where id = " . $_GET['id'];
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
                    <div class="container">
                        <h1 class="mb-4"><i class="fa-solid fa-calendar-days"></i> Editar Atendente</h1>
                        <form method="post">
                            <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Nome</label>
                                        <input name="nome" type="text" oninput="validarLetras(this)" class="form-control" value="<?= isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : $linha['nome'] ?>"><br>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Email</label>
                                        <input name="email" type="email" class="form-control" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : $linha['email'] ?>"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Telefone</label>
                                        <input name="telefone" type="text" maxlength="15" class="form-control" onkeyup="handlePhone(event)" value="<?= isset($_POST['telefone']) ? htmlspecialchars($_POST['telefone']) : $linha['telefone'] ?>"><br>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Data de Nascimento</label>
                                        <input name="dataNascimento" type="date" class="form-control" value="<?= isset($_POST['dataNascimento']) ? htmlspecialchars($_POST['dataNascimento']) : $linha['dataNascimento'] ?>"><br>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">CPF</label>
                                        <input name="cpf" type="text" class="form-control" maxlength="15" value="<?= isset($_POST['cpf']) ? htmlspecialchars($_POST['cpf']) : $linha['cpf'] ?>" oninput="applyCpfMask(this)"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="sexo" class="form-label">Sexo</label>
                                    <select id="sexo" name="sexo" class="form-control">
                                        <option value="M" <?php echo ($linha['sexo'] == 'M') ? 'selected' : ''; ?>>Masculino</option>
                                        <option value="F" <?php echo ($linha['sexo'] == 'F') ? 'selected' : ''; ?>>Feminino</option>
                                        <option value="O" <?php echo ($linha['sexo'] == 'O') ? 'selected' : ''; ?>>Outro</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Senha</label>
                                        <input name="senha" id="senha" type="password" class="form-control" value="<?= isset($_POST['senha']) ? htmlspecialchars($_POST['senha']) : $linha['senha'] ?>">
                                        <button type="button" id="togglePass" class="botao btn btn-link">Mostrar Senha</button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <div class="mb-1">
                                            <label for="formGroupExampleInput" class="form-label">Data de Demissão</label>
                                            <input name="dataDemissao" id="dataDemissao" type="date" class="form-control" value="<?= isset($_POST['dataDemissao']) ? htmlspecialchars($_POST['dataDemissao']) : $linha['dataDemissao'] ?>">
                                            <button type="button" class="btn" onclick="limpar()">Limpar</button>
                                            <!-- Adicione um campo oculto para enviar um valor especial quando o botão "Limpar" for clicado -->
                                            <input type="hidden" name="limparDataDemissao" id="limparDataDemissao" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button name="salvar" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i>
                                Salvar</button>
                            <a href="listagemAtendente.php" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i>
                                Voltar</a>
                    </div>
                    </form><br>

                    <script>
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

                        function validarLetras(input) {
                            // Substituir qualquer caractere que não seja uma letra por vazio
                            input.value = input.value.replace(/[^a-zA-Z\sàáâãäåçèéêëìíîïòóôõöùúûü-]/g, '');
                        }
                    </script>

                    <?php

                    function validaCPF($cpf)
                    {

                        // Extrai somente os números
                        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

                        // Verifica se foi informado todos os digitos corretamente
                        if (strlen($cpf) != 11) {
                            return false;
                        }

                        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
                        if (preg_match('/(\d)\1{10}/', $cpf)) {
                            return false;
                        }

                        // Faz o calculo para validar o CPF
                        for ($t = 9; $t < 11; $t++) {
                            for ($d = 0, $c = 0; $c < $t; $c++) {
                                $d += $cpf[$c] * (($t + 1) - $c);
                            }
                            $d = ((10 * $d) % 11) % 10;
                            if ($cpf[$c] != $d) {
                                return false;
                            }
                        }
                        return true;
                    }

                    if (isset($_POST['salvar'])) {

                        //2. Receber os dados para inserir no BD
                        $id = $_POST['id'];
                        $nome = $_POST['nome'];
                        $telefone = $_POST['telefone'];
                        $dataNascimento = $_POST['dataNascimento'];
                        $email = mysqli_real_escape_string($conexao, $_POST['email']);
                        $senha = $_POST['senha'];
                        $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
                        $sexo = $_POST['sexo'];
                        $dataDemissao = isset($_POST['limparDataDemissao']) && $_POST['limparDataDemissao'] == 1 ? null : $_POST['dataDemissao'];

                        $mensagem = ""; // Inicializa a variável $mensagem

                        // Verificar se o e-mail já está cadastrado nas tabelas admin, veterinario e atendente
                        $check_query = "SELECT * FROM atendente WHERE email='$email' AND id != '$id'
                        UNION
                        SELECT * FROM veterinario WHERE email='$email'
                        UNION
                        SELECT * FROM admin WHERE email='$email'";

                        $check_result = $conexao->query($check_query);



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
                            $mensagem = "O atendente precisa ter pelo menos 18 anos";
                        } else if (!validaCPF($cpf)) {
                            // CPF inválido, mostrar mensagem de erro
                            $mensagem = "CPF inválido. Por favor, insira um CPF válido.";
                        } else if (strtotime($dataNascimento) > time()) {
                            // Data de nascimento é no futuro, mostrar mensagem de erro
                            $mensagem = "Data de nascimento não pode ser no futuro";
                        } else {

                            // Verificar se a data de demissão foi fornecida
                            if (!empty($dataDemissao) || $dataDemissao != null) {

                                // Atualizar o registro do veterinário no banco de dados
                                $sql = "UPDATE atendente SET nome = '$nome', telefone = '$telefone', sexo = '$sexo', dataNascimento = '$dataNascimento', email = '$email', senha = '$senha' , statusAtendente = 'Inativo', cpf = '$cpf', dataDemissao = '$dataDemissao' WHERE id = $id";
                            } else {
                                //3. Preparar a SQL
                                $sql = "UPDATE atendente SET nome = '$nome', telefone = '$telefone', sexo = '$sexo', dataNascimento = '$dataNascimento', email = '$email', senha = '$senha' , statusAtendente = 'Ativo', cpf = '$cpf', dataDemissao = '$dataDemissao' WHERE id = $id";
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