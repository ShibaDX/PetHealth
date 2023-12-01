<?php
if (!isset($_SESSION)) {
    session_start();
}

$caminho_index='../index.php';

if(!isset($_SESSION['id'])) {
    $mensagem = "Sessão expirada. Faça o login novamente.";
    header("location: $caminho_index?mensagem={$mensagem}");
}