<?php
require_once("conexao.php");

if (isset($_GET['especie'])) {
    $especieSelecionada = $_GET['especie'];

    $sql = "SELECT id, nome FROM raca WHERE especie = '$especieSelecionada' ORDER BY nome";
    $result = mysqli_query($conexao, $sql);

    $racas = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $racas[] = $row;
    }

    // Fechar a conexão
    mysqli_close($conexao);

    // Retornar como JSON
    echo json_encode($racas);
} else {
    echo json_encode(array()); // Se não houver uma espécie específica, retorna um array vazio
}
?>
