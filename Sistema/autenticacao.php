<?php

if (isset($_POST['entrar'])) {

    //Pegar os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    //Preparar SQL

    $sql = "select * from usuarioSistema where email = '{$email}' and senha = '{$senha}'";

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
        $_SESSION['funcao'] = $usuario['funcao'];

                // Redireciona para Página Principal baseado na função
                switch ($usuario['funcao']) {
                    case 'Admin':
                        header("location: Admin/indexAdmin.php");
                        break;
                    case 'Veterinario':
                        header("location: Vet/indexVet.php");
                        break;
                    case 'Atendente':
                        header("location: Atendente/indexAtendente.php");
                        break;
                }
        
    } else {
        $mensagem = "Email/Senha inválido.";
        header("location: index.php?mensagem=$mensagem");
    }
}
