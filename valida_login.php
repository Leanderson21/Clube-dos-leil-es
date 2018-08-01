<?php 
session_start();
require "system/config.php";


// Pega os dados do formulário de login
if(isset($_POST['bnt-login'])){
	$usuario = $_POST['usuario'];
	$senha   = $_POST['senha'];
    
	$alert = 0; 

	// Valida o login
	if(empty($usuario)) {			
		$alert = 1;
		echo "<script>alert('Digite o usuário');location.href='login.php';</script>";		
    	}elseif(empty($senha)) {		
			$alert = 2;
    		echo "<script>alert('Digite a senha');location.href='login.php';</script>";
    	}else{
    		// Criptografa Senha
    		$senhaCriptografada = md5($senha);



	   		// Prepara os dados
			$consulta=$conn->prepare("SELECT * FROM usuarios WHERE usuario =:user AND senha = :pass"); 
			$consulta->bindValue(":user", $usuario); 
			$consulta->bindValue(":pass", $senhaCriptografada);

			// Executa a consulta 
			$consulta->execute(); 

			// Obtem linha consultada 
			$linha = $consulta->fetchObject(); 

				// Se a linha existe: Abre a sessão e redireciona para o painel Administrativo
				if($linha !=0){
					session_start();	
					$_SESSION['logado'] = true;		
					$_SESSION['usuario'] = $linha->usuario;
					$_SESSION['senha'] = $senha;
					$_SESSION['valor'] = $linha->saldo;
					
					header('Location: admin\index.php');

				}else{
					$alert = 3;
					// Redireciona para o login com a mensagem de erro
					
					echo "<script>alert('usuario ou senha invalidos');location.href='login.php';</script>";
					
				}
		}
}
