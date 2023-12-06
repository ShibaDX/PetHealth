<?php
if (!isset($_SESSION)) {
    session_start();
}

$caminho_index='../index.php';

// Verifica se o tipo de usuário tem permissão para acessar a página
$pagina_permitida = array('veterinario');
if (!in_array($_SESSION['tipo_usuario'], $pagina_permitida)) {
    $mensagem = "Acesso Negado.";
    // Redireciona para uma página de acesso negado ou apropriada
    header("location: $caminho_index?mensagem={$mensagem}");
    exit();
}

if(!isset($_SESSION['id'])) {
    $mensagem = "Sessão expirada. Faça o login novamente.";
    header("location: $caminho_index?mensagem={$mensagem}");
}