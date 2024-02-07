<?php

session_start();
include_once("conexao.php");
    
$idequipamento = filter_input(INPUT_POST, 'idequipamento', FILTER_SANITIZE_NUMBER_INT);
$nomeequipamento = filter_input(INPUT_POST, 'nomeequipamento', FILTER_UNSAFE_RAW);
$responsavel = filter_input(INPUT_POST, 'responsavel', FILTER_SANITIZE_NUMBER_INT);

try {
$result_func = "UPDATE equipamento SET nomeequipamento='$nomeequipamento', responsavel='$responsavel' WHERE idequipamento='$idequipamento'";
$resultado_usuario = mysqli_query($conn, $result_func);
$_SESSION['msg'] = "<p class='p-3 mb-2 bg-success text-white text-center'>Equipamento editado com sucesso </p>";
    header("Location: lista_equip.php");
}
catch(Exception $ex){
    $_SESSION['msg'] = "<p class='p-3 mb-2 bg-danger text-white text-center'>Erro: Verifique o ID do funcionario </p>";
    header("Location: lista_equip.php");
}
