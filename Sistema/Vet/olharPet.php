<?php
//1. Conectar no BD (IP, usuario, senha, nome do banco)
require_once("verificaAutenticacao.php");
require_once("conexao.php");
date_default_timezone_set('America/Sao_Paulo');
//Busca o usuário selecionado pelo usuarioListar.php
$sql = "select * from pet where id = " . $_GET['id'];
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

    <title>Visualizar Pet</title>

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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- Editar o Pet -->
                    <div class="container">
                        <h1 class="mb-4"><i class="fa-solid fa-dog"></i> Editar Pet</h1>
                        <form method="post">
                            <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="nomePet" class="form-label">Nome*</label>
                                        <input id="nomePet" name="nomePet" oninput="validarLetras(this)" type="text" class="form-control" value="<?= $linha['nome'] ?>" disabled><br>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-1">
                                        <label for="especie" class="form-label">Espécie*</label>
                                        <select id="especie" name="especie" class="form-control" onchange="atualizarRacas(this.value)" disabled>
                                            <?php
                                            $opcoes = ["Cachorro" => "Cachorro", "Gato" => "Gato", "Roedor" => "Roedor", "Ave" => "Ave"];

                                            foreach ($opcoes as $valor => $rotulo) {
                                                $selected = ($linha["especie"] == $valor) ? "selected" : "";
                                                echo "<option value='$valor' $selected>$rotulo</option>";
                                            }
                                            ?>
                                        </select> <br>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-1">
                                        <label for="anoNascimento" class="form-label">Ano de Nascimento*</label>
                                        <input id="anoNascimento" name="anoNascimento" min="1900" max="<?php echo date('Y'); ?>" type="number" class="form-control" value="<?= $linha['anoNascimento'] ?>" disabled><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="raca_id" class="form-label">Raça*</label>
                                        <select id="raca_id" name="raca_id" class="form-control" disabled>
                                            <?php
                                            $sqlRacas = "SELECT p.id, r.id as racaId, r.nome as racaNome FROM pet p
                                            INNER JOIN raca r ON p.raca_id = r.id
                                            WHERE p.id = " . $_GET['id'];
                                            $resultadoRacas = mysqli_query($conexao, $sqlRacas);

                                            // Verifique se há resultados
                                            if ($raca = mysqli_fetch_array($resultadoRacas)) {
                                                // Raça associada ao pet
                                                $racaAssociadaId = $raca['racaId'];
                                            }

                                            // Consulta para obter todas as raças
                                            $sqlTodasRacas = "SELECT id, nome FROM raca";
                                            $resultadoTodasRacas = mysqli_query($conexao, $sqlTodasRacas);

                                            // Iterar sobre as raças e adicionar opções
                                            while ($racaAtual = mysqli_fetch_array($resultadoTodasRacas)) {
                                                $selected = ($racaAtual['id'] == $racaAssociadaId) ? "selected" : "";
                                                echo "<option value='{$racaAtual['id']}' $selected>{$racaAtual['nome']}</option>";
                                            }
                                            ?>
                                        </select>

                                    </div> <br>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="cor" class="form-label">Cor*</label>
                                        <input id="cor" name="cor" type="text" pattern="[^0-9]*" class="form-control" value="<?= $linha['cor'] ?>" disabled><br>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-1">
                                        <label for="sexo" class="form-label">Sexo*</label>
                                        <select id="sexo" name="sexo" class="form-control" disabled>
                                            <?php
                                            $opcoes = ["Macho" => "Macho", "Fêmea" => "Fêmea"];

                                            foreach ($opcoes as $valor => $rotulo) {
                                                $selected = ($linha["sexo"] == $valor) ? "selected" : "";
                                                echo "<option value='$valor' $selected>$rotulo</option>";
                                            }
                                            ?>
                                        </select> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-1">
                                        <label for="cliente_id" class="form-label">Dono(a)*</label>
                                        <select id="cliente_id" name="cliente_id" class="form-control" disabled>
                                            <?php
                                            $sql = "select * from cliente order by nome";
                                            $resultado = mysqli_query($conexao, $sql);

                                            while ($dono = mysqli_fetch_array($resultado)) {
                                                $idDono = $dono['id'];
                                                $nomeDono = $dono['nome'];

                                                $selectedDono = ($linha["cliente_id"] == $idDono) ? "selected" : "";
                                                echo "<option value='{$idDono}' $selectedDono>{$nomeDono}</option>";
                                            }
                                            ?>
                                        </select>

                                    </div> <br>
                                </div>
                                <div class="col">
                                    <div class="mb-1">
                                        <label for="obs" class="form-label">OBS</label>
                                        <textarea id="obs" name="obs" type="text" class="form-control" disabled><?= isset($linha['obs']) ? $linha['obs'] : '' ?></textarea><br>
                                    </div>
                                </div>
                            </div>
                            <center><a href="listagemPet.php" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i> Voltar</a></center>
                    </div>
                    </form><br>
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