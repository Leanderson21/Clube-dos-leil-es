<?php

// Base do sistema


// Conexão com banco de dados
try{
	$conn = new PDO('mysql:host=localhost;dbname=testee', 'root', '');
}catch(PDOException $erro){
	echo '<strong>Erro:</strong> '.$erro->getMessage();
}