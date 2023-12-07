<!-- Requisita conexão e a verificação de autenticação -->
<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");

// preparar a SQL
$sql = "select * from procedimento";

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

    <title>Lista de Procedimentos </title>

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
                <!-- Tabela de listagem de pets -->
                <div class="card mt-3 mb-3">
                    <div class="card-body">
                        <h2><i class="fa-solid fa-notes-medical"></i> Listagem de Procedimentos
                            <a href="cadastroProcedimento.php" class="btn btn-info btn-sn"><i class="fa-solid fa-notes-medical"></i> Novo Procedimento</a>
                        </h2>
                        <form method="post">
                            <div class="row mb-3 mt-4">
                                <div class="col-3">
                                    <label for="filtroStatus">Filtrar por Status</label>
                                    <select class="custom-select" name="filtroStatus">
                                        <option value="">Todos</option>
                                        <option value="Ativo" <?= (isset($_POST['filtroStatus']) && $_POST['filtroStatus'] == 'Ativo') ? "selected" : "" ?>>Ativos</option>
                                        <option value="Inativo" <?= (isset($_POST['filtroStatus']) && $_POST['filtroStatus'] == 'Inativo') ? "selected" : "" ?>>Inativos</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-3">Filtrar</button>
                                </div>
                            </div>
                            <?php
                            $filtroStatus = "";
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                $filtroStatus = mysqli_real_escape_string($conexao, $_POST['filtroStatus']);

                                $filtro = "";
                                if (isset($filtroStatus) && ($filtroStatus != '')) {
                                    $filtro .= " and statusProcedimento = '$filtroStatus' ";
                                }

                                $sql = "SELECT * FROM procedimento WHERE 1 = 1 {$filtro} ORDER BY id";
                                $resultado = mysqli_query($conexao, $sql);
                            }
                            ?>
                        </form>
                    </div>
                </div>
                <?php
                if ($resultado->num_rows > 0) {
                    // Exibir os dados em uma tabela
                ?>
                    <table class="table table-striped table-hover" id="listaAgenda">
                        <tr>
                            <th scope="col">ID</th>
                            <th>Status</th>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Ação</th>
                        </tr>
                        <?php
                        while ($row = $resultado->fetch_assoc()) {
                            // Verifique se os índices existem antes de acessá-los
                            $valorProcedimento = isset($row["valor"]) ? number_format($row["valor"], 2, ',', '.') : "";
                            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["statusProcedimento"] . "</td><td>" . $row["nome"] . "</td><td>R$" . $valorProcedimento . "</td>";


                        ?>
                            <td>
                                <a href="editarProcedimento.php?id=<?= $row['id'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></a>
                            </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <br>
                <?php
                } else {
                    echo "Nenhum resultado encontrado.";
                }
                ?>


            </div>
            <!-- End of Main Content -->
            <?php require_once("footer.php"); ?>

        </div>

        <!-- End of Content Wrapper -->
    </div>

    <!-- End of Page Wrapper -->
    </div>

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
                <div class="modal-body">Selecione "Logout" se você deseja encerrar sua sessão atual.</div>
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