<?php
//1. Conectar no BD (IP, usuario, senha, nome do banco)
require_once("verificaAutenticacao.php");
require_once("conexao.php");

//Busca o usuário selecionado pelo usuarioListar.php
$sql = "select * from atendente where id = ".$_GET['id'];
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

    <title>Visualizar Atendente</title>

    <!-- Custom fonts for this template-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/javascript.js"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
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
                    <!-- Visualizar Atendente -->
                    <div class="container">
                        <h1 class="mb-4"><i class="fa-solid fa-eye"></i> Visualizar Atendente</h1>
                        <form method="post">
                            <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                            <div class="row">
                                <div class="col-8">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Nome</label>
                                        <input disabled name="nome" type="text" class="form-control"
                                            value="<?= $linha['nome'] ?>"><br>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="sexo" class="form-label">Sexo</label>
                                    <select disabled id="sexo" name="sexo" class="form-control">
                                        <option value="M" <?php echo ($linha['sexo'] == 'M') ? 'selected' : ''; ?>>
                                            Masculino
                                        </option>
                                        <option value="F" <?php echo ($linha['sexo'] == 'F') ? 'selected' : ''; ?>>
                                            Feminino
                                        </option>
                                        <option value="O" <?php echo ($linha['sexo'] == 'O') ? 'selected' : ''; ?>>Outro
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Email</label>
                                        <input disabled name="email" type="email" class="form-control"
                                            value="<?= $linha['email'] ?>"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Telefone</label>
                                        <input disabled name="telefone" type="text" maxlength="15" class="form-control"
                                            onkeyup="handlePhone(event)" value="<?= $linha['telefone'] ?>"><br>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Data de Nascimento</label>
                                        <input disabled name="dataNascimento" type="date" class="form-control"
                                            value="<?= $linha['dataNascimento'] ?>"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <div class="mb-1">
                                            <label for="formGroupExampleInput" class="form-label">Data de
                                                Demissão</label>
                                            <input disabled name="dataDemissao" id="dataDemissao" type="date"
                                                class="form-control" value="<?= $linha['dataDemissao'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">CPF</label>
                                        <input disabled name="cpf" type="text" class="form-control" maxlength="15"
                                            value="<?= $linha['cpf'] ?>" oninput="applyCpfMask(this)"><br>
                                    </div>
                                </div>
                            </div><br>
                            <center><a href="listagemAtendente.php" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i> Voltar</a> </center>
                    </div>
                </div>
                </form><br>
            </div>
            <?php
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