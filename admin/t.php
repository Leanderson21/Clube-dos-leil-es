<?php
include("../valida_login.php");

// Pega o id do usuario 
$echo =  $_SESSION['usuario']; 
$selectlance = $conn->prepare("SELECT * from usuarios where usuario ='$echo'");
$selectlance->execute();
$linha = $selectlance->fetchAll(PDO::FETCH_OBJ);
foreach($linha as $lista){
$l2 = $lista->idusuarios;
}

$busca2 = $conn->prepare("SELECT * FROM produto WHERE usuarios_idusuarios ='$l2'");
$busca2->execute();

$mostra2 = $busca2->fetchAll(PDO::FETCH_OBJ);
foreach($mostra2 as $linha2){
   $n = $linha2->nome;
   echo $n;   
}    

?>