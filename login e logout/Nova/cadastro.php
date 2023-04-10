<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadrastre-se</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="login">


        <form class="card"method="POST">
        <div class="card-content-area">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" />
        </div>
        <div class="card-content-area">
            <label for="email" >E-mail:</label>
            <input type="email" id="email" name="email" />
        </div>
        <div class="card-content-area">
            <label for="user_name" >Nome de Usuario:</label>
            <input type="text" id="user_name" name="user_name">
        </div>
        <div class="card-content-area">
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="card-footer">
            <button type="submit" class="submit" name="acao"> Cadastrar</button>
            <input type="hidden" name="form" value="f_form">
        </div>
    </form>
    </div>
    
</body>
</html>