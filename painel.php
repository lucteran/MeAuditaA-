<?php
session_start();
 
require_once 'conf.php';
 
require 'sessao.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Painel | Após o Login</title>
    </head>
 
    <body>
         
        <h1>Painel do Usuário</h1>
 
        <p>Bem-vindo, 
            <?php 
            $nome = $_SESSION['UsuarioNome'];
            $pos_espaco = strpos($nome, ' ');// conta a quantidade de caracteres antes do espaço
            $nome = substr($nome, 0, $pos_espaco);
            echo $nome;
            ?> | <a href="logoff.php">Sair</a></p>
    </body>
</html>