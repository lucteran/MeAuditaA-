<?php 
 
// inclui o arquivo de inicialização
require '../conf.php';
session_start();
// resgata variáveis do formulário - Operador ternário

$empresa = isset($_POST['empresa']) ? $_POST['empresa'] : '';
$site = isset($_POST['site']) ? $_POST['site'] : '';
$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
$categoria_vulnerabilidade = isset($_POST['categoria']) ? $_POST['categoria'] : '';
$url = isset($_POST['url']) ? $_POST['url'] : '';
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
$nivel = isset($_POST['nivel']) ? $_POST['nivel'] : '';
 
if (empty($empresa))
{
    header('Location: criar-avaliacao.php?msg=Por favor! Escolha uma empresa.');
    exit;
}
if (empty($site))
{
    header('Location: criar-avaliacao.php?msg=Por favor! Informe o site auditado.');
    exit;
}
if (empty($titulo))
{
    header('Location: criar-avaliacao.php?msg=Por favor! Informe um titulo.');
    exit;
}
if (empty($categoria_vulnerabilidade))
{
    header('Location: criar-avaliacao.php?msg=Por favor! Informe uma categoria de vulnerabilidade do erro.');
    exit;
}
if (empty($url))
{
    header('Location: criar-avaliacao.php?msg=Por favor! Informe a url auditada.');
    exit;
}
if (empty($nivel))
{
    header('Location: criar-avaliacao.php?msg=Por favor! Informe o nível do erro!.');
    exit;
}
 
$PDO = db_connect();

$sql = "SELECT idauditoria FROM auditoria WHERE (auditoria.status_auditoria <> 3 OR auditoria.status_auditoria <> 0) AND auditoria.id_auditor = :idUsuario";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':idUsuario', $_SESSION['UsuarioId']);
 
$stmt->execute();
$auditorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(count($auditorias)==0){
    header('Location: criar-avaliacao.php?msg=Por favor! Cadastre somente empresas que você atribuiu para você!.');
    exit;
}
$auditoria = $auditorias[0];
$idauditoria = $auditoria['idauditoria'];
 
$sql = "INSERT INTO avaliacao(`categoria_vulnerabilidade_idcategoria_vulnerabilidade`,`auditoria_idauditoria`,`titulo`,`site`,`url_vulnerabilidade`,`nivel`,`descricao`) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $categoria_vulnerabilidade, PDO::PARAM_INT);
$stmt->bindParam(2, $idauditoria, PDO::PARAM_INT);
$stmt->bindParam(3, $titulo, PDO::PARAM_STR);
$stmt->bindParam(4, $site, PDO::PARAM_STR);
$stmt->bindParam(5, $url, PDO::PARAM_STR);
$stmt->bindParam(6, $nivel, PDO::PARAM_INT);
$stmt->bindParam(7, $descricao, PDO::PARAM_STR);
$stmt->execute();

$sql = "UPDATE auditoria SET status_auditoria = 2 WHERE idauditoria = ?;";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $idauditoria, PDO::PARAM_INT);
$stmt->execute();
header('Location: criar-avaliacao.php?msg=A empresa foi avaliação por você!');
echo $empresa.'<br>';
echo $site.'<br>';
echo $titulo.'<br>';
echo $categoria_vulnerabilidade.'<br>';
echo $url.'<br>';
echo $descricao.'<br>';
echo $nivel.'<br>';
?>