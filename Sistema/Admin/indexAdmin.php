<!-- Requisita a verificação de autenticação -->
<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");
date_default_timezone_set('America/Sao_Paulo');
$dataAtual = date("Y-m-d");

$sql = "SELECT a.id, a.data, a.hora, a.statusAgenda, p.nome as petNome, v.nome as vetNome, pr.nome as procNome FROM agenda a 
INNER JOIN pet p ON a.pet_id = p.id
INNER JOIN veterinario v ON a.veterinario_id = v.id
INNER JOIN procedimento pr ON a.procedimento_id = pr.id
WHERE data = '$dataAtual'
ORDER BY hora";
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

    <title>Página Principal</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0215a38eba.js" crossorigin="anonymous"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        /* Defina a altura e a largura desejadas para o contêiner */
        .tabela-container {
            overflow-x: scroll;
            /* Adiciona rolagem horizontal se necessário */
            overflow-y: scroll;
            /* Adiciona rolagem vertical se necessário */
        }

        /* Defina um estilo para a tabela */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        .item {
            margin: 5px;
            padding: 10px;
            text-align: center;
        }
    </style>

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

                <div class="container">
                    <img src="img/petbanner3.png" class="img-fluid mb-3" alt="..."><br><br>
                    <h4>Agendamentos de Hoje</h4>
                    <div class="row">

                        <div class="col-8 mt-3">
                            <?php
                            if ($resultado->num_rows > 0) {
                                // Exibir os dados em uma tabela
                            ?>
                                <table class="table table-striped table-hover tabela-container" id="listaAgenda">
                                    <tr>
                                        <th>Hora</th>
                                        <th>Status</th>
                                        <th>Nome do Pet</th>
                                        <th>Nome do Veterinário</th>
                                        <th>Procedimento</th>
                                        <th>Ação</th>
                                    </tr>
                                    <?php
                                    while ($row = $resultado->fetch_assoc()) {
                                        $dataFormatada = date("d/m/Y", strtotime($row["data"]));
                                        echo "<tr><td>" . $row["hora"] . "</td><td>" . $row["statusAgenda"];

                                        // Verifique se os índices existem antes de acessá-los
                                        $petNome = isset($row["petNome"]) ? $row["petNome"] : "";
                                        $vetNome = isset($row["vetNome"]) ? $row["vetNome"] : "";
                                        $procNome = isset($row["procNome"]) ? $row["procNome"] : "";

                                        echo "</td><td>" . $petNome . "</td><td>" . $vetNome . "</td><td>" . $procNome . "</td>";
                                    ?>
                                        <td>
                                            <a href="olharAgenda.php?id=<?= $row['id'] ?>" class="btn btn-info"><i class="fa-solid fa-eye" style="color: #000000;"></i></a>
                                        </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                                <br>
                            <?php
                            } else {
                                echo "Nenhum resultado encontrado para hoje.";
                            }
                            ?>
                        </div>
                        <div class="col-4">
                            <div class="item">
                            <a href="cadastroAgenda.php" class="btn btn-success btn-lg btn-block"><i class="fa-solid fa-calendar-days"></i> Novo Agendamento</a>
                            </div>
                            <div class="item" >
                            <a href="cadastroCliente.php" type="button" class="btn btn-primary btn-lg btn-block"><i class="fa-solid fa-user"></i> Novo Cliente</a>
                            </div>
                            <div class="item">
                            <a href="cadastroPet.php" type="button" class="btn btn-info btn-lg btn-block"><i class="fa-solid fa-dog"></i> Novo Pet</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- End of Main Content -->


        </div>


    </div>


    </form><br>
    <!-- Requisita conexão -->
    <?php
    require_once("conexao.php");
    if (isset($_POST['salvar'])) {

        //2. Receber os dados para inserir no BD
        $data = $_POST['data'];
        $hora = $_POST['hora'];
        $resultado = $_POST['resultado'];
        $obs = $_POST['obs'];

        //3. Preparar a SQL
        $sql = "insert into agenda (data, hora, resultado, obs) values ('$data', '$hora', '$resultado', '$obs')";

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