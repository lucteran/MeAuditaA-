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
            $sql = "SELECT * FROM usuario INNER JOIN auditoria ON usuario.idusuario = auditoria.usuario_idusuario WHERE usuario.tipo_usuario = :tipo AND 1>(SELECT COUNT(idauditoria) from auditoria)";
        $stmt = $PDO->prepare($sql);
        $tipo = 'E';
        $stmt->bindParam(':tipo', $tipo);
        
        $stmt->execute();

        $empresa = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $qtdLinhas = count($empresa);
        $cont = 0;
        while($cont<$qtdLinhas){
            $empresa[$cont];
            $idEmpresa = $usuario['idusuario'];
            $nomeEmpresa = $usuario['nome'];
            echo "<option value=\"$idEmpresa\"selected disabled>$nomeEmpresa...</option>";
            $cont++;
        }
            ?> | <a href="logoff.php">Sair</a></p>
    </body>
</html>