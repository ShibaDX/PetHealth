<?php
//1. Conectar no BD (IP, usuario, senha, nome do banco)
require_once("verificaAutenticacao.php");
require_once("conexao.php");
date_default_timezone_set('America/Sao_Paulo');

//Busca o usuário selecionado pelo usuarioListar.php
$sql = "select * from cliente where id = " . $_GET['id'];
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

    <title>Editar Cliente</title>

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
                    <!-- Editar Cliente -->
                    <div class="container">
                        <h1 class="mb-4"><i class="fa-solid fa-calendar-days"></i> Editar Cliente</h1>
                        <form method="post">
                            <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Nome</label>
                                        <input name="nome" type="text" oninput="validarLetras(this)" class="form-control" value="<?= $linha['nome'] ?>"><br>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Telefone</label>
                                        <input name="telefone" type="text" class="form-control" value="<?= $linha['telefone'] ?>"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">CEP</label>
                                        <input name="cep" id="cep" type="text" class="form-control" value="<?= $linha['cep'] ?>"><br>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Cidade</label>
                                        <input id="cidade" name="cidade" type="text" class="form-control" value="<?= $linha['cidade'] ?>"><br>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">UF</label>
                                        <input id="uf" name="uf" type="text" class="form-control" value="<?= $linha['UF'] ?>"><br>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Bairro</label>
                                        <input id="bairro" name="bairro" type="text" class="form-control" value="<?= $linha['bairro'] ?>"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Endereço</label>
                                        <input id="endereco" name="endereco" type="text" class="form-control" value="<?= $linha['endereco'] ?>"><br>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Número</label>
                                        <input name="numero" type="text" class="form-control" value="<?= $linha['numero'] ?>"><br>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Data de Nascimento</label>
                                        <input name="dataNascimento" type="date" class="form-control" value="<?= $linha['dataNascimento'] ?>"><br>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-1">
                                        <label for="sexo" class="form-label">Sexo</label>
                                        <select id="sexo" name="sexo" class="form-control">
                                            <option value="M" <?php echo ($linha['sexo'] == 'M') ? 'selected' : ''; ?>>Masculino</option>
                                            <option value="F" <?php echo ($linha['sexo'] == 'F') ? 'selected' : ''; ?>>Feminino</option>
                                            <option value="O" <?php echo ($linha['sexo'] == 'O') ? 'selected' : ''; ?>>Outro</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">CPF</label>
                                        <input name="cpf" type="text" class="form-control" value="<?= $linha['CPF'] ?>"><br>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="formGroupExampleInput" class="form-label">Email</label>
                                        <input name="email" type="email" class="form-control" value="<?= $linha['email'] ?>"><br>
                                    </div>
                                </div>
                            </div>

                            <button name="salvar" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i>
                                Salvar</button>
                            <a href="listagemCliente.php" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i>
                                Voltar</a>
                    </div>
                    </form><br>

                    <script>
                        function validarLetras(input) {
                            // Substituir qualquer caractere que não seja uma letra por vazio
                            input.value = input.value.replace(/[^a-zA-Z\sàáâãäåçèéêëìíîïòóôõöùúûü-]/g, '');
                        }
                    </script>

                    <?php
                    if (isset($_POST['salvar'])) {

                        //2. Receber os dados para inserir no BD
                        $id = $_POST['id'];
                        $nome = $_POST['nome'];
                        $telefone = $_POST['telefone'];
                        $cep = $_POST['cep'];
                        $cidade = $_POST['cidade'];
                        $uf = $_POST['uf'];
                        $bairro = $_POST['bairro'];
                        $endereco = $_POST['endereco'];
                        $numero = $_POST['numero'];
                        $dataNascimento = $_POST['dataNascimento'];
                        $sexo = $_POST['sexo'];
                        $cpf = $_POST['cpf'];
                        $email = $_POST['email'];

                        //3. Preparar a SQL
                        $sql = "update cliente set nome = '$nome', telefone = '$telefone', cep = '$cep', cidade = '$cidade', uf = '$uf', bairro = '$bairro', endereco = '$endereco', numero = '$numero', dataNascimento = '$dataNascimento', sexo = '$sexo', CPF = '$cpf', email = '$email' where id = $id";

                        //4. Executar a SQL
                        mysqli_query($conexao, $sql);

                        //5. Mostrar mensagem ao usuário
                        $mensagem = "Alterado com sucesso";
                    }
                    ?>

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
                    
                    <script src="https://code.jquery.com/jquery-3.0.0.min.js" type="text/javascript"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {

                            $("#cep").mask("99999-999", {
                                completed: function() {
                                    var cep = $(this).val().replace(/[^0-9]/, "");

                                    // Validação do CEP; caso o CEP não possua 8 números, então cancela
                                    // a consulta
                                    if (cep.length != 8) {
                                        return false;
                                    }

                                    // A url de pesquisa consiste no endereço do webservice + o cep que
                                    // o usuário informou + o tipo de retorno desejado (entre "json",
                                    // "jsonp", "xml", "piped" ou "querty")
                                    var url = "https://viacep.com.br/ws/" + cep + "/json/";

                                    $.getJSON(url, function(dadosRetorno) {
                                        try {
                                            // Preenche os campos de acordo com o retorno da pesquisa
                                            $("#endereco").val(dadosRetorno.logradouro);
                                            $("#bairro").val(dadosRetorno.bairro);
                                            $("#cidade").val(dadosRetorno.localidade);
                                            $("#uf").val(dadosRetorno.uf);
                                            $("#nr_end").focus();
                                        } catch (ex) {}
                                    });
                                }
                            });

                        });
                    </script>

</body>

</html>