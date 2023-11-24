<!-- Requisita a conexão e a verificação de autenticação -->
<?php require_once("verificaAutenticacao.php");
require_once("conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro de Pet</title>

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
                    <!-- Cadastro do Pet -->
                    <div class="container">
                        <h1 class="mb-4"><i class="fa-solid fa-dog"></i> Cadastro de Pet</h1>
                        <form method="post">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="nome" class="form-label">Nome</label>
                                        <input id="nome" name="nomePet" type="text" class="form-control"><br>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="especie" class="form-label">Espécie</label>
                                        <select id="especie" name="especie" class="form-control" onchange="atualizarRacas()">
                                            <option selected>Selecione</option>
                                            <option value="Cachorro">Cachorro</option>
                                            <option value="Gato">Gato</option>
                                            <option value="Roedor">Roedor</option>
                                            <option value="Ave">Ave</option>
                                        </select> <br>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-1">
                                        <label for="anoNascimento" class="form-label">Ano de Nascimento</label>
                                        <input id="anoNascimento" name="anoNascimento" type="text" class="form-control"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label for="raca_id" class="form-label">Raça</label>
                                        <select id="raca_id" name="raca_id" class="form-control">
                                            <option selected>Selecione</option>
                                        </select>
                                    </div> <br>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="cor" class="form-label">Cor</label>
                                        <input id="cor" name="cor" type="text" class="form-control"><br>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-1">
                                        <label for="sexo" class="form-label">Sexo</label>
                                        <select id="sexo" name="sexo" class="form-control">
                                            <option selected>Selecione</option>
                                            <option value="Macho">Macho</option>
                                            <option value="Fêmea">Fêmea</option>
                                        </select> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-1">
                                        <label for="cliente_id" class="form-label">Dono(a)</label>
                                        <select id="cliente_id" name="cliente_id" class="form-control">
                                            <?php
                                            $sql = "select * from cliente order by nome";
                                            $resultado = mysqli_query($conexao, $sql);

                                            while ($linha = mysqli_fetch_array($resultado)) {
                                                $id = $linha['id'];
                                                $nome = $linha['nome'];

                                                echo "<option value='{$id}'>{$nome}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div> <br>
                                </div>
                                <div class="col">
                                    <div class="mb-1">
                                        <label for="obs" class="form-label">OBS</label>
                                        <textarea id="obs" name="obs" type="text" class="form-control"></textarea><br>
                                    </div>
                                </div>
                            </div>
                            <button name="salvar" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Salvar</button>
                            <a href="listagemPet.php" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i> Voltar</a>


                    </div>

                    </form><br>

                    <script>
                        // Função para atualizar dinamicamente as opções do campo de seleção de raças
                        function atualizarRacas() {
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    console.log(xhr.responseText); // Adicione esta linha para verificar os dados no console

                                    var racas = JSON.parse(xhr.responseText);

                                    // Limpar opções existentes
                                    var selectRaca = document.getElementById("raca_id");
                                    selectRaca.innerHTML = "";

                                    // Adicionar opções
                                    for (var i = 0; i < racas.length; i++) {
                                        var option = document.createElement("option");
                                        option.value = racas[i].id; // Use o ID como valor
                                        option.text = racas[i].nome; // Use o nome como texto da opção
                                        selectRaca.add(option);
                                    }
                                }
                            };

                            // Fazer a solicitação ao arquivo PHP
                            xhr.open("GET", "obter_racas.php", true);
                            xhr.send();
                        }



                        function validarFormulario() {
                            // Lógica de validação do lado do cliente

                            // Exemplo: Verificar se todos os campos obrigatórios estão preenchidos
                            var camposObrigatorios = ["nomePet", "anoNascimento", "sexo", "cor", "cliente_id", "raca_id", "especie"];
                            for (var i = 0; i < camposObrigatorios.length; i++) {
                                var campo = document.getElementById(camposObrigatorios[i]).value;
                                if (campo === "") {
                                    alert("Por favor, preencha todos os campos obrigatórios.");
                                    return false; // Impede o envio do formulário
                                }
                            }

                            // Outras verificações podem ser adicionadas conforme necessário

                            return true; // Permite o envio do formulário
                        }
                    </script>

                    <!-- Requisitar a Conexão -->
                    <?php

                    if (isset($_POST['salvar'])) {

                        //2. Receber os dados para inserir no BD
                        $nome = $_POST['nomePet'];
                        $anoNascimento = $_POST['anoNascimento'];
                        $sexo = $_POST['sexo'];
                        $cor = $_POST['cor'];
                        $obs = $_POST['obs'];
                        $cliente_id = $_POST['cliente_id'];
                        $raca_id = $_POST['raca_id'];
                        $especie = $_POST['especie'];



                        //3. Preparar a SQL
                        $sql = "insert into pet (nome, anoNascimento, sexo, cor, obs, cliente_id, raca_id, especie) values ('$nome', '$anoNascimento', '$sexo', '$cor', '$obs', '$cliente_id', '$raca_id', '$especie')";

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
                    <?php  }
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