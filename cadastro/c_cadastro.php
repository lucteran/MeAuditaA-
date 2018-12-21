<?php 
 
// inclui o arquivo de inicialização
require '../conf.php';
session_start();
// resgata variáveis do formulário - Operador ternário

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
if (empty($nome))
{
    header('Location: cadastro.php?msg=Informe um nome. Por favor, tente novamente!');
    exit;
}
 // criar todos os campos
$PDO = db_connect();

$sql = "SELECT * FROM usuario WHERE email= :email";
$stmt = $PDO->prepare($sql);
 
$stmt->bindParam(':email', $email);
 
$stmt->execute();
 
$verif = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (count($verif) > 0)
{
    header('Location: cadastro.php?msg=Ops, Já existe esse email cadastrado. Por favor, tente novamente!');
    exit;
}
 
$sql = "INSERT INTO usuario(usuario_idusuario,id_auditor,data_auditoria,status_auditoria) VALUES (:idusuario, :idauditor, DEFAULT, DEFAULT)";
$stmt = $PDO->prepare($sql);
$id = $_SESSION['UsuarioId'];
$stmt->bindParam(":idusuario", $nome, PDO::PARAM_INT);
$stmt->bindParam(":idauditor", $id, PDO::PARAM_INT);
$stmt->execute();
header('Location: criar-auditoria.php?msg=A nome foi atribuída para a sua avaliação!');

?>