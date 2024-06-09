<?php
session_start();
include "../banco/conexao.php";

$usuario = $_POST["usuarioLogar"];
$senha = $_POST["senhaLogar"];

$sql = "SELECT * FROM tb_usuario WHERE login_usuario = '$usuario' AND senha_usuario = '$senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $_SESSION['id'] = $row["cod_usuario"];
  }
  include "../ferramentas.php";
  echo "<script> alert('Login efetuado!'); window.location.href = 'http://localhost/Atividade-PHP/ferramentas.php';</script>";
} else {
  echo "<script> alert('Usuário não encontrado'); window.location.href = 'http://localhost/Atividade-PHP/';</script>";
}
