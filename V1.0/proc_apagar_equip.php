<?php
session_start();
include_once("conexao.php");

$idequipamento = filter_input(INPUT_GET, 'idequipamento', FILTER_SANITIZE_NUMBER_INT);

if(!empty($idequipamento)){
    $result_equipamento = "DELETE FROM equipamento WHERE idequipamento='$idequipamento'";

    $resultado_equipamento = mysqli_query($conn, $result_equipamento);

    if(mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "<p class='p-3 mb-2 bg-success text-white text-center'>Equipamento Excluido Com Sucesso </p>";
        header("Location: lista_equip.php");
    }else {
        $_SESSION['msg'] = "<p class='p-3 mb-2 bg-danger text-white text-center'>Equipamento Não Excluido Com Sucesso </p>";
        header("Location: lista_equip.php");
    }
}else{
    $_SESSION['msg'] = "<p class='p-3 mb-2 bg-danger text-white text-center'>Equipamento Não Excluido Com Sucesso... </p>";
    header("Location: lista_equip.php");
}


?>