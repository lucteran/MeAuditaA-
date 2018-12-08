<?php
 
// contantes com dados de conexão MySQL
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'auditoria');
 
// habilita erros na tela. claro, se houver!
ini_set('display_errors', true);
error_reporting(E_ALL);
 
// inclui o arquivo de funções SQL. Dentre eles, a função de conexão.
require_once 'funcoes.php';

?>