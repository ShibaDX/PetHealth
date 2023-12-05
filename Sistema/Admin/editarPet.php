<?php
//1. Conectar no BD (IP, usuario, senha, nome do banco)
require_once("verificaAutenticacao.php");
require_once("conexao.php");

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

    <title>Editar Pet</title>

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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- Editar o Pet -->
                    <div class="container">
                        <h1 class="mb-4"><i class="fa-solid fa-calendar-days"></i> Editar Pet</h1>
                        <form method="post">
                            <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                            <div class="mb-1">
                                <label for="formGroupExampleInput" class="form-label">Nome</label>
                                <input name="nome" type="text" class="form-control" value="<?= $linha['nome'] ?>"><br>
                            </div>
                            <div class="mb-1">
                                <label for="formGroupExampleInput" class="form-label">Ano de Nascimento</label>
                                <input name="anoNascimento" type="text" class="form-control" value="<?= $linha['anoNascimento'] ?>"><br>
                            </div>
                            <div class="mb-1">
                                <label for="formGroupExampleInput" class="form-label">Sexo</label>
                                <input name="sexo" type="text" class="form-control" value="<?= $linha['sexo'] ?>"><br>
                            </div>
                            <div class="mb-1">
                                <label for="formGroupExampleInput" class="form-label">Cor</label>
                                <input name="cor" type="text" class="form-control" value="<?= $linha['cor'] ?>"><br>
                            </div>
                            <div class="mb-3">
                                <label for="cliente_id" class="form-label">Dono(a)</label>
                                <select name="cliente_id" class="custom-select">
                                    <option value="">-- Selecione --</option>
                                    <?php
                                    $sql = "select * from cliente order by nome";
                                    $resultado = mysqli_query($conexao, $sql);

                                    while ($linhaTU = mysqli_fetch_array($resultado)) {
                                        $id = $linhaTU['id'];
                                        $nome = $linhaTU['nome'];

                                        $selected = ($id == $linha['cliente_id']) ? 'selected' : '';

                                        echo "<option value='{$id}' {$selected}>{$nome}</option>";
                                    } ?>
                                </select>
                            </div> <br>
                            <div class="mb-1">
                                <label for="formGroupExampleInput" class="form-label">OBS</label>
                                <input name="obs" type="text" class="form-control" value="<?= $linha['obs'] ?>"><br>
                                <button name="salvar" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Salvar</button>
                                <a href="listagemPet.php" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
                            </div>
                    </div>
                    </form><br>

                    <?php if (isset($_POST['salvar'])) {

                        //2. Receber os dados para inserir no BD
                        $id = $_POST['id'];
                        $nome = $_POST['nome'];
                        $anoNascimento = $_POST['anoNascimento'];
                        $sexo = $_POST['sexo'];
                        $cor = $_POST['cor'];
                        $obs = $_POST['obs'];
                        $cliente_id = $_POST['cliente_id'];

                        //3. Preparar a SQL
                        $sql = "update pet set nome = '$nome', anoNascimento = '$anoNascimento', sexo = '$sexo', cor = '$cor', obs = '$obs', cliente_id = '$cliente_id' where id = $id";

                        //4. Executar a SQL
                        mysqli_query($conexao, $sql);

                        //5. Mostrar mensagem ao usuário
                        $mensagem = "Alterado com sucesso";
                    }
                    //Mostrar mensagem ao usuário
                    if (isset($mensagem)) { ?>
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