<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style/stylee.css">
</head>
<body>
    <h1>Cadastrar novo Funcionario</h1>

    <div class="links">
            <a href="lista.php" class="criar_conta">Funcionarios Cadastrados</a>
    </div>
    <div class="links">
            <a href="excluir.php" class="criar_conta">Excluir Funcionarios</a>
    </div>


    <div id="login">
        
        <form class="card"method="POST" action="processa.php">

        <div class="card-content-area">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" />
        </div>

        <div class="card-content-area">
            <label for="" >Cargo:</label>
            <input type="text" name="cargo">
        </div>

        <div class="card-content-area">
            <label for="salario">Salário:</label>
            <input type="salario" name="salario">
        </div>

        <div class="card-footer">
            <button type="submit" class="submit" value="cadastrar"> Cadastrar</button>
        </div>

    </form>
    </div>

    <a href="lista.php">Funcionarios Cadastrados</a>

</body>
</html>