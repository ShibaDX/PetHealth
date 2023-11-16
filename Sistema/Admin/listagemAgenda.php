<!-- Requisita conexão e a verificação de autenticação -->
<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");
//Exclusão
if (isset($_GET['id'])) {
    $sql = "delete from agenda where id = " . $_GET['id'];
    mysqli_query($conexao, $sql);
    $mensagem = "Exclusão realizada com sucesso.";
}

// Preparar a SQL
$sql = "select * from agenda";

// Executar a SQL
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

    <title>Lista de Agenda</title>

    <!-- Custom fonts for this template-->
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

                <?php
                                    $sql = "SELECT a.id, a.data, a.hora, p.nome as petNome, v.nome as vetNome, pr.nome as procNome  FROM agenda a 
                                    INNER JOIN pet p on a.pet_id= p.id
                                    inner JOIN veterinario v on a.veterinario_id = v.id
                                    INNER join procedimento pr on a.procedimento_id = pr.id";
                                    
                                    $resultado = mysqli_query($conexao, $sql);

                                    ?>

                    <!-- Bloco de mensagem -->
                    <?php if (isset($mensagem)) { ?>
                        <div class="alert alert-success" role="alert">
                            <i class="fa-solid fa-check" style="color: #2eb413;"></i>
                            <?= $mensagem ?>
                        </div>
                    <?php } ?>
                    <!-- Tabela para a listagem da agenda -->
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <h2><i class="fa-solid fa-calendar-days"></i> Listagem de Agenda <a href="cadastroAgenda.php" class="btn btn-success btn-sn"><i class="fa-solid fa-calendar-days"></i> Novo Agendamento</a>   <a href="cadastroProcedimento.php" class="btn btn-info btn-sn"><i class="fa-solid fa-plus" style="color: #ffffff;"></i> Cadastrar Procedimento</a></h2>
                        </div>
                    </div>
                  <?php  if ($resultado->num_rows > 0) {
                                        // Exibir os dados em uma tabela
                                        ?> <table class="table table-striped table-hover"> <?php
                                        echo "<tr><th>Data</th><th>Hora</th><th>Nome do Pet</th><th>Nome do Veterinário</th><th>Procedimento</th><th>Ação</th></tr>";
                                        
                                        while ($row = $resultado->fetch_assoc()) {
                                            echo "<tr><td>".$row["data"]."<td>".$row["hora"]."</td><td>".$row["petNome"]."</td><td>".$row["vetNome"]."</td><td>".$row["procNome"]."</td>" ?> <td> <a href="editarAgenda.php?id=<?= $row['id'] ?>" class="btn btn-warning"><i
                                            class="fa-solid fa-pen-to-square" style="color: #000000;"></i></a>
                                    <a href="listagemAgenda.php?id=<?= $row['id'] ?>" class="btn btn-danger"
                                        onclick="return confirm('Confirma exclusão?')"><i class="fa-solid fa-trash"
                                            style="color: #000000;"></i></a></td></tr> <?php
                                        } ?>
                                        
                                         </table> <?php
                                    } else {
                                        echo "Nenhum resultado encontrado.";
                                    } ?>
                </div>
                
                <!-- End of Main Content -->


            </div>

            <!-- End of Content Wrapper -->
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
                    <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Logout" se você deseja encerrar sua sessão atual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
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