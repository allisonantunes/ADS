<?php

include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_STRING);
$salario = filter_input(INPUT_POST, 'salario', FILTER_SANITIZE_STRING);


$result_func = "INSERT INTO func (nome, cargo, salario, created) VALUES ('$nome', '$cargo', '$salario', NOW())";
$resultado_usuario = mysqli_query($conn, $result_func);


if(mysqli_insert_id($conn)) {
    header("Location: index.php");
}else {
    header("Location: index.php");
}

?>