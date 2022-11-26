<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Coisas Emprestadas</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/estilo.css">
	</head>
	<body>
		<div class="header">
			<p>p r o t ó t i p o</p>
		</div>
		<div class="header2">
			<p><strong>C O I S A S </br> E M P R E S T A D A S</strong></p>
		</div>
		<div class="entrada">
			<div id="bemvindo">
				<p><em>Bem-vindo ao organizador de Coisas Emprestadas da República Desktop</em></br></br></p>
			</div>
			

			<?php
				if(isset($_GET['erro'])){
					echo '<p style="text-align:center;color:red">Usuário e/ou senha incorreto(s).</p>';
				}
					
				if(isset($_GET['autentica'])){
					echo '<p style="text-align:center;color:red">Você não tem permissão de acesso.</p>';
				}
				
			?>

			<form action="login.php" method="post">
				<label for="login"> Residente </label>
				<input type="email" name="login" id="login" placeholder="Email cadastrado" /> 
				</br>
				</br>
				<label for="senha" name="senha"> Password </label>
				<input type="password" name="senha" id="senha" placeholder="Senha cadastrada" /> 
				</br>
				</br>
				<input type="submit" value="Entrar" >
			</form>
			</br>
			<p> Novo usuário? Clique <a href="cadastro.php">aqui</a> para se <strong>cadastrar</strong>! <br/></p>
		</div>
	</body>
	<footer>
		<strong>LEMBRE-SE, se pegou emprestado, devolva! </strong>
	</footer>
</html>