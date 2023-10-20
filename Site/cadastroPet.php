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
                        <h3 class="text-center mb-4">Cadastrar Pet</h3>
                        <form method="post" class="login-form">
                            <div class="form-group">
                                <h6>Nome</h6>
                                <input name="nome" type="text" class="form-control rounded-left" required>
                            </div> 
                            <div class="mb-1">
                                <label for="formGroupExampleInput" class="form-label">Ano de Nascimento</label>
                                <input name="anoNascimento" type="date" class="form-control"><br>
                            </div>    
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="M ">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Macho
                                </label>
                                <br>
                                <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault2" value="F">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Fêmea
                                </label>
                            </div>
                            <div class="mb-1">
                                <label for="formGroupExampleInput" class="form-label">Cor</label>
                                <input name="cor" type="text" class="form-control"><br>
                            </div>
                            <div class="mb-1">
                                <label for="raca_id" class="form-label">Raça</label>
                                <select name="raca_id" class="custom-select">
                                    <?php
                                    $sql = "select * from raca order by nome";
                                    $resultado = mysqli_query($conexao, $sql);

                                    while ($linha = mysqli_fetch_array($resultado)) {
                                        $id = $linha['id'];
                                        $nome = $linha['nome'];

                                        echo "<option value='{$id}'>{$nome}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="formGroupExampleInput" class="form-label">Observações</label>
                                <input name="obs" type="text" class="form-control"><br>

                                <button name="salvar" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Cadastrar</button>

                            </div>

                            <?php require_once("conexao.php");
                            if (isset($_POST['salvar'])) {

                                //2. Receber os dados para inserir no BD
                                $nome = $_POST['nome'];
                                $anoNascimento = $_POST['anoNascimento'];
                                $sexo = $_POST['sexo'];
                                $cor = $_POST['cor'];
                                $raca = $_POST['raca_id'];

                                //3. Preparar a SQL
                                $sql = "insert into pet (nome, anoNascimento, sexo, cor, obs, cliente_id, raca_id) values ('$nome', '$anoNascimento', '$sexo', '$cor', '$obs', '$cliente_id', '$raca_id')";

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