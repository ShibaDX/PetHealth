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

    <title>Cadastro de Cliente</title>

    <!-- Custom fonts for this template-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/javascript.js"></script>
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

                <!-- Page Heading -->
                <!-- Cadastro do Cliente -->
                <div class="container">
                    <h1 class="mb-2"><i class="fa-regular fa-user"></i> Cadastro de Cliente</h1>
                    <p class="h6">Os campos marcados com * são obrigatórios</p> <br>
                    <form method="post" onsubmit="return validarFormulario()" onsubmit="return validarTelefone();">
                        <div class="row">
                            <div class="col">
                                <div class="mb-1">
                                    <label for="nome" class="form-label">Nome*</label>
                                    <input id="nome" name="nome" type="text" class="form-control"
                                        value="<?= isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : '' ?>"
                                        required><br>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-1">
                                    <label for="telefone" class="form-label">Telefone*</label>
                                    <input name="telefone" id="telefone" type="tel" class="form-control" maxlength="15"
                                        value="<?= isset($_POST['telefone']) ? htmlspecialchars($_POST['telefone']) : '' ?>"
                                        onkeyup="handlePhone(event)" required><br>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="mb-1">
                                    <label for="cep" class="active" class="form-label">Cep</label>
                                    <input type="tel" placeholder="Informe o Cep" class="form-control" id="cep"
                                        name="cep" autofocus>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="mb-1">
                                    <label for="uf" class="form-label" class="active">UF</label>
                                    <input type="text" placeholder="UF" class="form-control" name="uf" id="uf">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-1">
                                    <label for="cidade" class="form-label">Cidade*</label>
                                    <input id="cidade" name="cidade" type="text" class="form-control" required><br>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-1">
                                    <label for="bairro" class="active" class="form-label">Bairro</label>
                                    <input type="text" placeholder="Informe o Bairro" class="form-control" name="bairro" id="bairro">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10">
                                <label for="endereco" class="form-label">Endereço*</label>
                                <input id="endereco" name="endereco" type="text" class="form-control" required><br>
                            </div>
                            <div class="col-2">
                                <label for="nr_end" class="active" class="form-label">Número</label>
                                <input type="text" placeholder="Informe o número do endereço" class="form-control"
                                    name="nr_end" id="nr_end">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-1">
                                    <label for="sexo" class="form-label">Sexo*</label>
                                    <select id="sexo" name="sexo" class="form-control" required>
                                        <?php
                                        $opcoes = ["M" => "Masculino", "F" => "Feminino", "O" => "Outro"];

                                        foreach ($opcoes as $valor => $rotulo) {
                                            $selected = ($_POST["sexo"] == $valor) ? "selected" : "";
                                            echo "<option value='$valor' $selected>$rotulo</option>";
                                        }
                                        ?>
                                    </select><br>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-1">
                                    <label for="dataNascimento" class="form-label">Data de Nascimento*</label>
                                    <input id="dataNascimento" name="dataNascimento" type="date" class="form-control"
                                        value="<?= isset($_POST['dataNascimento']) ? htmlspecialchars($_POST['dataNascimento']) : '' ?>"
                                        required><br>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-1">
                                    <label for="cpf" class="form-label">CPF*</label>
                                    <input name="cpf" id="cpf" type="text" maxlength="14" class="form-control"
                                        value="<?= isset($_POST['cpf']) ? htmlspecialchars($_POST['cpf']) : '' ?>"
                                        oninput="applyCpfMask(this)" required><br>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-1">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" name="email" type="email" class="form-control"
                                        value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"><br>
                                </div>
                            </div>
                        </div>
                        <button name="salvar" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i>
                            Salvar</button>
                        <a href="listagemCliente.php" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i>
                            Voltar</a>
                    </form><br>
                </div>

                <script>
                    function validarTelefone() {
                        var telefoneInput = document.getElementById("telefone");
                        var telefone = telefoneInput.value;

                        // Expressão regular para validar o formato do telefone
                        var regex = /^\(\d{2}\) \d{4,5}-\d{4}$/;

                        if (!regex.test(telefone)) {
                            alert("Por favor, insira um número de telefone válido no formato (11) 1234-5678 ou (11) 12345-6789.");
                            telefoneInput.focus();
                            return false;
                        }

                        return true;
                    }
                </script>

                <?php
                require_once("conexao.php");

                function validaCPF($cpf)
                {

                    // Extrai somente os números
                    $cpf = preg_replace('/[^0-9]/is', '', $cpf);

                    // Verifica se foi informado todos os digitos corretamente
                    if (strlen($cpf) != 11) {
                        return false;
                    }

                    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
                    if (preg_match('/(\d)\1{10}/', $cpf)) {
                        return false;
                    }

                    // Faz o calculo para validar o CPF
                    for ($t = 9; $t < 11; $t++) {
                        for ($d = 0, $c = 0; $c < $t; $c++) {
                            $d += $cpf[$c] * (($t + 1) - $c);
                        }
                        $d = ((10 * $d) % 11) % 10;
                        if ($cpf[$c] != $d) {
                            return false;
                        }
                    }
                    return true;
                }



                if (isset($_POST['salvar'])) {

                    //2. Receber os dados para inserir no BD
                    $nome = $_POST['nome'];
                    $telefone = $_POST['telefone'];
                    $endereco = $_POST['endereco'];
                    $cidade = $_POST['cidade'];
                    $uf = $_POST['uf'];
                    $sexo = $_POST['sexo'];
                    $dataNascimento = $_POST['dataNascimento'];
                    $cpf = $_POST['cpf'];
                    $email = $_POST['email'];

                    $mensagem = ""; // Inicializa a variável $mensagem
                
                    // Calcular a idade
                    $dataAtual = new DateTime();
                    $DN = new DateTime($dataNascimento);
                    $idade = $dataAtual->diff($DN)->y;

                    if ($idade < 18) {
                        $mensagem = "O cliente precisa ter pelo menos 18 anos";
                    } else if (!validaCPF($cpf)) {
                        // CPF inválido, mostrar mensagem de erro
                        $mensagem = "CPF inválido. Por favor, insira um CPF válido.";
                    } else if (strtotime($dataNascimento) > time()) {
                        // Data de nascimento é no futuro, mostrar mensagem de erro
                        $mensagem = "Data de nascimento não pode ser no futuro";
                    } else {
                        //3. Preparar a SQL
                        $sql = "insert into cliente (status, nome, telefone, endereco, cidade, uf, sexo, dataNascimento, CPF, email) values ('Ativo', '$nome', '$telefone', '$endereco', '$cidade', '$uf', '$sexo', '$dataNascimento', '$cpf', '$email')";

                        //4. Executar a SQL
                        $resultado = mysqli_query($conexao, $sql);

                        //5. Verificar o resultado da inserção
                        if ($resultado) {
                            // Inserção bem-sucedida
                            $mensagem = "Inserido com Sucesso";
                        } else {
                            // Erro na inserção
                            $mensagem = "Erro ao inserir no banco de dados: " . mysqli_error($conexao);
                        }
                    }
                    ?>



                    <?php
                    // Exibir a mensagem
                    if ($mensagem) { ?>
                        <div class="alert <?= strpos($mensagem, 'Sucesso') !== false ? 'alert-success' : 'alert-danger' ?> mb-2"
                            role="alert">
                            <i class="fa-solid <?= strpos($mensagem, 'Sucesso') !== false ? 'fa-check' : 'fa-x' ?>"
                                style="color: <?= strpos($mensagem, 'Sucesso') !== false ? '#12972c' : '#b70b0b' ?>;"></i>
                            <?= $mensagem ?>
                        </div>
                    <?php } ?>

                    <!-- Requisitar a Conexão -->
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
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"
                    type="text/javascript"></script>
                <script type="text/javascript">
                    $(document).ready(function () {

                        $("#cep").mask("99999-999", {
                            completed: function () {
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

                                $.getJSON(url, function (dadosRetorno) {
                                    try {
                                        // Preenche os campos de acordo com o retorno da pesquisa
                                        $("#endereco").val(dadosRetorno.logradouro);
                                        $("#bairro").val(dadosRetorno.bairro);
                                        $("#cidade").val(dadosRetorno.localidade);
                                        $("#uf").val(dadosRetorno.uf);
                                        $("#nr_end").focus();
                                    } catch (ex) { }
                                });
                            }
                        });

                    });

                </script>

</body>

</html>