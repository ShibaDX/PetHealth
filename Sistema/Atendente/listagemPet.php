<!-- Requisita conexão e a verificação de autenticação -->
<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");
//Exclusão
if (isset($_GET['id'])) {
    $sql = "delete from pet where id = " . $_GET['id'];
    mysqli_query($conexao, $sql);
    $mensagem = "Exclusão realizada com sucesso.";
}

// preparar a SQL
$sql = "select * from pet";

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

    <title>Lista de Pets
        
    </title>

    <!-- Custom fonts for this template-->
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

        <?php require_once("sidebarVet.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php require_once("topbarVet.php"); ?>



                <!-- Page Heading -->

                    <!-- Bloco de mensagem -->
                    <?php if (isset($mensagem)) { ?>
                        <div class="alert alert-success" role="alert">
                            <i class="fa-solid fa-check" style="color: #2eb413;"></i>
                            <?= $mensagem ?>
                        </div>
                    <?php } ?>
                    <!-- Tabela de listagem de pets -->
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <h2><i class="fa-solid fa-dog"></i> Listagem de Pets <a
                                        href="cadastroPet.php" class="btn btn-info btn-sn"><i class="fa-solid fa-plus"
                                        style="color: #ffffff;"></i> Novo Pet</a>
                                        <a href="cadastroRaca.php" class="btn btn-success btn-sn"><i class="fa-solid fa-plus"
                                        style="color: #ffffff;"></i> Nova Raça</a>
                                    </h2>
                        </div>
                        </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Ano de Nascimento</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Cor</th>
                                <th scope="col">Obs</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
                                <tr>
                                    <th scope="row">
                                        <?= $linha['id'] ?>
                                    </th>
                                    <td>
                                        <?= $linha['nome'] ?>
                                    </td>
                                    <td>
                                        <?= $linha['anoNascimento'] ?>
                                    </td>
                                    <td>
                                        <?= $linha['sexo'] ?>
                                    </td>
                                    <td>
                                        <?= $linha['cor'] ?>
                                    </td>
                                    <td>
                                        <?= $linha['obs'] ?>
                                    </td>
                                    <td>
                                        <a href="editarPet.php?id=<?= $linha['id'] ?>" class="btn btn-warning"><i
                                                class="fa-solid fa-pen-to-square" style="color: #000000;"></i></a>
                                        <a href="listagemPet.php?id=<?= $linha['id'] ?>" class="btn btn-danger"
                                            onclick="return confirm('Confirma exclusão?')"><i class="fa-solid fa-trash"
                                                style="color: #000000;"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>

                            </table>
                            
                </div>
                <!-- End of Main Content -->
                <?php require_once("footer.php"); ?>

            </div>

            <!-- End of Content Wrapper -->
        </div>

        <!-- End of Page Wrapper -->
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>


</html>