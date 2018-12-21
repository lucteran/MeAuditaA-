<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cadastro de usuário</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /><!-- Style-CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="js/jquery.mask.min.js" type="text/javascript"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#cpf").mask("000.000.000-00");
    $("#cep").mask("00000-000");
     $("#celular").mask("(00) 00000-0000");

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
    <label for="Nome">Nome completo *</label>
    <input type="text" name="nome" class="form-control" id="" placeholder="Nome completo sem abreviação">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">CPF *</label>
      <input type="text" name="cpf" class="form-control" id="cpf" placeholder="034.565.321-87">
    </div>
    <div class="form-group col-md-6">
      <label for="inputTelefone">Celular *</label>
      <input type="text" name="celular" class="form-control" id="celular" placeholder="(**) 99999-9999">
    </div>
    <div class="form-group col-md-12">
      <label for="inputEmail4">E-mail *</label>
      <input type="email" name="email" class="form-control" id="email" onblur="checarEmail();" placeholder="@hotmail, @gmail, @outlook...">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Senha *</label>
      <input type="password" name="senha" class="form-control" maxlength="20" id="senha" placeholder="**********">
    </div><br>
    <div class="form-group col-md-6">
      <label for="inputPassword5">Confirmar Senha *</label>
      <input type="password" class="form-control" maxlength="20" id="ConfirmaSenha"  placeholder="**********">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Endereço</label>
    <input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Travessa, Rua, Avenida">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Complemento</label>
    <input type="text" name="complemento" class="form-control" id="inputAddress2" placeholder="Apt, condomínio, vila, residencial">
  </div>
<div class="form-group col-md-4">
    <label for="inputAddress3">Número</label>
    <input type="text" name="numero" class="form-control" id="inputAddress3" placeholder="Nº">
  </div>
  <div class="form-group col-md-8">
    <label for="inputAddress4">Bairro</label>
    <input type="text" name="bairro" class="form-control" id="inputAddress4" placeholder="Ex: Centro">
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Cidade</label>
      <input type="text" name="cidade" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Estado</label>
      <select id="inputState" name="estado" class="form-control">
        <option value="AC"> Acre (AC)</option>
        <option value="AL" >Alagoas (AL)</option>
        <option value="AP" >Amapá (AP)</option>
        <option value="AM" >Amazonas (AM)</option>
        <option value="BA" >Bahia (BA)</option>
        <option value="CE" >Ceará (CE)</option>
        <option value="DF" >Distrito Federal (DF)</option>
        <option value="ES" >Espírito Santo (ES)</option>
        <option value="GO" >Goiás (GO)</option>
        <option value="MA">Maranhão (MA)</option>
        <option value="MT" >Mato Grosso (MT)</option>
        <option value="MS" >Mato Grosso do Sul (MS)</option>
        <option value="MG" >Minas Gerais (MG)</option>
        <option value="PA">Pará (PA)</option>
        <option value="PB" >Paraíba (PB)</option>
        <option value="PR" >Paraná (PR)</option>
        <option value="PE" >Pernambuco (PE)</option>
        <option value="PI" >Piauí (PI)</option>
        <option value="RJ">Rio de Janeiro (RJ)</option>
        <option value="RN" >Rio Grande do Norte (RN)</option>
        <option value="RS" >Rio Grande do Sul (RS)</option>
        <option value="RD" >Rondônia (RO)</option>
        <option value="RR" >Roraima (RR)</option>
        <option value="SC" >Santa Catarina (SC)</option>
        <option value="SP" >São Paulo (SP)</option>
        <option value="SE" >Sergipe (SE)</option>
        <option value="TO" >Tocantins (TO)</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="cep">CEP</label>
      <input type="text" name="cep" class="form-control" id="cep">
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