<?php

require "../system/config.php";

if(isset($_POST['btn-lance'])){
    $lance = $_POST['lance'];
}

$consulta=$conn->prepare("SELECT * FROM produtos WHERE lance =:lance "); 
$consulta->bindValue(":lance", $lance); 






?>