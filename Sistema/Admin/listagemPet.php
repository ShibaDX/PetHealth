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
$sql = "SELECT p.id, p.statusPet, p.nome, p.especie, p.anoNascimento, p.sexo, p.cor, c.nome as clienteNome, r.nome as racaNome FROM pet p 
INNER JOIN cliente c ON p.cliente_id = c.id
INNER JOIN raca r ON p.raca_id = r.id
ORDER BY nome";

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
                        <h2><i class="fa-solid fa-dog"></i> Listagem de Pets <a href="cadastroPet.php" class="btn btn-info btn-sn"><i class="fa-solid fa-plus" style="color: #ffffff;"></i> Novo Pet</a>
                            <a href="listagemRaca.php" class="btn btn-success btn-sn"><i class="fa-solid fa-paw"></i> Raças</a>
                        </h2>
                        <form method="post">
                            <div class="row mb-3 mt-4">
                                <div class="col-3">
                                    <select name="cliente_id" class="custom-select" aria-label="Large select example" onchange="this.form.submit()">
                                        <option value="">Selecione</option>
                                        <?php
                                        $sql = "select * from cliente order by nome";
                                        $resultado = mysqli_query($conexao, $sql);

                                        while ($linha = mysqli_fetch_array($resultado)) {
                                            $id = $linha['id'];
                                            $nome = $linha['nome'];
                                            $cpf = $linha['CPF'];

                                            $selecionado = ($_POST['cliente_id'] == $id) ? "selected" : "";

                                            echo "<option value='{$id}' {$selecionado}>{$nome} - {$cpf}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </form>

                        <?php
                        $filtro_cliente_id = "";
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cliente_id'])) {
                            $filtro_cliente_id = mysqli_real_escape_string($conexao, $_POST['cliente_id']);
                        }

                        // preparar a SQL
                        $sql = "SELECT p.id, p.statusPet, p.nome, p.especie, p.anoNascimento, p.sexo, p.cor, c.nome as clienteNome, r.nome as racaNome 
                        FROM pet p 
                        INNER JOIN cliente c ON p.cliente_id = c.id
                        INNER JOIN raca r ON p.raca_id = r.id";

                        if (!empty($filtro_cliente_id)) {
                            $sql .= " WHERE cliente_id = '$filtro_cliente_id'";
                        }

                        $sql .= " ORDER BY nome";

                        // executar a SQL
                        $resultado = mysqli_query($conexao, $sql);
                        ?>
                    </div>
                </div>
                <?php
                if ($resultado->num_rows > 0) {
                    // Exibir os dados em uma tabela
                ?>
                    <table class="table table-striped table-hover" id="listaAgenda">
                        <tr>
                            <th>Status</th>
                            <th>Nome</th>
                            <th>Proprietário do Pet</th>
                            <th>Ano Nascimento</th>
                            <th>Sexo</th>
                            <th>Raça</th>
                            <th>Espécie</th>
                            <th>Cor</th>
                            <th>Ação</th>
                        </tr>
                        <?php
                        while ($row = $resultado->fetch_assoc()) {

                            // Verifique se os índices existem antes de acessá-los
                            $clienteNome = isset($row["clienteNome"]) ? $row["clienteNome"] : "";
                            $racaNome = isset($row["racaNome"]) ? $row["racaNome"] : "";

                            echo "<tr><td>" . $row["statusPet"] . "</td><td>" . $row["nome"] . "</td><td>" . $clienteNome . "</td><td>" . $row["anoNascimento"] . "</td><td>" . $row["sexo"] . "</td><td>" . $racaNome . "</td><td>" . $row["especie"] . "</td><td>" . $row["cor"] . "</td>";
                        ?>
                            <td>
                                <a href="olharPet.php?id=<?= $row['id'] ?>" class="btn btn-info"><i class="fa-solid fa-eye" style="color: #000000;"></i></a>
                                <a href="editarPet.php?id=<?= $row['id'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></a>
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