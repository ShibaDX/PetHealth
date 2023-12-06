<!-- Requisita conexão e a verificação de autenticação -->
<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");
//Exclusão
if (isset($_GET['id'])) {
    $sql = "delete from cliente where id = " . $_GET['id'];
    mysqli_query($conexao, $sql);
    $mensagem = "Exclusão realizada com sucesso.";
}

// preparar a SQL
$sql = "select * from cliente";

// executar a SQL
$resultado = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lista de Clientes</title>

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



                <!-- Page Heading -->

                <!-- Bloco de mensagem -->
                <?php if (isset($mensagem)) { ?>
                    <div class="alert alert-success" role="alert">
                        <i class="fa-solid fa-check" style="color: #2eb413;"></i>
                        <?= $mensagem ?>
                    </div>
                <?php } ?>
                <!-- Tabela de listagem de cliente -->
                <div class="card mt-3 mb-3">
                    <div class="card-body">
                        <h2><i class="fa-regular fa-user"></i> Listagem de Clientes <a href="cadastroCliente.php" class="btn btn-info btn-sn"><i class="fa-solid fa-plus" style="color: #ffffff;"></i> Novo Cliente</a></h2>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" style="overflow: auto; max-width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">Status</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Cidade</th>
                                <th scope="col">UF</th>
                                <th scope="col">Data de Nascimento</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Email</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($linha = mysqli_fetch_array($resultado)) {
                                $dataNascimentoFormatada = date("d/m/Y", strtotime($linha["dataNascimento"]));
                                $dataCadastroFormatada = date("d/m/Y", strtotime($linha["dataCadastro"])); ?>

                                <tr>
                                    <td>
                                    <?= $linha['statusCliente'] ?>
                                    </td>
                                    <td>
                                        <?= $linha['nome'] ?>
                                    </td>
                                    <td>
                                        <?= $linha['telefone'] ?>
                                    </td>
                                    <td>
                                        <?= $linha['cidade'] ?>
                                    </td>
                                    <td>
                                        <?= $linha['UF'] ?>
                                    </td>
                                    <td>
                                        <?= $dataNascimentoFormatada ?>
                                    </td>
                                    <td>
                                        <?= $linha['sexo'] ?>
                                    </td>
                                    <td>
                                        <?= $linha['CPF'] ?>
                                    </td>
                                    <td>
                                        <?= $linha['email'] ?>
                                    </td>
                                    <td>
                                        <a href="olharCliente.php?id=<?= $linha['id'] ?>" class="btn btn-info"><i class="fa-solid fa-eye" style="color: #000000;"></i></a>
                                        <a href="editarCliente.php?id=<?= $linha['id'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                    </table>
                </div>
            </div>
            <!-- End of Main Content -->



        </div>
        <?php require_once("footer.php"); ?>
        <!-- End of Content Wrapper -->
    </div>

    <!-- End of Page Wrapper -->


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href=" logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>


</html>