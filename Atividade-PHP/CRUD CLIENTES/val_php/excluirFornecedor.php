<?php
session_start();
include "../banco/conexao.php";

$idClienteExcluir = $_POST["idClienteExcluir"];

$sql = "DELETE FROM fornecedores WHERE id = $idClienteExcluir;";
$result = $conn->query($sql);

echo "<script> alert('Fornecedor excluido com sucesso!'); window.location.href = 'http://localhost/Atividade-PHP/CRUD CLIENTES/index.php';</script>";
