<!-- Requisita a verificação de autenticação -->
<?php require_once("verificaAutenticacao.php");
require_once("conexao.php");

$sql = "select * from raca where id = " . $_GET['id'];
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro de Raça</title>

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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- Cadastrar Raça -->
                    <div class="container">
                        <h1 class="mb-4"><i class="fa-solid fa-paw"></i> Cadastro de Raça</h1>
                        <form method="post">
                            <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Nome</label>
                                        <input id="nomeRaca" name="nomeRaca" type="text" oninput="validarLetras(this)" class="form-control" value="<?= $linha['nome'] ?>" required> <br>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-1">
                                        <label for="especie" class="form-label">Espécie</label>
                                        <select id="especie" name="especie" class="form-control" required>
                                            <option value="Cachorro" <?php echo ($linha['especie'] == 'Cachorro') ? 'selected' : ''; ?>>Cachorro</option>
                                            <option value="Gato" <?php echo ($linha['especie'] == 'Gato') ? 'selected' : ''; ?>>Gato</option>
                                            <option value="Roedor" <?php echo ($linha['especie'] == 'Roedor') ? 'selected' : ''; ?>>Roedor</option>
                                            <option value="Ave" <?php echo ($linha['especie'] == 'Ave') ? 'selected' : ''; ?>>Ave</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1 ">
                                        <label for="formGroupExampleInput" class="form-label">Status</label><br>
                                        <div class="btn-group" role="group">
                                            <button type="submit" class="btn btn-success" name="status" value="Ativo">Ativo</button>
                                            <button type="submit" class="btn btn-danger" name="status" value="Inativo">Inativo</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Descrição</label>
                                        <textarea name="descricao" type="text" class="form-control"><?= $linha['descricao'] ?></textarea><br>
                                    </div>
                                </div>
                            </div><br>
                            <button name="salvar" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Salvar</button>
                            <a href="listagemRaca.php" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
                    </div>
                    </form><br>

                    <script>
                        function validarLetras(input) {
                            // Substituir qualquer caractere que não seja uma letra por vazio
                            input.value = input.value.replace(/[^a-zA-Z\sàáâãäåçèéêëìíîïòóôõöùúûü-]/g, '');
                        }
                    </script>

                    <?php

                    if (isset($_POST['status'])) {

                        $id = $_POST['id'];
                        $status = $_POST['status'];

                        //Preparar o SQL
                        $sql = "UPDATE raca SET statusRaca = '$status' WHERE id = '$id'";

                        //Executar a SQL
                        mysqli_query($conexao, $sql);

                        //Mostrar mensagem ao usuário
                        $mensagem = "Alterado com Sucesso";
                        if ($mensagem) { ?>
                            <div class="alert <?= strpos($mensagem, 'Sucesso') !== false ? 'alert-success' : 'alert-danger' ?> mb-2" role="alert">
                                <i class="fa-solid <?= strpos($mensagem, 'Sucesso') !== false ? 'fa-check' : 'fa-x' ?>" style="color: <?= strpos($mensagem, 'Sucesso') !== false ? '#12972c' : '#b70b0b' ?>;"></i>
                                <?= $mensagem ?>
                            </div>
                        <?php }
                    }

                    if (isset($_POST['salvar'])) {

                        //2. Receber os dados para inserir no BD
                        $id = $_POST['id'];
                        $nomeRaca = $_POST['nomeRaca'];
                        $descricao = $_POST['descricao'];
                        $especie = $_POST['especie'];

                        //3. Preparar a SQL
                        $sql = "UPDATE raca SET nome = '$nomeRaca', especie = '$especie', descricao = '$descricao' WHERE id = $id";

                        //4. Executar a SQL
                        mysqli_query($conexao, $sql);

                        //5. Mostrar mensagem ao usuário
                        $mensagem = "Inserido com Sucesso";

                        ?>
                        <?php if (isset($mensagem)) { ?>
                            <div class="alert <?= strpos($mensagem, 'Sucesso') !== false ? 'alert-success' : 'alert-danger' ?> mb-2" role="alert">
                                <i class="fa-solid <?= strpos($mensagem, 'Sucesso') !== false ? 'fa-check' : 'fa-x' ?>" style="color: <?= strpos($mensagem, 'Sucesso') !== false ? '#12972c' : '#b70b0b' ?>;"></i>
                                <?= $mensagem ?>
                        <?php }
                        require_once("footer.php");
                    } ?>
                        <!-- Bootstrap core JavaScript-->
                        <script src="vendor/jquery/jquery.min.js"></script>
                        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                        <!-- Core plugin JavaScript-->
                        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                        <!-- Custom scripts for all pages-->
                        <script src="js/sb-admin-2.min.js"></script>

</body>

</html>