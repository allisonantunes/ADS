<?php

/*     include('config.php');
    include('classes/Form.php');
    include('classes/Mysql.php');
    Mysql::login(); */

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="login">
        <form class="card">
            <div class="card-header">
                <h2>Faça seu Login</h2>
            </div>
            <div class="card-content">
                <div class="card-content-area">
                    <label for="usuario">Usuário</label>
                    <input type="text" id="usuario" autocomplete="off">
                </div>
                <div class="card-content-area">
                    <label for="password">Senha</label>
                    <input type="password" id="password" autocomplete="off">
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" value="login" class="submit">
                <div class="links">
                    <a href="#" class="recuperar_senha">Esqueceu a Senha?</a>
                    <a href="cadastro.php" class="criar_conta">Crie sua Conta</a>
                </div>

            </div>
        </form>
    </div>
    <script src="javascript.js"></script>
</body>

</html>