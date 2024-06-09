<?php
session_start();
include "../banco/conexao.php";

$nomeFerramenta = $_POST["nomeFerramenta"];
$marcaFerramenta = $_POST["marcaFerramenta"];
$idFerramentaAlteracao = $_POST["idFerramentaAlteracao"];

$sql = "UPDATE tb_ferramentas SET nome_ferramenta = '$nomeFerramenta', marca_ferramenta = '$marcaFerramenta' WHERE cod_ferramenta = $idFerramentaAlteracao";
$result = $conn->query($sql);

echo "<script> alert('Ferramenta alterada corretamente!'); window.location.href = 'http://localhost/Atividade-PHP/ferramentas.php';</script>";
