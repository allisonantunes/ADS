<?php
include('conexao.php');

if(isset($_POST['usuario']) || isset($_POST['senha'])) {

    if(strlen($_POST['usuario']) == 0) {
        echo "Insira seu Login!";
    }else if(strlen($_POST['senha']) == 0){
        echo "Insira sua senha!";
    }else{

        $usuario = $mysqli->real_escape_string($_POST['usuario']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM formulario WHERE nome_usuario = '$usuario' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("falha execução do cód SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $dados_usuario =  $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $dados_usuario['id'];
            $_SESSION['nome'] = $dados_usuario['nome'];

            header("Location: painel.php");

        } else {
            echo "Falha ao logar! Usuario ou senha incorretos";
        }

    }
}

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
        <form class="card" method="POST">
            <div class="card-header">
                <h2>Faça seu Login</h2>
            </div>
            <div class="card-content">
                <div class="card-content-area">
                    <label for="usuario">Usuário</label>
                    <input type="text" id="usuario" name="usuario" autocomplete="off">
                </div>
                <div class="card-content-area">
                    <label for="password">Senha</label>
                    <input type="password" id="senha" name="senha" autocomplete="off">
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" value="login" name="logar" class="submit">
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