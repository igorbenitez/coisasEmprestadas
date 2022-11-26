<?php 

	include "includes/autentica.php"; 

	if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
		$id = $_SESSION['id'];
		$nome = $_POST["nome"];
		$email = $_POST["email"];
		$sucesso = null;
	
		include "includes/conecta.php";
		
		$sql = "UPDATE usuarios SET nome = '$nome', email = '$email' WHERE id = $id;";
		$res = mysqli_query($conn, $sql);
		
		if ($res) {
			$sucesso = true;
			$_SESSION['nome'] = $nome;
			$_SESSION['email'] = $email;

			header("Location: inicio.php");
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title> Perfil </title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="css/estilo.css" rel="stylesheet">
	</head>
	<body>
		<div class="header">
			<h2 style="text-align: center;"> Meu Perfil </h2>
	</div>
		
		<div class="main">	
			<main>
				<form action="perfil.php" method="post" >
					<table>
						<tr>
							<td><label for="nome"> Nome </label></td>
							<td><input type="text" name="nome" value="<?php echo $_SESSION['nome'] ?>" /></td>
						</tr>
						<tr>
							<td><label for="email"> Email </label></td>
							<td><input type="email" name="email" value="<?php echo $_SESSION['email'] ?>" /></td>
						</tr>
						<tr>
							<td><button type="submit" class="btn btn-primary">SALVAR</button></td>
						</tr>
					</table>
				</form>
			</main>
		</div>
	</body>
</html>