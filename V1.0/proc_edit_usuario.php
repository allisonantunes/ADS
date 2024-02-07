<?php

session_start();
include_once("conexao.php");
    
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_UNSAFE_RAW);
$cargo = filter_input(INPUT_POST, 'cargo', FILTER_UNSAFE_RAW);
$salario = filter_input(INPUT_POST, 'salario', FILTER_UNSAFE_RAW);


$result_func = "UPDATE func SET nome='$nome', cargo='$cargo', salario='$salario', modified=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_func);


if(mysqli_affected_rows($conn)) {
    $_SESSION['msg'] = "<p class='p-3 mb-2 bg-success text-white text-center'>Funcionário editado com sucesso </p>";
    header("Location: lista.php");
}else {
    $_SESSION['msg'] = "<p class='p-3 mb-2 bg-danger text-white text-center'>ERRO: Funcionário não editado </p>";
    header("Location: lista.php?id=$id");
}
?>