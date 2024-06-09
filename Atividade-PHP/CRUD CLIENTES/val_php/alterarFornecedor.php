<?php
session_start();
include "../banco/conexao.php";

$nomeCliente = $_POST["nomeCliente"];
$emailCliente = $_POST["emailCliente"];
$tipoEscolhido = $_POST["tipoEscolhido"];
$idCliente = $_POST["idCliente"];

$sql = "SELECT * FROM fornecedores WHERE nome = '$nomeCliente' AND email = '$emailCliente' AND tipo = $tipoEscolhido";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    $sql = "UPDATE fornecedores SET nome = '$nomeCliente', email = '$emailCliente', tipo = $tipoEscolhido WHERE id = $idCliente";
    $result = $conn->query($sql);
    echo "<script> alert('Fornecedor alterado corretamente!'); window.location.href = 'http://localhost/Atividade-PHP/CRUD CLIENTES/index.php';</script>";
}
else
{
    echo "<script> alert('Fornecedor já existente!'); window.location.href = 'http://localhost/Atividade-PHP/CRUD CLIENTES/index.php';</script>";
}
