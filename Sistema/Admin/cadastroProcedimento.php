<!-- Requisita a verificação de autenticação -->
<?php require_once("verificaAutenticacao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro de Procedimento</title>

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

    <?php require_once("sidebarAdmin.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

    <?php require_once("topbarAdmin.php"); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- Cadastrar Procedimento -->
                    <div class="container">
        <h1 class="mb-4"><i class="fa-solid fa-calendar-days"></i> Cadastro de Procedimento</h1>
        <form method="post">
            <div class="mb-1">
                <label for="formGroupExampleInput" class="form-label">Nome</label>
                <input name="nome" type="text" class="form-control"><br>
            </div>
            <div class="mb-1">
                <label for="formGroupExampleInput" class="form-label">Valor</label>
                <input name="valor" type="text" class="form-control"><br>
            </div>
            <div class="mb-1">
                                <label for="formGroupExampleInput" class="form-label">Categoria</label>
                                <select name="categoria">
                                    <option value="cachorro">Consulta</option>
                                    <option value="gato">Vacina</option>
                                    <option value="roedor">Castração</option>
                                    <option value="ave">Vermifugação</option>
                                    <option value="ave">Procedimento Cirúrgico</option>
                                </select>
                            </div>
                <button name="salvar" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Salvar</button>
            <a href="listagemAgenda.php" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
            </div>


        </form><br>
        <!-- Requisitar a Conexão -->
        <?php
        require_once("conexao.php");
        if (isset($_POST['salvar'])) {

            //2. Receber os dados para inserir no BD
            $nome = $_POST['nome'];
            $valor = $_POST['valor'];
            $categoria = $_POST['categoria'];

            //3. Preparar a SQL
            $sql = "insert into procedimento (nome, valor, categoria) values ('$nome', '$valor', '$categoria')";

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