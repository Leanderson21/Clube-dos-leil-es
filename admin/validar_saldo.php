<?php
include("../valida_login.php");

$saldo = $_POST['saldo'];

$echo =  $_SESSION['usuario']; 
$selectSaldo = $conn->prepare("SELECT * from usuarios where usuario ='$echo'");
$selectSaldo->execute();

if($selectSaldo->rowCount() == 1){

    $linha2 = $selectSaldo-> fetchAll(PDO::FETCH_OBJ);
       foreach($linha2 as $lista){
          $_SESSION['saldo'] = $lista->saldo; 
       }
}

if(isset($_SESSION['saldo'])){
    $_SESSION['saldo2'] = $saldo;
}

if(isset($_SESSION['saldo'])){
    $soma = $_SESSION['saldo2'] + $_SESSION['saldo'];
}

if(isset($_SESSION['saldo'])){
    $_SESSION['saldo3'] = $soma;
}


$buscasaldo2 = $conn->prepare("UPDATE usuarios SET saldo=:saldo2 WHERE usuario = '$echo' ");
$buscasaldo2->bindValue(":saldo2", $soma);
$_SESSION['valor'] = $soma;
$buscasaldo2->execute();

header("Location: saldo.php");




?>