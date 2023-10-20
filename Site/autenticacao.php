<?php

if (isset($_POST['entrar'])) {

    //Pegar os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    //Preparar SQL

    $sql = "select * from cliente where email = '{$email}' and senha = '{$senha}'";

    //Executa SQL
    require_once("conexao.php");

    $resultado = mysqli_query($conexao, $sql);
    $linhas = mysqli_num_rows($resultado); //retorna o número de linhas da consulta

    //Verificar a  existência do usuário no BD e faz a permissão
    if ($linhas > 0) {

        $usuario = mysqli_fetch_array($resultado);

        //Cria a sessão para gerar a permissão de acesso ao sistema
        session_start();
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['email'] = $usuario['email'];
        
        //Redireciona para Página Principal
        header("location: indexAdmin.php");
    } else {
        $mensagem = "Email/Senha inválido.";
        header("location: login.php?mensagem=$mensagem");
    }
}
