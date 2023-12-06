<?php
require_once("conexao.php");

if (isset($_POST['entrar'])) {
    // Pegar os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Executa SQL
    $admin_query = "SELECT * FROM admin WHERE email ='$email' AND senha = '$senha' AND statusAdmin = 'Ativo'";
    $veterinario_query = "SELECT * FROM veterinario WHERE email='$email' AND senha='$senha' AND statusVet = 'Ativo'";
    $atendente_query = "SELECT * FROM atendente WHERE email='$email' AND senha='$senha' AND statusAtendente = 'Ativo'";

    $admin_result = mysqli_query($conexao, $admin_query);
    $veterinario_result = mysqli_query($conexao, $veterinario_query);
    $atendente_result = mysqli_query($conexao, $atendente_query);

    if ($admin_result->num_rows > 0) {
        // Usuário é um administrador
        $user_data = $admin_result->fetch_assoc();

        // Verifica se o usuário está ativo
        if ($user_data['statusAdmin'] == 'Ativo') {

            // Cria a sessão para gerar a permissão de acesso ao sistema
            session_start();
            $_SESSION['id'] = $user_data['id'];
            $_SESSION['nome'] = $user_data['nome'];
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['tipo_usuario'] = 'admin'; // Adiciona o tipo de usuário à sessão

            header("Location: Admin/indexAdmin.php");

        } else {
            // Usuário inativo
            $mensagem = "Usuário inativo. Entre em contato com o administrador.";
            header("location: index.php?mensagem=$mensagem");
            exit();
        }

    } elseif ($veterinario_result->num_rows > 0) {

        // Usuário é um veterinário
        $user_data = $veterinario_result->fetch_assoc();

        // Verifica se o usuário está ativo
        if ($user_data['statusVet'] == 'Ativo') {

            // Cria a sessão para gerar a permissão de acesso ao sistema
            session_start();

            $_SESSION['id'] = $user_data['id'];
            $_SESSION['nome'] = $user_data['nome'];
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['tipo_usuario'] = 'veterinario'; // Adiciona o tipo de usuário à sessão
            header("Location: Vet/indexVet.php");

        } else {

            // Usuário inativo
            $mensagem = "Usuário inativo. Entre em contato com o administrador.";
            header("location: index.php?mensagem=$mensagem");
            exit();
        }

    } elseif ($atendente_result->num_rows > 0) {

        // Usuário é um atendente
        $user_data = $atendente_result->fetch_assoc();

        // Verifica se o usuário está ativo
        if ($user_data['statusAtendente'] == 'Ativo') {

            // Cria a sessão para gerar a permissão de acesso ao sistema
            session_start();
            $_SESSION['id'] = $user_data['id'];
            $_SESSION['nome'] = $user_data['nome'];
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['tipo_usuario'] = 'atendente'; // Adiciona o tipo de usuário à sessão

            header("Location: Atendente/indexAtendente.php");

        } else {
            // Usuário inativo
            $mensagem = "Usuário inativo. Entre em contato com o administrador.";
            header("location: index.php?mensagem=$mensagem");
            exit();
        }

    } else {
        // Autenticação falhou
        $mensagem = "Email/Senha inválido.";
        header("location: index.php?mensagem=$mensagem");
        exit();
    }
}
