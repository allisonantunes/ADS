<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<meta charset="UTF-8">
    <title>Listar</title>
    <link rel="stylesheet" href="style/stylee.css">
</head>
<body>
<ul>
  <li><a href="lista.php">Funcionarios Cadastrados</a></li>
  <li><a href="index.php">Adicionar Novo Funcionario</a></li>
  <!-- <li style="float:right"><a class="active" href="#about">About</a></li> -->
</ul>
    <h1>Lista de funcionarios</h1>

    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    
    <div id="login">
        <div class="card">
    <?php

    // receber o numero da pg
    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

    // setar a qnt de item por pg
    $qnt_result_pg = 2;

    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
    
    $todos_func = "SELECT * FROM func LIMIT $inicio, $qnt_result_pg";

    $todos_funcionarios = mysqli_query($conn, $todos_func);
    while($row_func = mysqli_fetch_assoc($todos_funcionarios)) {
    /* echo "ID:" . $row_func['id'] . "<br>"; */
    echo "<div>" . "Nome: " . $row_func['nome'] . "</div>";
    echo "<div>" . "Cargo: " . $row_func['cargo'] . "</div>";
    echo "<div>" . "Salário: " . $row_func['salario'] . "</div>";
    echo "<div>" ."<a class='btn btn-outline-danger btn-sm' href='edit_usuario.php?id=" . $row_func['id'] ."'>Editar</a>" 
    ."<a class='btn btn-outline-danger btn-sm' href='proc_apagar_usuario.php?id=" . $row_func['id'] ."'>Excluir</a>" . "</div>";
    echo "<hr>" . "</hr>";
    }

    $result_pg = "SELECT COUNT(id) AS num_result FROM func";
    $resultado_pg = mysqli_query($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);
    // echo $row_pg['num_result']
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    $max_links = 2;
    ?>
    </div>
    </div>

    <div class="paginas">
    <?php
    echo "<a href='lista.php?pagina=1'> Primeira </a>";
    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina -1; $pag_ant ++){
        if($pag_ant >= 1){
            echo "<a href='lista.php?pagina=$pag_ant'> $pag_ant </a>";
        }
    }
        
    echo "$pagina";

    for($pag_depois = $pagina + 1; $pag_depois <= $pagina + $max_links; $pag_depois ++){
        if($pag_depois <= $quantidade_pg){
            echo "<a href='lista.php?pagina=$pag_depois'> $pag_depois </a>";
        }
    }

    echo "<a href='lista.php?pagina=$quantidade_pg'> Ultima </a>";

    ?>
    </div>

</body>
</html>