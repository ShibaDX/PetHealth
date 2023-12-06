<?php
        //1. Conectar no BD (IP, usuario, senha, nome do banco)
        require_once("verificaAutenticacao.php");
        require_once("conexao.php");
        if (isset($_POST['salvar'])) {

            //2. Receber os dados para inserir no BD
            $id = $_POST['id'];
            $data = $_POST['data'];
            $hora = $_POST['hora'];
            $resultado = $_POST['resultado'];
            $obs = $_POST['obs'];

            //3. Preparar a SQL
        $sql = "update agenda set data = '$data', hora = '$hora', resultado = '$resultado', obs = '$obs' where id = $id";

            //4. Executar a SQL
            mysqli_query($conexao, $sql);

            //5. Mostrar mensagem ao usuário
            $mensagem = "Alterado com sucesso";
        }
            //Busca o usuário selecionado pelo usuarioListar.php
            $sql = "select * from agenda where id = " . $_GET['id'];
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

    <title>Editar Agenda</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
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
                    <!-- Editar a Agenda -->
                    <div class="container">
        <h1 class="mb-4"><i class="fa-solid fa-calendar-days"></i> Editar Agenda</h1>
        <form method="post">
        <input type="hidden" name="id" value="<?= $linha['id']?>">
            <div class="mb-1">
                <label for="formGroupExampleInput" class="form-label">Data</label>
                <input name="data" type="date" class="form-control" value="<?=$linha['data'] ?>"><br>
            </div>
            <div class="mb-1">
                <label for="formGroupExampleInput" class="form-label">Hora</label>
                <input name="hora" type="time" class="form-control" value="<?=$linha['hora'] ?>"><br>
            </div>
            <div class="mb-1">
                <label for="formGroupExampleInput" class="form-label">Resultado</label>
                <input name="resultado" type="text" class="form-control" value="<?=$linha['resultado'] ?>"><br>
            </div>
            <div class="mb-1">
                <label for="formGroupExampleInput" class="form-label">OBS</label>
                <input name="obs" type="text" class="form-control" value="<?=$linha['resultado'] ?>"><br>
                <button name="salvar" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Salvar</button>
            <a href="listagemAgenda.php" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
            </div>
            </div>


        </form><br>
        <!-- Mostrar mensagem ao usuário -->
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