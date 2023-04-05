<?php
    class form{
        public static function alert($tipo, $mensagem){
            if($tipo == 'erro'){
                echo '<div style=" padding:5px; background-color: #a13854; border:none; text-align: center;">'.$mensagem.'</div>';
                return false;
            }else if($tipo == 'sucesso'){
                echo '<div style=" padding:5px; background-color: #0a7500a8; border:none; text-align: center;";>'.$mensagem.'</div>';
                return true;
            }
        }

        public static function cadastrar($name, $email, $user_name, $password) {
            $sql = Mysql::conectar()->prepare("INSERT INTO `formulario` VALUES (null,?,?,?,?)");
            $sql->execute(array($name, $email, $user_name, $password));
        }

/*         public static function login($user_name, $password) {
            $usuario = mysql_query('SELECT nome_usuario FROM formulario')
            $senha = mysql_query('SELECT senha FROM formulario')

            if($user_name == $usuario && $password == $senha){
                echo 'login feito com sucesso'
            }else{
                echo 'login ou senha incorreto'
            }
            $sql = Mysql::conectar()->prepare("SELECT nome_usuario, senha FROM `formulario` WHERE (nome_usuario = $user_name AND senha = $password) ");
        
        } */
    }

 
?>