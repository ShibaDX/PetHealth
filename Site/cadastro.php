<!doctype html>
<html lang="pt-br">

<head>
    <title>Cadastro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="login/css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <br>
            <div class="row justify-content-center">
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <h3 class="text-center mb-4">Cadastro</h3>
                        <form method="post" class="login-form">
                            <div class="form-group">
                                <h6>Nome Completo</h6>
                                <input name="nome" type="text" class="form-control rounded-left" placeholder="Ex: João da Silva" required>
                            </div>
                            <div class="form-group">
                                <h6>Telefone</h6>
                                <input name="telefone" type="text" class="form-control rounded-left" placeholder="(00) 00000-0000" required>
                            </div>
                            <div class="form-group">
                                <h6>Endereço</h6>
                                <input name="endereco" type="text" class="form-control rounded-left" placeholder="Ex: Rua São Paulo, 123" required>
                            </div>
                            <div class="form-group">
                                <h6>Cidade</h6>
                                <input name="cidade" type="text" class="form-control rounded-left" placeholder="Ex: Rua São Paulo" required>
                            </div>
                            <div class="form-group">
                                <h6>UF</h6>
                                <select name="uf" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espirito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                            </div>

                            <h6>Sexo</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="M ">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Masculino
                                </label>
                                <br>
                                <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault2" value="F">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Feminino
                                </label>
                                <br>
                                <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault3" value="O">
                                <label class="form-check-label" for="flexRadioDefault3">
                                    Outro
                                </label>
                            </div>
                            <br>
                            <div class="form-group">
                                <h6>Data de Nascimento</h6>
                                <input name="dataNascimento" type="date" class="form-control rounded-left" required>
                            </div>
                            <div class="form-group">
                                <h6>CPF</h6>
                                <input name="cpf" type="text" class="form-control rounded-left" placeholder="000.000.000-00" required>
                            </div>
                            <div class="form-group">
                                <h6>E-mail</h6>
                                <input name="email" type="text" class="form-control rounded-left" placeholder="Ex: joaosilva@email.com" required>
                            </div>
                            <div class="form-group">
                                <h6>Senha</h6>
                                <input name="senha" type="password" class="form-control rounded-left" required>
                            </div>
                            <div class="form-group">
                                <button name="salvar" type="submit" class="form-control btn btn-primary rounded submit px-3">Cadastrar</button>
                            </div>

                            <?php require_once("conexao.php");
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
                                $senha = $_POST['senha'];

                                //3. Preparar a SQL
                                $sql = "insert into cliente (nome, telefone, endereco, cidade, uf, sexo, dataNascimento, CPF, email, senha) values ('$nome', '$telefone', '$endereco', '$cidade', '$uf', '$sexo', '$dataNascimento', '$cpf', '$email', '$senha')";

                                //4. Executar a SQL
                                mysqli_query($conexao, $sql);
                                $mensagem = "Cadastrado com Sucesso";
                            }
                            if (isset($mensagem)) { ?>
                                <div class="alert alert-success mb-2" role="alert">
                                    <?= $mensagem ?>
                                </div>
                            <?php } ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="login/js/jquery.min.js"></script>
    <script src="login/js/popper.js"></script>
    <script src="login/js/bootstrap.min.js"></script>
    <script src="login/js/main.js"></script>

</body>

</html>