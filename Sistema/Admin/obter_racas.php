<?php
// Conecte-se ao banco de dados
require_once("conexao.php");

 

// Consulta SQL
$sql = "SELECT nome  FROM raca ORDER BY  nome";

$result = mysqli_query($conexao, $sql);

$racas = array();

while ($row = mysqli_fetch_assoc($result)) {
    $racas[] = $row;
}

// Fechar a conexão
mysqli_close($conexao);

// Retornar como JSON
echo json_encode($racas);
?>
