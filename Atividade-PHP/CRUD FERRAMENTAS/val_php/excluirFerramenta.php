<?php
session_start();
include "../banco/conexao.php";

$idFerramenta = $_POST["idFerramenta"];

$sql = "DELETE FROM tb_ferramentas WHERE cod_ferramenta = $idFerramenta;";
$result = $conn->query($sql);

echo "<script> alert('Ferramenta apagada corretamente!'); window.location.href = 'http://localhost/Atividade-PHP/ferramentas.php';</script>";
