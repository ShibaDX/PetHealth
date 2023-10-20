<!doctype html>
<html lang="pt-br">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="login/css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <br><br><br>
            <div class="row justify-content-center">
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Login</h3>
                        <form action="autenticacao.php" method="post" class="login-form">
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control rounded-left" placeholder="E-mail" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" name="senha" id="senha" class="form-control rounded-left" placeholder="Senha" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="entrar" class="form-control btn btn-primary rounded submit px-3">Login</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class=" text-md-right">
                                    <p>Não possui conta? <a href="cadastro.php">Registrar</a></p>
                                </div>
                            </div>
                            <?php if (isset($_GET['mensagem'])) { ?>
                                <div class="alert alert-danger mb-2" role="alert">
                                    <?= $_GET['mensagem'] ?>
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