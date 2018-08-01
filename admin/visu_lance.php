<?php
require "../system/config.php";
include("../valida_login.php");

$echo =  $_SESSION['usuario']; 
$selectlance = $conn->prepare("SELECT * from usuarios where usuario ='$echo'");
$selectlance->execute();
$linha = $selectlance->fetchAll(PDO::FETCH_OBJ);
foreach($linha as $lista){
$l2 = $lista->idusuarios;
}

$selectlance = $conn->prepare("SELECT * from produto where usuarios_idusuarios = '$l2'");
$selectlance->execute();
$linha = $selectlance->fetchAll(PDO::FETCH_OBJ);
foreach($linha as $lista){
$p1 =  $lista->nome;
$p2 = $lista->lance;
$_SESSION['p2'] = $p2;
}

?>