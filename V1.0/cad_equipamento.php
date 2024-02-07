<?php
    session_start();
    include_once("conexao.php");
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style/stylee.css">
</head>
<body>
<ul>
  <li><a href="lista.php">Funcionarios Cadastrados</a></li>
  <li><a href="index.php">Adicionar Novo Funcionario</a></li>
  <li><a href="lista_equip.php">Equipamentos Cadastrados</a></li>
  <li><a href="cad_equipamento.php">Adicionar Novo Equipamento</a></li>
  <!-- <li style="float:right"><a class="active" href="#about">About</a></li> -->
</ul>
    <h1>Cadastrar novo Equipamento</h1>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <div id="login">
        
        <form class="card"method="POST" action="proc_cad_equip.php">

        <div class="card-content-area">
            <label for="nomeequipamento">Nome do Equipamento:</label>
            <input type="text" name="nomeequipamento" />
        </div>

        <div class="card-content-area">
            <label for="responsavel">ID do Responsável:</label>
            <input type="responsavel" name="responsavel">
        </div>

        <div class="card-footer">
            <button type="submit" class="submit" value="cadastrar"> Cadastrar</button>
        </div>
    </form>
    </div>

</body>
</html>