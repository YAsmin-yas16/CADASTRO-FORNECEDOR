<?php
session_start();
include "../banco/conexao.php";

$nomeFerramenta = $_POST["nomeFerramentaGravar"];
$marcaFerramenta = $_POST["marcaFerramentaGravar"];

$sql = "SELECT * FROM tb_ferramentas WHERE nome_ferramenta = '$nomeFerramenta' AND marca_ferramenta = '$marcaFerramenta'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
  $sql = "INSERT INTO tb_ferramentas (nome_ferramenta, marca_ferramenta) VALUES ('$nomeFerramenta', '$marcaFerramenta');";
  $result = $conn->query($sql);
  $sql = "INSERT INTO usuario_ferramenta (cod_usuario, cod_ferramenta) VALUES ({$_SESSION['id']}, (SELECT MAX(cod_ferramenta) as cod_ferramenta FROM tb_ferramentas ORDER BY cod_ferramenta DESC));";
  echo $sql;
  $result = $conn->query($sql);
  echo "<script> alert('Ferramenta adicionada corretamente!'); window.location.href = 'http://localhost/Atividade-PHP/ferramentas.php';</script>";
} else {
  echo "<script> alert('Ferramenta já cadastrada'); window.location.href = 'http://localhost/Atividade-PHP/ferramentas.php';</script>";
}
