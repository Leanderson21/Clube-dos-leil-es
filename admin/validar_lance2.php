<?php
require "../system/config.php";
include("validar_lance.php");
include("validar_saldo.php");

$lance = $_POST['lance'];
$_SESSION['lance'] = $lance;

// se o botão da pagina do lance existir ele executa o if
if (isset($_POST['submit'])){

    // variavel que diminui o lance do saldo no banco
    $te = $_SESSION['valor'] - $_SESSION['lance'];

    // atualizar o saldo no banco
    $buscasaldo3 = $conn->prepare("UPDATE usuarios SET saldo=:saldo3 WHERE idusuarios = '$l2' ");
    $buscasaldo3->bindValue(":saldo3", $te);

    // selecionar o lance do produto clicado
    $selecionar_saldo = $conn->prepare("SELECT * FROM produto WHERE usuarios_idusuarios = '$l2' AND idproduto = '$t1'");
    $selecionar_saldo->execute();
    $linha3 = $selecionar_saldo-> fetchAll(PDO::FETCH_OBJ);
    foreach($linha3 as $lista){
       $_SESSION['lance2'] = $lista->lance; 
    }

    // atualizar o lance do produto clicado
    $inserir_lance1 = $conn->prepare("UPDATE produto SET lance=:lance WHERE usuarios_idusuarios = '$l2' AND idproduto = '$t1' ");
    $inserir_lance1->bindValue(":lance",$lance);
        if( $_SESSION['lance'] < $_SESSION['lance2'] ){
        header("location:erro_lance1.php");
        }    
        else if ($_SESSION['lance'] < $_SESSION['valor']){
            $buscasaldo3->execute();
            $inserir_lance1->execute();
            $_SESSION['valor'] = $te;         
            header("location:msg_lance.php");        
        }else{
            header("location:erro_lance2.php");
        }
        }


?>