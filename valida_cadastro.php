<?php require "system/config.php";
$teste = 5;
//Pega os dados do formulário
if(isset($_POST['bnt-cadastro'])){
	$nome    = $_POST['nome'];
	$usuario = $_POST['usuario'];
	$senha   = md5($_POST['senha']);
	$email   = $_POST['email'];

	// Valida os campos do formulário
	 if(empty($nome) || empty($usuario) || empty($senha) || empty($email)){
	 	$alert ='1';
	 	echo "<script>alert('Existem campos em banco');location.href='login.php';</script>";
	 }else{
	 	// Prepara o cadastro
	 	$insereDados=$conn->prepare("INSERT INTO usuarios (nome,usuario,senha,email) VALUES (:nome,:usuario,:senha,:email)");
		 	$insereDados->bindValue(":nome", $nome);
		 	$insereDados->bindValue(":usuario", $usuario);
		 	$insereDados->bindValue(":senha", $senha);
		 	$insereDados->bindValue(":email", $email);
		 // Executa o cadastro
		 $insereDados->execute();

		// Redireciona para a página de login
	 	$alert = '4';
	 	echo "<script>alert('Cadastro realizado com sucesso');location.href='login.php';</script>";
	 }
}	
 ?>