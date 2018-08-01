<?php 

require "system/config.php";

if(isset($_POST['bnt-login'])){
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	$erro = 0; 

	if(empty($usuario)) {			
		$erro = 1;
    	} elseif(empty($senha)) {
    		$erro = 2;
    	} elseif($usuario != 'willian' || $senha != '1234') {
    		$erro = 3;
    	}


	if( $erro === 0 ) {
		session_start();	
		$_SESSION['logado'] = 	true;		
		$_SESSION['usuario'] = 	$usuario;
		header('Location: '.BASE_URL.'/admin');
	} 	
	else{
		header("Location: ".BASE_URL."?page=login&error=$erro");
	}
}
