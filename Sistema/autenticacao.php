<?php
require_once("conexao.php");

if (isset($_POST['entrar'])) {

    //Pegar os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //Executa SQL

    $admin_query = "SELECT * FROM admin WHERE email ='$email' AND senha = '$senha'";
    $veterinario_query = "SELECT * FROM veterinario WHERE email='$email' AND senha='$senha'";
    $atendente_query = "SELECT * FROM atendente WHERE email='$email' AND senha='$senha'";

    $admin_result = $conexao->query($admin_query);
    $veterinario_result = $conexao->query($veterinario_query);
    $atendente_result = $conexao->query($atendente_query);

    if ($admin_result->num_rows > 0) {
        // Usuário é um administrador
        $user_data = $admin_result->fetch_assoc();
        $_SESSION['user_type'] = 'admin';
        header("Location: Admin/indexAdmin.php");
    } elseif ($veterinario_result->num_rows > 0) {
        // Usuário é um veterinário
        $user_data = $veterinario_result->fetch_assoc();
        $_SESSION['user_type'] = 'veterinario';
        header("Location: Vet/indexVet.php");
    } elseif ($atendente_result->num_rows > 0) {
        // Usuário é um atendente
        $user_data = $atendente_result->fetch_assoc();
        $_SESSION['user_type'] = 'atendente';
        header("Location: Atendente/indexAtendente.php");
    } else {
        // Autenticação falhou
        $mensagem = "Email/Senha inválido.";
        header("location: index.php?mensagem=$mensagem");
    }
}
