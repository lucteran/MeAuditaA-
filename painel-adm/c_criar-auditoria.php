<?php 
 
// inclui o arquivo de inicialização
require '../conf.php';
session_start();
// resgata variáveis do formulário - Operador ternário

$empresa = isset($_POST['empresa']) ? $_POST['empresa'] : '';
 
if (empty($empresa))
{
    header('Location: criar-auditoria.php?msg=Informe uma empresa. Por favor, tente novamente!');
    exit;
}
 
$PDO = db_connect();

$sql = "SELECT id_auditor FROM auditoria WHERE id_auditor= :auditor AND status_auditoria = '1'";
$stmt = $PDO->prepare($sql);
 
$stmt->bindParam(':auditor', $_SESSION['UsuarioId']);
 
$stmt->execute();
 
$verif = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (count($verif) > 0)
{
    header('Location: criar-auditoria.php?msg=Você já possui auditorias em seu nome. Por favor, resolvê-las antes de iniciar novas auditorias!');
    exit;
}
 
$sql = "INSERT INTO auditoria(usuario_idusuario,id_auditor,data_auditoria,status_auditoria) VALUES (:idusuario, :idauditor, DEFAULT, DEFAULT)";
$stmt = $PDO->prepare($sql);
$id = $_SESSION['UsuarioId'];
$stmt->bindParam(":idusuario", $empresa, PDO::PARAM_INT);
$stmt->bindParam(":idauditor", $id, PDO::PARAM_INT);
$stmt->execute();
header('Location: criar-auditoria.php?msg=A empresa foi atribuída para a sua avaliação!');

?>