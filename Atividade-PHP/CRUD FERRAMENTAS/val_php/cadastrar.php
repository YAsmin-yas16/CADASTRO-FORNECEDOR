<?php
session_start();
include "../banco/conexao.php";

$usuario = $_POST["emailCadastro"];
$senha = $_POST["senhaCadastro"];

$sql = "SELECT * FROM tb_usuario WHERE login_usuario = '$usuario' AND senha_usuario = '$senha'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
  $sql = "INSERT INTO tb_usuario (login_usuario, senha_usuario) VALUES ('$usuario', '$senha');";
  $result = $conn->query($sql);
  $sql = "SELECT * FROM tb_usuario WHERE login_usuario = '$usuario' AND senha_usuario = '$senha'";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
    $_SESSION['id'] = $row["cod_usuario"];
  }
  echo "<script> alert('Usuário cadastrado corretamente!'); window.location.href = 'http://localhost/Atividade-PHP/ferramentas.php';</script>";
} else {
  echo "<script> alert('Usuário já cadastrado'); window.location.href = 'http://localhost/Atividade-PHP/';</script>";
}
