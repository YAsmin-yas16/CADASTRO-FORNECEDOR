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
?> 