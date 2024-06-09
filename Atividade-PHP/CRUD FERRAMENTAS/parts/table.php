<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$banco = "almoxarifado";

// Create connection
$conn = new mysqli($servername, $username, $password, $banco);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT tf.* FROM tb_ferramentas tf
INNER JOIN usuario_ferramenta uf ON uf.cod_ferramenta = tf.cod_ferramenta
WHERE uf.cod_usuario = {$_SESSION['id']}";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo "<tr>
          <td scope='col'>{$row['cod_ferramenta']}</td>
          <td scope='col'>{$row['nome_ferramenta']}</td>
          <td scope='col'>{$row['marca_ferramenta']}</td>
          <td scope='col'><img src='./assets/editar.png' onclick=\"editar({$row['cod_ferramenta']}, '{$row['nome_ferramenta']}', '{$row['marca_ferramenta']}')\"></td>
          <td scope='col'><img src='./assets/lixeira.png' onclick=\"excluir({$row['cod_ferramenta']})\"></td>
          </tr>";
    }
} else {
    echo "<script> alert('Sem ferramentas cadastradas');</script>";
}

?>