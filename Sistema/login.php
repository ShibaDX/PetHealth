<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link href="/loginStyle.css">
  <script src="https://kit.fontawesome.com/0215a38eba.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- div.(classe) -->
  <!-- shift + alt + seta p/ baixo -->
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!--
      <form action="autenticacao.php" method="post">
        <h1 class="mt-4">Login</h1>
        <div class="mb-3 mt-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="senha" class="form-label">Senha</label>
          <input type="password" name="senha" class="form-control" id="senha">
        </div>
        <button type="submit" name="entrar" class="btn btn-primary">Entrar</button>
      </form>
    </div> -->

      <form action="autenticacao.php" method="post">
        <input type="text" id="login" class="fadeIn second" name="login" placeholder="Login">
        <input type="password" id="password" class="fadeIn third" name="senha" placeholder="Senha">
        <input type="submit" class="fadeIn fourth" value="Log In" name="entrar">
      </form>
    </div>
  </div>
</body>

</html>