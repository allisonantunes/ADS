<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){
    $result_funcionario = "DELETE FROM func WHERE id='$id'";

    $resultado_funcionario = mysqli_query($conn, $result_funcionario);

    if(mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "<p class='p-3 mb-2 bg-success text-white text-center'>Funcionário Excluido Com Sucesso </p>";
        header("Location: lista.php");
    }else {
        $_SESSION['msg'] = "<p class='p-3 mb-2 bg-danger text-white text-center'>Funcionário Não Excluido Com Sucesso </p>";
        header("Location: editar.php");
    }
}else{
    $_SESSION['msg'] = "<p class='p-3 mb-2 bg-danger text-white text-center'>Funcionário Não Excluido Com Sucesso </p>";
    header("Location: editar.php");
}


?>