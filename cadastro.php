<?php 

	if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
		$nome = $_POST["nome"];
		$email = $_POST["email"];
        $senha = $_POST["senha"];
        $confirmacao = $_POST["confirmacao"];
        $error = null;

        if ($senha != $confirmacao) {
            $error = "Confirmação da senha incorreta!";
        } else {
            include "includes/conecta.php";
		
            $sql = "INSERT INTO usuarios (`nome`, `email`, `senha`, `ativo`) VALUES ('$nome', '$email', '$senha', 'A');";
            $res = mysqli_query($conn, $sql);
            
            if ($res) {
                header("Location: login.php");
            }
        }	
		
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title> Perfil </title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="css/estilo.css">
	</head>
	<body>
		<div class="header">
			<h2 style="text-align: center;"> Cadastro de Usuários </h2>
		</div>
		
		<div class="main">	
			<main>
				<form action="cadastro.php" method="post" > 
					<table>
						<tr>
							<td><label for="nome"> Nome </label></td>
							<td><input type="text" name="nome" /></td>
						</tr>
						<tr>
							<td><label for="email"> Email </label></td>
							<td><input type="email" name="email" /></td>
						</tr>
						<tr>
							<td><label for="senha"> Senha </label></td>
							<td><input type="password" name="senha" /></td>
						</tr>
						<tr>
							<td><label for="confirmacao"> Confirmação </label></td>
							<td><input type="password" name="confirmacao" /></td>
						</tr>
						<tr>
							<td><button type="submit" class="btn btn-primary">CADASTRAR</button></td>
						</tr>
					</table>
				</form>
			</main>
		</div>

		<?php
			if (isset($error)) {
				echo "<div class=\"alert alert-danger\" role=\"alert\">". $error ."</div>";
			}
		?>
	</body>
</html>