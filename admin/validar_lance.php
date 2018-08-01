<?php
require "../system/config.php";
include("../valida_login.php");



  
// Condição para buscar o usuario logado na sessão.
$echo =  $_SESSION['usuario']; 
$selectlance = $conn->prepare("SELECT * from usuarios where usuario ='$echo'");
$selectlance->execute();
$linha = $selectlance->fetchAll(PDO::FETCH_OBJ);
foreach($linha as $lista){
$l2 = $lista->idusuarios;
}

$forma = 0;
// condição para adicionar o id do usuario no produto selecionado
if    (isset($_POST['btn-lance1'])){
      $produto1 = $conn->prepare("UPDATE produto SET usuarios_idusuarios = '$l2' WHERE idproduto = 1");
      $produto1->execute();
      $_SESSION['uma'] = $forma+1; 
      header("location:lance.php");          
      }else if(isset($_POST['btn-lance2'])){
      $produto2 = $conn->prepare("UPDATE produto SET usuarios_idusuarios = '$l2' WHERE idproduto = 2");
      $produto2->execute();
      $_SESSION['uma'] = $forma+2;
      header("location:lance.php");
      }else if(isset($_POST['btn-lance3'])){   
      $produto3 = $conn->prepare("UPDATE produto SET usuarios_idusuarios ='$l2' WHERE idproduto = 3");
      $produto3->execute();
      header("location:lance.php");
      $_SESSION['uma'] = $forma+3;               
     }else if(isset($_POST['btn-lance4'])){   
      $produto3 = $conn->prepare("UPDATE produto SET usuarios_idusuarios ='$l2' WHERE idproduto = 4");
      $produto3->execute();
      header("location:lance.php");
      $_SESSION['uma'] = $forma+4;
      }else if(isset($_POST['btn-lance5'])){   
      $produto3 = $conn->prepare("UPDATE produto SET usuarios_idusuarios ='$l2' WHERE idproduto = 5");
      $produto3->execute();
      header("location:lance.php");
      $_SESSION['uma'] = $forma+5;
      }else if(isset($_POST['btn-lance6'])){   
      $produto3 = $conn->prepare("UPDATE produto SET usuarios_idusuarios ='$l2' WHERE idproduto = 6");
      $produto3->execute();
      header("location:lance.php");
      $_SESSION['uma'] = $forma+6;    
}
$t1 = $_SESSION['uma'];





















?>