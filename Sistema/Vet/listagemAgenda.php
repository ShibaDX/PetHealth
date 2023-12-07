<!-- Requisita conexão e a verificação de autenticação -->
<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");
date_default_timezone_set('America/Sao_Paulo');

$veterinarioId = $_SESSION['id'];

$sql = "SELECT * FROM agenda";
$resultado = mysqli_query($conexao, $sql);

// Consulta SQL para obter as consultas marcadas para o dia atual
$data_atual = date("Y-m-d");
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
    <link rel="shortcut icon" href="img/favicon1.png" type="image/x-icon" />
    <!--Paw icon by <a target="_blank" href="https://icons8.com">Icons8</a> -->

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

                <div>
                                            <!-- Bloco de mensagem -->
                                            <?php if (isset($_GET['mensagem'])) { ?>
                            <div class="alert alert-danger mb-2" role="alert">
                                <?= $_GET['mensagem'] ?> <?php } ?>
                </div>

                <!-- Tabela para a listagem da agenda -->
                <div class="card mt-3 mb-3">
                    <div class="card-body">

                            <div class="mb-2">
                                <h2>
                                    <i class="fa-solid fa-calendar-days"></i> Agendamentos <a href="cadastroAgenda.php" class="btn btn-success btn-sn"><i class="fa-solid fa-calendar-days"></i> Novo Agendamento</a>
                                </h2>
                            </div><br>
                            <form name="filtro" method="POST">
                            <div class="row">

                                <div class="col-2">
                                    <div>
                                    <label class="form-label">Filtrar por Data</label>
                                    <input name="data" type="date" class="form-control" value="<?= isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '' ?>" onchange="this.form.submit()">
                                    </div>
                                </div>
                                <div class="col-1">
                                    <label class="form-label" style="visibility: hidden">aadsadasdasd</label>
                                    <button type="submit" class="btn btn-primary" name="data" value="<?= $data_atual ?>">Hoje</button>

                                </div>
                                <div class="col-3">
                                    <label class="form-label">Filtrar por Pet</label>
                                    <select name="cliente_id" class="custom-select" aria-label="Large select example" onchange="this.form.submit()">
                                        <option value="" selected>Selecionar Cliente</option>
                                        <?php
                                        $sql = "select * from cliente order by nome";
                                        $resultado = mysqli_query($conexao, $sql);

                                        while ($linha = mysqli_fetch_array($resultado)) {
                                            $idCliente = $linha['id'];
                                            $nome = $linha['nome'];
                                            $cpf = $linha['CPF'];

                                            $selecionado = ($_POST['cliente_id'] == $idCliente) ? "selected" : "";

                                            echo "<option value='{$idCliente}' {$selecionado}>{$nome} - {$cpf}</option>";
                                        }
                                        ?>
                                    </select>

                                </div>

                                <?php
                                $cliente_id_selecionado = isset($_POST['cliente_id']) ? $_POST['cliente_id'] : '';
                                ?>
                                <?php if ($cliente_id_selecionado != '') { ?>
                                    <div class="col-2">

                                        <label class="form-label" style="visibility: hidden">addadadaadadadda</label>
                                        <select name="pet_id" class="custom-select" aria-label="Large select example" onchange="this.form.submit()">
                                            <option value="" selected>Selecionar Pet</option>
                                            <?php
                                            $sql = "select pet.id, pet.nome, pet.especie
                                              from pet 
                                              where pet.cliente_id = {$_POST['cliente_id']}
                                          order by pet.nome";
                                            $resultado = mysqli_query($conexao, $sql);

                                            while ($linha = mysqli_fetch_array($resultado)) {
                                                $idPet = $linha['id'];
                                                $nome = $linha['nome'];
                                                $especie = $linha['especie'];

                                                $selecionado = ($_POST['pet_id'] == $idPet) ? "selected" : "";

                                                echo "<option value='{$idPet}' {$selecionado}>{$nome} ({$especie})</option>";
                                            }
                                            ?>
                                        </select>

                                    </div>
                                <?php } ?>
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <label class="form-label mr-3">Filtrar por Status</label>
                                    <div class="btn-group" role="group">
                                        <button type="submit" class="btn btn-danger" name="statusAgenda" value="Cancelado">Cancelado</button>
                                        <button type="submit" class="btn btn-warning" name="statusAgenda" value="Em Andamento">Em Andamento</button>
                                        <button type="submit" class="btn btn-success" name="statusAgenda" value="Concluído">Concluído</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                        // Verifica se foi feita uma requisição POST
                        //if (isset($_POST['filtro'])) {
                        if (isset($_POST['data'])) {
                            $dataFiltrada = mysqli_real_escape_string($conexao, $_POST['data']);
                        } else {
                            $dataFiltrada =  $data_atual;
                        }

                        $cliente_id = isset($_POST['cliente_id']) ? mysqli_real_escape_string($conexao, $_POST['cliente_id']) : null;
                        $pet_id = isset($_POST['pet_id']) ? mysqli_real_escape_string($conexao, $_POST['pet_id']) : null;
                        $statusAgenda = isset($_POST['statusAgenda']) ? mysqli_real_escape_string($conexao, $_POST['statusAgenda']) : null;

                        // Adiciona a condição WHERE apenas se a data estiver definida
                        $whereClause = "WHERE 1"; // Sempre verdadeiro

                        if (isset($dataFiltrada) && ($dataFiltrada != '')) {
                            $whereClause .= " AND a.data = '$dataFiltrada'";
                        }
                        if (isset($cliente_id) && ($cliente_id != '')) {
                            $whereClause .= " AND c.id = '$cliente_id'";

                            if (isset($pet_id) && ($pet_id != '')) {
                                $whereClause .= " AND p.id = '$pet_id'";
                            }
                        } else {
                            $whereClause .= "AND a.veterinario_id = '$veterinarioId'";
                        }
                        if (isset($statusAgenda) && ($statusAgenda != '')) {
                            $whereClause .= " AND a.statusAgenda = '$statusAgenda'";
                        }


                        $sql = "SELECT a.id, a.data, a.hora, a.statusAgenda, p.nome as petNome, v.nome as vetNome, pr.nome as procNome, c.nome as clienteNome, pr.valor as procValor 
                            FROM agenda a 
                            LEFT JOIN pet p ON a.pet_id = p.id
                            LEFT JOIN veterinario v ON a.veterinario_id = v.id
                            LEFT JOIN procedimento pr ON a.procedimento_id = pr.id
                            LEFT JOIN cliente c ON p.cliente_id = c.id
                            $whereClause
                            ORDER BY a.data, a.hora"; // Alterado a ordenação para data e hora
                        $resultado = mysqli_query($conexao, $sql);
                        //}
                        ?>
                    </div>

                            <?php
                            if ($resultado->num_rows > 0) {
                                // Exibir os dados em uma tabela
                            ?>
                                <table class="table table-striped table-hover" id="listaAgenda">
                                    <tr>
                                        <th>Data</th>
                                        <th>Hora</th>
                                        <th>Status</th>
                                        <th>Nome do Pet</th>
                                        <th>Proprietário do Pet</th>
                                        <th>Nome do Veterinário</th>
                                        <th>Procedimento</th>
                                        <th>Valor</th>
                                        <th>Ação</th>
                                    </tr>
                                    <?php
                                    while ($row = $resultado->fetch_assoc()) {
                                        $dataFormatada = date("d/m/Y", strtotime($row["data"]));
                                        echo "<tr><td>" . $dataFormatada . "</td><td>" . $row["hora"] . "</td><td>" . $row["statusAgenda"];

                                        // Verifique se os índices existem antes de acessá-los
                                        $petNome = isset($row["petNome"]) ? $row["petNome"] : "";
                                        $clienteNome = isset($row["clienteNome"]) ? $row["clienteNome"] : "";
                                        $vetNome = isset($row["vetNome"]) ? $row["vetNome"] : "";
                                        $procNome = isset($row["procNome"]) ? $row["procNome"] : "";
                                        $valorProcedimento = isset($row["procValor"]) ? number_format($row["procValor"], 2, ',', '.') : "";

                                        echo "</td><td>" . $petNome . "</td><td>" . $clienteNome . "</td><td>" . $vetNome . "</td><td>" . $procNome . "</td><td>R$" . $valorProcedimento . "</td>";
                                    ?>
                                        <td>
                                            <a href="olharAgenda.php?id=<?= $row['id'] ?>" class="btn btn-info"><i class="fa-solid fa-eye" style="color: #000000;"></i></a>
                                            <a href="editarAgenda.php?id=<?= $row['id'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></a>
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
                </div>
            </div>

            <!-- End of Content Wrapper -->
        </div>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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