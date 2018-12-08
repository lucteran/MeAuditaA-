<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - Auditando</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!-- Códigos CSS-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/dimencoes.css">
	<link rel="stylesheet" type="text/css" href="css/principal.css">
</head>
<body>
		<div class="conteudo">
			<div class="wrap-login p-l-55 p-r-55 p-t-30 p-b-30">
				<form action="login.php" class="login-form validate-form">
					<span class="login-form-title p-b-49">
						Login
					</span>

					<div class="wrap-campo validate-input m-b-23" data-validate = "É necessário digitar um email para continuar">
						<span class="label-campo">Email</span>
						<input class="campo" type="mail" name="email" placeholder="Digite seu email">
						<span class="focus-campo" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-campo validate-input" data-validate="É necessário digitar uma senha para continuar">
						<span class="label-campo">Senha</span>
						<input class="campo" type="password" name="senha" placeholder="Digite sua senha">
						<span class="focus-campo" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Esqueceu a senha?
						</a>
					</div>
					
					<div class="container-login-form-btn">
						<div class="wrap-login-form-btn">
							<div class="login-form-bgbtn"></div>
							<button class="login-form-btn" type="submit" formmethod="post">
								Entrar
							</button>
						</div>
					</div>

					<div class="flex-col-c p-t-30">
						<span class="txt1 p-b-17">
							Não possui conta?
						</span>

						<a href="#" class="txt2">
							Cadastre-se aqui!
						</a>
					</div>
				</form>
			</div>
		</div>
	
    <!-- Códigos JavaScript-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>  
	<script src="js/principal.js"></script>

</body>
</html>