<?php 
  
require '../conf.php'; 
session_start(); 
  
$PDO = db_connect(); 
// sql to delete a record 
    $sql = "UPDATE auditoria SET id_auditor=0,status_auditoria=1 WHERE idauditoria = ?  "; 
$stmt = $PDO->prepare($sql); 
$stmt->bindParam(1, $_GET['id'], PDO::PARAM_INT); 
$stmt->execute(); 
//$stmt = $PDO->prepare($sql); 
//$stmt->bindParam(':idUsuario', $_SESSION['UsuarioId']); 
//$stmt->execute(); 
 
header('Location: criar-auditoria.php?msg=Voc� n�o est� mais respons�vel por essa auditoria.'); 
 
$conn = null;

?>