<?php 
// contantes com dados de conexão MySQL
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'auditoria');
 
// habilita erros na tela. claro, se houver!
ini_set('display_errors', true);
error_reporting(E_ALL);
 
// inclui o arquivo de inicialização
function db_connect(){
    
    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    return $PDO;
    
}
// resgata variáveis do formulário - Operador ternário

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
$celular = isset($_POST['celular']) ? $_POST['celular'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$senha = sha1(md5(sha1(md5($str)))).strrev(md5(sha1($senha)));
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : '';
$complemento = isset($_POST['complemento']) ? $_POST['complemento'] : '';
$cep = isset($_POST['cep']) ? $_POST['cep'] : '';
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
$numero = isset($_POST['numero']) ? $_POST['numero'] : '';





echo "$nome";


if (empty($nome))
{
    header('Location: index.php?msg=Informe um nome. Por favor, tente novamente!');
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
    header('Location: index.php?msg=Ops, Já existe esse email cadastrado. Por favor, tente novamente!');
    exit;
}
 
$sql = "INSERT INTO usuario(nome, cpf, telefone, email, senha, tipo_usuario) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $nome, PDO::PARAM_STR);
$stmt->bindParam(2, $cpf, PDO::PARAM_STR);
$stmt->bindParam(3, $celular, PDO::PARAM_STR);
$stmt->bindParam(4, $email, PDO::PARAM_STR);
$stmt->bindParam(5, $senha, PDO::PARAM_STR);
$tipo_usuario = 'A';
$stmt->bindParam(6, $tipo_usuario, PDO::PARAM_STR);

$stmt->execute();
$id = $PDO->lastInsertId();

$sql = "INSERT INTO endereco_usuario(usuario_idusuario, logradouro, numero, cep, complemento,bairro, cidade, uf) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";


$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $id, PDO::PARAM_INT);
$stmt->bindParam(2, $endereco, PDO::PARAM_STR);
$stmt->bindParam(3, $numero, PDO::PARAM_INT);
$stmt->bindParam(4, $cep, PDO::PARAM_STR);
$stmt->bindParam(5, $complemento, PDO::PARAM_STR);
$stmt->bindParam(6, $bairro, PDO::PARAM_STR);
$stmt->bindParam(7, $cidade, PDO::PARAM_STR);
$stmt->bindParam(8, $estado, PDO::PARAM_STR);

$stmt->execute();

header('Location: ../entrar.php?msg=Cadastrado com sucesso! Faça seu login agora.');

?>