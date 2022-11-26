<?php 

	include "includes/autentica.php";
	include "includes/conecta.php";

	if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
		$nome = $_POST["nome"];
		$descricao = $_POST["descricao"];
		$postagem = $_POST["postagem"];
		$data = $_POST["data"];
	
		
		$sql = "INSERT INTO `itens` (`nome`, `descricao`, `postagem`, `data`, `emprestado`) VALUES ('$nome','$descricao', '$postagem', '$data','N');";
		$res = mysqli_query($conn, $sql);
		if (!$res) {
			$error = "Falha ao cadastrar novo item. Tente novamente...";
		}
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Início </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<div class="header">
			<h1>C O I S A S<br/>E M P R E S T A D A S</h1>
		</div>

		<div class="perfil">
			<tr>
				<td><b>Residente:</b> <?php echo $_SESSION['nome']; ?></td> 
				<td> —  <b>Email:</b> <?php echo $_SESSION['email']; ?></td>
				<td><a href="perfil.php"><button> Editar meu perfil </button></a></td>
				<td><a href="logout.php"><button> Sair </button></a></td>
			</tr>
		</div>

		<!-- Lista de itens -->
		<div class="itens">
			<div class="itenslista">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th scope="col"> Item </th>
							<th scope="col"> Descrição </th>
							<th scope="col"> Data Postagem </th>
							<th scope="col"> Data Devolução </th>
							<th scope="col"> Status </th>
							<th scope="col">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php

							$sql = "SELECT nome, descricao, postagem, data, emprestado FROM itens";
							$res = mysqli_query($conn, $sql);

							//Se encontrou algum registro
							if($res){
								//Percorre os registros encontrados
								while($row = mysqli_fetch_assoc($res)){
									$status = ($row['emprestado'] == "S") ? "Indisponível" : "Disponível";
									$emprestar = ($row['emprestado'] == "S") ? "" : "<button type=\"button\" class=\"btn btn-sm btn-primary\">emprestar</button>";
									echo "<tr>
											<th scope=\"row\">". $row['nome'] ."</th>
											<td>". $row['descricao'] ."</td>
											<td>". $row['postagem'] ."</td>
											<td>". $row['data'] ."</td>
											<td>". $status ."</td>
											<td>". $emprestar ."</td>
										</tr>";					
								}
							}

						?>
					</tbody>
				</table>
			</div>
			<!-- Cadastrando novo item -->
			<div class="novoitem">
				<p><br/> Cadastrar novos itens </p>
				<form action="inicio.php" method="POST">
					<table>
						<tr>
							<td><label for="nome"> Item </label><td>
							<td><input type="text" name="nome" /></td>
						</tr>
						<tr>
							<td><label for="descricao"> Descrição </label></td>
							<td colspan="2"><input type="text" name="descricao" /></td>
						</tr>
						<tr>
							<td><label for="postagem"> Data Postagem </label></td>
							<td colspan="2"><input type="text" name="postagem" /></td>
						</tr>
						<tr>
							<td></br><input type="submit" value="Cadastrar Item"></td>
						</tr>
					</table>
				</form>

				<?php
					if (isset($error)) {
						echo "<div class=\"alert alert-danger\" role=\"alert\">". $error ."</div>";	
					}
				?>
			</div>
		</div>
	</body>
</html>