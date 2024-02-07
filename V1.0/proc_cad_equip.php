<?php
session_start();
include_once("conexao.php");

$nomeequipamento = filter_input(INPUT_POST, 'nomeequipamento', FILTER_UNSAFE_RAW);
$responsavel = filter_input(INPUT_POST, 'responsavel', FILTER_UNSAFE_RAW);

try{
$result_func = "INSERT INTO equipamento (nomeequipamento, responsavel) VALUES ('$nomeequipamento', '$responsavel')";
$resultado_usuario = mysqli_query($conn, $result_func);
}

catch(Exception $ex){
    $_SESSION['msg'] = "<p class='p-3 mb-2 bg-success text-white text-center'>Erro: Verifique o ID do funcionario - </p>";
    header("Location: cad_equipamento.php");
}

if(mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<p class='p-3 mb-2 bg-success text-white text-center'>Equipamento cadastrado com sucesso </p>";
    header("Location: cad_equipamento.php");
}else {
    $_SESSION['msg'] = "<p class='p-3 mb-2 bg-danger text-white text-center'>ERRO: Equipamento não cadastrado com sucesso </p>";
    header("Location: cad_equipamento.php");
}
?>