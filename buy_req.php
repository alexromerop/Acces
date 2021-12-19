<?php

if (!isset($_POST["id_producto"])){
	echo "Error: no hay producto";
	exit();
	}

session_start();



if(!isset($_SESSION["id_user"])){
if ($id_product == 0 ){
$id_product = intval($_POST["id_product"]);
  echo "Error: No hay usuario";
  exit();
    
	}
}


require("config.php");

$query = <<<EOD
INSERT INTO users_products ( id_user, id_product),
VALUES ({$_SESSION["id_user"]},{$id_product});
EOD;


$res = $conn->query($query);

if (!$res){
	echo "Error al insertar producto";
	exit();
}


header("Location: shop.php?id_prodcut=".id_product);
exit();
?>
