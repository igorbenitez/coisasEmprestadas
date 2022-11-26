<?php

	session_start();
	
	//Apaga da memória os valores armazenados na sessão
	unset($_SESSION['id']);
	unset($_SESSION['nome']);
	
	header("Location: index.php");

?>