<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$banco = "fornecedor";

// Create connection
$conn = new mysqli($servername, $username, $password, $banco);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT c.* FROM fornecedores c";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $tipo_associado = $row['tipo'] == 1 ? "Pessoa Física" : "Pessoa Jurídica";
    echo "<tr>
          <td scope='col'>{$row['id']}</td>
          <td scope='col'>{$row['nome']}</td>
          <td scope='col'>{$row['email']}</td>
          <td scope='col'>{$tipo_associado}</td>
          <td scope='col'><img src='./assets/editar.png' onclick=\"editar({$row['id']}, '{$row['nome']}', '{$row['email']}', '{$row['tipo']}')\"></td>
          <td scope='col'><img src='./assets/lixeira.png' onclick=\"excluir({$row['id']})\"></td>
          </tr>";
    }
} else {
    echo "<script> alert('Não existem fornecedores cadastrados no momento!');</script>";
}

?>