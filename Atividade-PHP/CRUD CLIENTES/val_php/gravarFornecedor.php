<?php
session_start();
include "../banco/conexao.php";

$nomeGravar = $_POST["nomeGravar"];
$emailGravar = $_POST["emailGravar"];
$tipoEscolhidoGravar = $_POST["tipoEscolhidoGravar"];

$sql = "SELECT * FROM fornecedores WHERE nome = '$nomeGravar' AND email = '$emailGravar' AND tipo = $tipoEscolhidoGravar";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
  $sql = "INSERT INTO fornecedores (nome, email, tipo) VALUES ('$nomeGravar', '$emailGravar', $tipoEscolhidoGravar);";
  $result = $conn->query($sql);
  echo "<script> alert('Fornecedor cadastrado com sucesso!'); window.location.href = 'http://localhost/Atividade-PHP/CRUD CLIENTES/index.php';</script>";
} else {
  echo "<script> alert('Este fornecedor já está cadastrado'); window.location.href = 'http://localhost/Atividade-PHP/CRUD CLIENTES/index.php';</script>";
}
