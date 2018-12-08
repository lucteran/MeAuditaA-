<?php
 
/**
 * Conexão com o SGBD MySQL utilizando a biblioteca PDO.
 */
function db_connect(){
    
    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    return $PDO;
    
}
 
 
/**
 * Cria o hash da senha, usando MD5 e SHA-1
 */
function gerador_hash($str){
    
    return sha1(md5(sha1(md5($str)))).strrev(md5(sha1($str)));
    
}
 
 
/**
 * Verifica se o usuário está logado
 */
function isLoggedIn(){
    
    if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true){
        return false;
    }
 
    return true;
}

?>