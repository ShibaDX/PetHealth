<!-- Requisita a verificação de autenticação -->
<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro de Agenda</title>

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
                    <!-- Cadastro da Agenda -->
                    <div class="container">
                        <h1 class="mb-4"><i class="fa-solid fa-calendar-days"></i> Agendamento</h1>
                        <form method="post">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-1">
                                            <label for="cliente_id" class="form-label">Cliente</label>
                                            <select name="cliente_id" class="custom-select" aria-label="Large select example" onchange="this.form.submit()">
                                                <option value="">Selecione</option>
                                                <?php
                                                $sql = "SELECT * FROM cliente
                                                WHERE statusCliente = 'Ativo'
                                                ORDER BY nome";
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
                                    <div class="col">
                                        <div class="mb-1">
                                            <label for="pet_id" class="form-label">Pet</label>
                                            <select name="pet_id" class="custom-select" aria-label="Large select example">
                                                <?php
                                                $sql = "select pet.id, pet.nome
                                              from pet 
                                              where pet.cliente_id = {$_POST['cliente_id']}
                                          order by pet.nome";
                                                $resultado = mysqli_query($conexao, $sql);

                                                while ($linha = mysqli_fetch_array($resultado)) {
                                                    $id = $linha['id'];
                                                    $nome = $linha['nome'];

                                                    $selecionado = ($_POST['pet_id'] == $id) ? "selected" : "";

                                                    echo "<option value='{$id}' {$selecionado}>{$nome}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div> <br>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="mb-1">
                                            <label for="formGroupExampleInput" class="form-label">Data</label>
                                            <input name="data" type="date" class="form-control" value="<?= isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '' ?>" required><br>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-1">
                                            <label for="formGroupExampleInput" class="form-label">Hora</label>
                                            <select name="hora" class="custom-select">
                                                <option value="08:00">08:00</option>
                                                <option value="08:30">08:30</option>
                                                <option value="09:00">09:00</option>
                                                <option value="09:30">09:30</option>
                                                <option value="10:00">10:00</option>
                                                <option value="10:30">10:30</option>
                                                <option value="11:00">11:00</option>
                                                <option value="11:30">11:30</option>
                                                <option value="14:00">14:00</option>
                                                <option value="14:30">14:30</option>
                                                <option value="15:00">15:00</option>
                                                <option value="15:30">15:30</option>
                                                <option value="16:00">16:00</option>
                                                <option value="16:30">16:30</option>
                                                <option value="17:00">17:00</option>
                                                <option value="17:30">17:30</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label for="procedimento_id" class="form-label">Procedimento</label>
                                            <select name="procedimento_id" class="custom-select ">
                                                <?php
                                                $sql = "SELECT * FROM procedimento WHERE statusProcedimento = 'Ativo' ORDER BY nome";
                                                $resultado = mysqli_query($conexao, $sql);

                                                while ($linha = mysqli_fetch_array($resultado)) {
                                                    $id = $linha['id'];
                                                    $nome = $linha['nome'];

                                                    $selecionado = ($_POST['procedimento_id'] == $id) ? "selected" : "";

                                                    echo "<option value='{$id}' {$selecionado}>{$nome}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label for="veterinario_id" class="form-label">Veterinário</label>
                                            <select name="veterinario_id" class="custom-select ">
                                                <?php
                                                $sql = "SELECT * FROM veterinario
                                                WHERE statusVet = 'Ativo'
                                                ORDER BY nome";
                                                $resultado = mysqli_query($conexao, $sql);

                                                while ($linha = mysqli_fetch_array($resultado)) {
                                                    $id = $linha['id'];
                                                    $nome = $linha['nome'];

                                                    $selecionado = ($_POST['veterinario_id'] == $id) ? "selected" : "";

                                                    echo "<option value='{$id}' {$selecionado}>{$nome}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label for="formGroupExampleInput" class="form-label">OBS</label>
                                            <textarea name="obs" type="text" class="form-control" value="<?= isset($_POST['obs']) ? htmlspecialchars($_POST['obs']) : '' ?>"></textarea> <br>
                                        </div>
                                    </div>
                                </div>
                                <button name="salvar" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Salvar</button>
                                <a href="listagemAgenda.php" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
                            </div>
                    </div>



                    </form><br>
                    <!-- Requisitar a Conexão -->
                    <?php
                    if (isset($_POST['salvar'])) {

                        //2. Receber os dados para inserir no BD
                        $data = $_POST['data'];
                        $hora = $_POST['hora'];
                        $obs = $_POST['obs'];
                        $pet_id = $_POST['pet_id'];
                        $procedimento_id = $_POST['procedimento_id'];
                        $veterinario_id = $_POST['veterinario_id'];

                        $consulta_disponibilidade = "SELECT * FROM agenda WHERE data = '$data' AND hora = '$hora' AND (pet_id = '$pet_id' OR veterinario_id = '$veterinario_id') ";
                        $resultado_disponibilidade = mysqli_query($conexao, $consulta_disponibilidade);


                        if (mysqli_num_rows($resultado_disponibilidade) > 0) {
                            // Já existe uma consulta agendada nessas condições, exibir mensagem de erro
                            $mensagem = "Desculpe, o horário não está disponível. Por favor, escolha outro horário.";
                        } else {
                            //3. Preparar a SQL
                            $sql = "insert into agenda (statusAgenda, data, hora, obs, pet_id, procedimento_id, veterinario_id) values ('Em andamento', '$data', '$hora', '$obs', '$pet_id', '$procedimento_id', '$veterinario_id')";

                            //4. Executar a SQL
                            mysqli_query($conexao, $sql);

                            //5. Mostrar mensagem ao usuário
                            $mensagem = "Inserido com Sucesso";
                        }

                    // Exibir a mensagem
                    if ($mensagem) { ?>
                        <div class="alert <?= strpos($mensagem, 'Sucesso') !== false ? 'alert-success' : 'alert-danger' ?> mb-2" role="alert">
                            <i class="fa-solid <?= strpos($mensagem, 'Sucesso') !== false ? 'fa-check' : 'fa-x' ?>" style="color: <?= strpos($mensagem, 'Sucesso') !== false ? '#12972c' : '#b70b0b' ?>;"></i>
                            <?= $mensagem ?>
                        </div>
                    <?php }
                    }


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