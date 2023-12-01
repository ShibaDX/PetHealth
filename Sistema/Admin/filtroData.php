<?php
// Obtém o filtro da requisição AJAX
$filtro = isset($_POST['filtro']) ? $_POST['filtro'] : "";

// Modifica a SQL com base no filtro
$sql = "SELECT * FROM veterinario";

if ($filtro !== "") {
    $sql .= " WHERE statusVet = " . ($filtro == "ativos" ? "1" : "0");
}
?>