<!-- Requisita a verificação de autenticação -->
<?php require_once("conexao.php");
require_once("verificaAutenticacao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro de Procedimento</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0215a38eba.js" crossorigin="anonymous"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon1.png" type="image/x-icon" />
    <!--Paw icon by <a target="_blank" href="https://icons8.com">Icons8</a> -->

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
                    <!-- Cadastrar Procedimento -->
                    <div class="container">
                        <h1 class="mb-4"><i class="fa-solid fa-notes-medical"></i> Cadastro de Procedimento</h1>
                        <p class="h6">Os campos marcados com * são obrigatórios</p> <br>
                        <form method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" id="nomeProcedimento" class="form-label">Nome*</label>
                                        <input name="nomeProc" type="text" id="nomeProcedimento" oninput="validarLetras(this)" class="form-control" required><br>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-1">
                                        <label for="valorProcedimento" class="form-label">Valor do Procedimento* (R$):</label>
                                        <input type="text" id="valorProcedimento" name="valorProc" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button name="salvar" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Salvar</button>
                            <a href="listagemProcedimento.php" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
                        </form><br>

                        <script>
                            function validarLetras(input) {
                                // Substituir qualquer caractere que não seja uma letra por vazio
                                input.value = input.value.replace(/[^a-zA-Z\sàáâãäåçèéêëìíîïòóôõöùúûü-]/g, '');
                            }
                        </script>

                        <?php
                        if (isset($_POST['salvar'])) {

                            // Receber os dados para inserir no BD
                            $nome = $_POST['nomeProc'];
                            $valor = $_POST['valorProc'];

                            // Validar se o valor é um número positivo
                            if (is_numeric($valor) && floatval($valor) >= 0) {
                                // Preparar a SQL com prepared statement
                                $sql = "INSERT INTO procedimento (nome, valor, statusProcedimento) VALUES ('$nome', '$valor', 'Ativo')";
                                $stmt = mysqli_prepare($conexao, $sql);
                                // Executar a SQL
                                if (mysqli_stmt_execute($stmt)) {
                                    $mensagem = "Inserido com Sucesso";
                                } else {
                                    $mensagem = "Erro ao inserir no banco de dados: " . mysqli_error($conexao);
                                }

                                // Fechar o statement
                                mysqli_stmt_close($stmt);
                            } else {
                                $mensagem = "Por favor, insira um valor numérico não negativo para o procedimento.";
                            }

                            if ($mensagem) { ?>
                                <div class="alert <?= strpos($mensagem, 'Sucesso') !== false ? 'alert-success' : 'alert-danger' ?> mb-2" role="alert">
                                    <i class="fa-solid <?= strpos($mensagem, 'Sucesso') !== false ? 'fa-check' : 'fa-x' ?>" style="color: <?= strpos($mensagem, 'Sucesso') !== false ? '#12972c' : '#b70b0b' ?>;"></i>
                                    <?= $mensagem ?>
                            <?php }
                        } ?>
                                </div>

                    </div>
                </div>
            </div>

            <?php require_once("footer.php"); ?>
            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

</body>


</html>