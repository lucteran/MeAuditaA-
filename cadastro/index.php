<!DOCTYPE html>
<html lang="pt-br">
<head>
  
	<title>Cadastro de usuário</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="js/jquery.mask.min.js" type="text/javascript"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#cpf").mask("000.000.000-00");
    $("#cep").mask("00000-000");
     $("#nome").mask("ABCDEFGHIJKLMNOPQRSTUVXZ");
  })

</script>

<script type="text/javascript">
function verifica() {
  if (document.forms[0].email.value.length == 0) {
    alert('Por favor, informe o seu Email.');
  document.frmEnvia.email.focus();
    return false;
  }
  return true;
}
 
function checarEmail(){
if( document.forms[0].email.value=="" 
   || document.forms[0].email.value.indexOf('@')==-1 
     || document.forms[0].email.value.indexOf('.')==-1 )
  {
     alert( "Por favor, informe um email válido!" );   
     return false;
  }
}
</script>
<?php if(isset($_GET['msg']) || !empty($_GET['msg'])){
    ?>
    <script>
            window.alert("<?php echo $_GET['msg']; ?>");
    </script>
    <?php } 
    ?> 

<script>

function validarSenha(){
   NovaSenha = document.getElementById('senha').value;
   CNovaSenha = document.getElementById('ConfirmaSenha').value;
   if (NovaSenha != CNovaSenha) {
      alert("SENHAS DIFERENTES!\nFAVOR DIGITAR SENHAS IGUAIS"); 
     
}

}
        </script>


</head>
<body>

<form name="frmEnvia" action="c_cadastro.php" method="POST">
	<div class="form-group">
    <label for="Nome">Nome completo</label>
    <input type="text" name="nome" class="form-control" id="" placeholder="Maria Das Graças">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">CPF</label>
      <input type="text" name="cpf" class="form-control" id="cpf" placeholder="034.565.321-87">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" id="email" onblur="checarEmail();" placeholder="@hotmail, @gmail, @outlook...">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Senha</label>
      <input type="password" class="form-control" maxlength="20" id="senha" placeholder="**********">
    </div><br>
    <div class="form-group col-md-6">
      <label for="inputPassword5">Confirmar Senha</label>
      <input type="password" class="form-control" maxlength="20" id="ConfirmaSenha"  placeholder="**********">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Endereço</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Travessa, Rua, Avenida">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Complemento</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apt, condomínio, vila, residencial">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Cidade</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Estado</label>
      <select id="inputState" class="form-control">
        <option selected> Acre (AC)</option>
        <option selected>Alagoas (AL)</option>
        <option selected>Amapá (AP)</option>
        <option selected>Amazonas (AM)</option>
        <option selected>Bahia (BA)</option>
        <option selected>Ceará (CE)</option>
        <option selected>Distrito Federal (DF)</option>
        <option selected>Espírito Santo (ES)</option>
        <option selected>Goiás (GO)</option>
        <option selected>Maranhão (MA)</option>
        <option selected>Mato Grosso (MT)</option>
        <option selected>Mato Grosso do Sul (MS)</option>
        <option selected>Minas Gerais (MG)</option>
        <option selected>Pará (PA)</option>
        <option selected>Paraíba (PB)</option>
        <option selected>Paraná (PR)</option>
        <option selected>Pernambuco (PE)</option>
        <option selected>Piauí (PI)</option>
        <option selected>Rio de Janeiro (RJ)</option>
        <option selected>Rio Grande do Norte (RN)</option>
        <option selected>Rio Grande do Sul (RS)</option>
        <option selected>Rondônia (RO)</option>
        <option selected>Roraima (RR)</option>
        <option selected>Santa Catarina (SC)</option>
        <option selected>São Paulo (SP)</option>
        <option selected>Sergipe (SE)</option>
        <option selected>Tocantins (TO)</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="cpf">CEP</label>
      <input type="text" class="form-control" id="cep">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
    </div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary"onClick="validarSenha();">Cadastrar</button>
  <p><span style="color: red">*</span> Campos Obrigatórios</p>
</form>
</body>
</html>