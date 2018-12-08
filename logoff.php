<?php
 
// inicia a sessão
session_start();
 
// muda o valor da variável da sessão logado para false
$_SESSION['logado'] = false;
 
// finaliza a sessão
session_destroy();
 
// retorna para a index.php (login)
header('Location: index.php');

?>