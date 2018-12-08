<?php
 
// inclui o arquivo de inicialização
require 'conf.php';
 
// resgata variáveis do formulário - Operador ternário
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
 
if (empty($email) || empty($senha))
{
    echo "Informe email e senha. Por favor, tente novamente!
    <br><a href=\"index.php\">Voltar</a>";
    exit;
}
 
// cria o hash da senha
$senhaHash = gerador_hash($senha);
 
$PDO = db_connect();
 
$sql = "SELECT idusuario, nome, ativo FROM usuario WHERE email = :email AND senha = :senha";
$stmt = $PDO->prepare($sql);
 
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senhaHash);
 
$stmt->execute();
 
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (count($usuarios) <= 0)
{
    echo "Email ou senha incorretos. Por favor, tente novamente!
    <br><a href=\"index.php\">Voltar</a>";
    exit;
}
 
// pega o primeiro usuário
$usuario = $usuarios[0];

//verifica se o usuário já ativou a conta
if ($usuario['ativo'] == 0)
{
    echo "Você ainda não ativou sua conta.
    <br>
    Por favor, entre em seu e-mail e ative sua conta!
    <br>
    <a href=\"index.php\">Voltar</a>";
    exit;
}

session_start();
$_SESSION['logado'] = true;
$_SESSION['UsuarioId'] = $usuario['idusuario'];
$_SESSION['UsuarioNome'] = $usuario['nome'];
 
header('Location: painel.php');
?>