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

    <title>Cadastro de Veterinário</title>

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
                        <h1 class="mb-4"><i class="fa-solid fa-user-doctor"></i> Cadastro de Veterinário</h1>
                        <form method="post">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Nome</label>
                                        <input name="nome" type="text" class="form-control"><br>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Telefone</label>
                                        <input name="telefone" type="text" maxlength="15" class="form-control" onkeyup="handlePhone(event)"><br>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-1">
                                        <label for="" class="form-label">Data de Nascimento</label>
                                        <input name="dataNascimento" type="date" class="form-control"><br>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-1">
                                        <label for="crmv" class="form-label">CRMV</label>
                                        <input name="crmv" id="crmv" type="text" class="form-control"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="email" class="form-label">Email</label>
                                        <input name="email" id="email" type="email" class="form-control"><br>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="mb-1">
                                        <label for="senha" class="form-label">Senha</label>
                                        <input name="senha" id="senha" type="password" class="form-control">
                                        <button type="button" id="togglePass" class="btn btn-primary">Mostrar Senha</button>
                                    </div>
                                </div>
                                <style>
                                    .teste {
                                        height: 15px;
                                        width: 120px;
                                        font-size: 12px;
                                        padding-bottom: 20px;
                                    }
                                </style>
                                <div class="col-3">
                                    <div class="mb-1">
                                        <label for="confirmarSenha" class="form-label">Confirmar Senha</label>
                                        <input name="confirmarSenha" id="confirmarSenha" type="password" class="form-control">
                                        <button type="button" id="toggleConfirmPass" class="teste btn btn-primary">Mostrar Senha</button>
                                    </div>
                                </div>
                            </div>
                            <button name="salvar" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Salvar</button>
                            <a href="listagemVeterinario.php" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i> Voltar</a>

                    </div>

                    <script>
                        //Mostrar Senha
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

                        //Mostrar Confirmar Senha
                        const confirmarSenhaInput = document.querySelector("#confirmarSenha");
                        const toggleConfirmPassButton = document.querySelector("#toggleConfirmPass");
                        toggleConfirmPassButton.addEventListener('click', toggleConfirmPass);

                        function toggleConfirmPass() {
                            if (confirmarSenhaInput.type == "password") {
                                confirmarSenhaInput.type = "text";
                                toggleConfirmPassButton.textContent = "Esconder Senha";
                            } else {
                                confirmarSenhaInput.type = "password";
                                toggleConfirmPassButton.textContent = "Mostrar Senha";
                            }
                        }
                    </script>


                    <!-- Requisitar a Conexão -->
                    <?php



                    if (isset($_POST['salvar'])) {

                        //2. Receber os dados para inserir no BD
                        $nome = $_POST['nome'];
                        $telefone = $_POST['telefone'];
                        $dataNascimento = $_POST['dataNascimento'];
                        $email = $_POST['email'];
                        $senha = $_POST['senha'];
                        $confirmarSenha = $_POST['confirmarSenha'];
                        $crmv = $_POST['crmv'];

                        if ($confirmarSenha != $senha) {
                            
                        }

                        //3. Preparar a SQL
                        $sql = "insert into usuarioSistema (nome, telefone, dataNascimento, email, senha, CRMV, funcao) values ('$nome', '$telefone', '$dataNascimento', '$email', '$senha', '$crmv', 'Veterinario')";

                        //4. Executar a SQL
                        mysqli_query($conexao, $sql);

                        //5. Mostrar mensagem ao usuário
                        $mensagem = "Inserido com Sucesso";
                    }
                    ?>
                    <?php if (isset($mensagem)) { ?>
                        <div class="alert alert-success mb-2" role="alert">
                            <i class="fa-solid fa-check" style="color: #12972c;"></i>
                            <?= $mensagem ?>
                        </div>
                    <?php }
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