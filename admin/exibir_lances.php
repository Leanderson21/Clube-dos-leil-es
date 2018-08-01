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



if( ! isset($_SESSION['logado']) && $_SESSION['logado'] != true ){

	header('Location: index.php?page=login');
}
if( isset($_GET['page']) && $_GET['page'] == 'logout' ){
	session_destroy();
	header('Location: ../login.php');
}
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hcode Store</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
  
    
    
    <!-- Bootstrap -->
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                    
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">moeda :</span><span class="value">BRL </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">BRL</a></li>
            
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">Bem vindo! <?php echo  $_SESSION['usuario']; ?> :</span><span class="value"> <?php $nome ?> </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                <li><a href="?page=logout" class="logout">SAIR</a></li>
                                
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="#"><img src="img/logo.png"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="saldo.php">Crédito : <span class="cart-amunt"><?php if(isset($_SESSION['valor'])){ echo $_SESSION['valor']; }else{echo 0;}?></span> <i class="fa fa-credit-card"></i> <span class="product-count"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li ><a href="index.php">Inicio</a></li>
                        <li><a href="produtos.php">Itens</a></li>
                        <li><a href="exibir_lances.php">Meus Lances</a></li>
                        <li><a href="mydados.php">Meus Dados</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
   <!-- --------------------------------------------------------------------------- -->
   <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">

<!--   -->

                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>        
                                            <th class="product-quantity">Meus lances</th> 
                                        </tr>
                                    </thead>
                                    <tbody>           
                                        <td class="actions" colspan="6">
                                              <?php  foreach($mostra2 as $linha2){
                                             $n = $linha2->nome;
                                             $n2 = $linha2->descricao;
                                             $n3 = $linha2->lance;
                                             echo "Item: " .$n."</br>". "Descrição:".$n2."</br>"."</br>Lance: ".$n3;
                                             echo "</br>Prazo do Item : 72h";
                                             ?>  
                                            <tr>
                                            <td class="actions" colspan="6">
                                            <?php } ?>    
                                            </div>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>




   <!-- ---------------------------------------------------------------------------- -->
		
  
    
     <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="img/brand1.png" alt="">
                            <img src="img/brand2.png" alt="">
                            <img src="img/brand3.png" alt="">
                            <img src="img/brand4.png" alt="">
                            <img src="img/brand5.png" alt="">
                            <img src="img/brand6.png" alt="">
                            <img src="img/brand1.png" alt="">
                            <img src="img/brand2.png" alt="">                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
        
  
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2018 SIXTECH Soluções em informática. <a href="http://www.hcode.com.br" target="_blank">clubedosleiloes.com.br</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.slider.js"></script>
    



  </body>
</html>

