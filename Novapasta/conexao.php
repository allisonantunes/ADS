<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$database = "funcionarios";

$conn = mysqli_connect($servidor, $usuario, $senha, $database);

if($conn->error) {
    die("Falha ao conectar ao banco de dados: ". $mysqli->error);
}
?>