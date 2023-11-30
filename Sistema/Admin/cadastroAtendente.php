<!-- Requisita a verificação de autenticação -->
<?php require_once("verificaAutenticacao.php");
require_once("conexao.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro de Atendente</title>

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
                    <!-- Cadastrar Médico Veterinário -->
                    <div class="container">
                        <h1 class="mb-4"><i class="fa-solid fa-user-pen"></i> Cadastro de Atendente</h1>
                        <form method="post">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Nome</label>
                                        <input name="nomeAtendente" type="text" class="form-control" value="<?= isset($_POST['nomeAtendente']) ? htmlspecialchars($_POST['nomeAtendente']) : '' ?>"><br>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Telefone</label>
                                        <input name="telefone" type="text" maxlength="15" class="form-control" value="<?= isset($_POST['telefone']) ? htmlspecialchars($_POST['telefone']) : '' ?>" onkeyup="handlePhone(event)"><br>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Data de Nascimento</label>
                                        <input name="dataNascimento" type="date" class="form-control" value="<?= isset($_POST['dataNascimento']) ? htmlspecialchars($_POST['dataNascimento']) : '' ?>"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Email</label>
                                        <input name="email" type="email" class="form-control" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"><br>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Senha</label>
                                        <input name="senha" type="password" class="form-control" value="<?= isset($_POST['senha']) ? htmlspecialchars($_POST['senha']) : '' ?>"><br>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">CPF</label>
                                        <input name="cpf" type="text" maxlength="14" class="form-control" value="<?= isset($_POST['cpf']) ? htmlspecialchars($_POST['cpf']) : '' ?>" oninput="applyCpfMask(this)"><br>
                                    </div>
                                </div>
                            </div>
                            <button name="salvar" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Salvar</button>
                            <a href="listagemVeterinario.php" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
                    </div>

                    </form><br>



                    <!-- Requisitar a Conexão -->
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
                        $nome = $_POST['nomeAtendente'];
                        $telefone = $_POST['telefone'];
                        $dataNascimento = $_POST['dataNascimento'];
                        $email = $_POST['email'];
                        $senha = $_POST['senha'];
                        $cpf = $_POST['cpf'];

                        $mensagem = ""; // Inicializa a variável $mensagem

                        if (!validaCPF($cpf)) {
                            // CPF inválido, mostrar mensagem de erro
                            $mensagem = "CPF inválido. Por favor, insira um CPF válido.";
                        } else if (strtotime($dataNascimento) > time()) {
                            // Data de nascimento é no futuro, mostrar mensagem de erro
                            $mensagem = "Data de nascimento não pode ser no futuro";
                        } else {

                            //3. Preparar a SQL
                            $sql = "insert into usuarioSistema (nome, telefone, dataNascimento, email, senha, cpf, funcao) values ('$nome', '$telefone', '$dataNascimento', '$email', '$senha', '$cpf', 'Atendente')";

                            //4. Executar a SQL
                            $resultado = mysqli_query($conexao, $sql);

                            //5. Verificar o resultado da inserção
                            if ($resultado) {
                                // Inserção bem-sucedida
                                $mensagem = "Inserido com Sucesso";
                            } else {
                                // Erro na inserção
                                $mensagem = "Erro ao inserir no banco de dados: " . mysqli_error($conexao);
                            }
                        }

                    ?>
                        <?php
                        // Exibir a mensagem
                        if ($mensagem) { ?>
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