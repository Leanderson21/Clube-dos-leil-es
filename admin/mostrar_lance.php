<?php
require "../system/config.php";




// MOSTRAR LANCE DO PRODUTO 1
$mostrar_lance = $conn->prepare("SELECT * FROM produto WHERE idproduto = 1");
$mostrar_lance->execute();

$p1 = $mostrar_lance->fetchAll(PDO::FETCH_OBJ);
foreach($p1 as $lista1){
    $_SESSION['p1'] = $lista1->lance;    
}

// MOSTRAR LANCE DO PRODUTO 2
$mostrar_lance = $conn->prepare("SELECT * FROM produto WHERE idproduto = 2");
$mostrar_lance->execute();

$p1 = $mostrar_lance->fetchAll(PDO::FETCH_OBJ);
foreach($p1 as $lista1){
    $_SESSION['p2'] = $lista1->lance;    
}

// MOSTRAR LANCE DO PRODUTO 3
$mostrar_lance = $conn->prepare("SELECT * FROM produto WHERE idproduto = 3");
$mostrar_lance->execute();

$p1 = $mostrar_lance->fetchAll(PDO::FETCH_OBJ);
foreach($p1 as $lista1){
    $_SESSION['p3'] = $lista1->lance;    
}

$mostrar_lance = $conn->prepare("SELECT * FROM produto WHERE idproduto = 4");
$mostrar_lance->execute();

$p1 = $mostrar_lance->fetchAll(PDO::FETCH_OBJ);
foreach($p1 as $lista1){
    $_SESSION['p4'] = $lista1->lance;    
}

$mostrar_lance = $conn->prepare("SELECT * FROM produto WHERE idproduto = 5");
$mostrar_lance->execute();

$p1 = $mostrar_lance->fetchAll(PDO::FETCH_OBJ);
foreach($p1 as $lista1){
    $_SESSION['p5'] = $lista1->lance;    
}

$mostrar_lance = $conn->prepare("SELECT * FROM produto WHERE idproduto = 6");
$mostrar_lance->execute();

$p1 = $mostrar_lance->fetchAll(PDO::FETCH_OBJ);
foreach($p1 as $lista1){
    $_SESSION['p6'] = $lista1->lance;    
}




?>