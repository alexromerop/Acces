<?php
session_start();

if (!isset($_SESSION["id_user"])){
	echo "Es obligatorio identifiacarse!";
	exit();
}

if (intval($_SESSION["id_user"]) != 1){
	echo "No tienes permiso para estar aquí!";
	exit();
}

require("template.php");


$content = "";

$id_product = 0;
if (isset($_GET["id_product"]))
	$id_product = intval($_GET["id_product"]);

//Selector agafar dades desde la base de dades
require("config.php");

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db);

$query = <<<EOD
SELECT * FROM groups;
EOD;

$res = $conn->query($query);

$groups = "";
$engines = "";

while($prod = $res->fetch_assoc()){

$groups .= <<<EOD
	<option value="{$prod["id_group"]}">{$prod["´group´"]}</option>
EOD;
}

$query = <<<EOD
SELECT * FROM engines;
EOD;

$res = $conn->query($query);

while($prod = $res->fetch_assoc()){
$engines .= <<<EOD
<option value="{$prod["id_engine"]}">{$prod["engine"]}</option>
EOD;
}
//Final de agafar les dades per el selector



if ($id_product == 0){
	$content = <<<EOD
<form method="post" action="product_insert_req.php" id="product-form">
<h2>Inserción de nuevo producto</h2>
<p><label for="product">Product</label><input type="text" name="product" id="product" /></p>
<p><label for="description">Description</label><input type="text" name="description" id="description" /></p>
<p><label for="price">Price</label><input type="text" name="price" id="price" /></p>
<p><label for="reference">Reference</label><input type="text" name="reference" id="reference" /></p>
<p><label for="website">Website</label><input type="text" name="website" id="website" /></p>


<p>Groups</p>
<select name="id_group">{$groups}</select>
<p>Engines</p>
<select name="id_engine_version">{$engines}</select>



<p><input type="submit" /></p>

<p><a href="groups.php">Insertar grupo</a></p>
</form>
EOD;
}
else{
	require("config.php");

	$conn = mysqli_connect($db_server, $db_user, $db_pass, $db);
	
	$query = <<<EOD
SELECT * FROM products WHERE id_product={$id_product};
EOD;

	$res = $conn->query($query);

	if (!$res){
		echo "Error: Producto erróneo";
		exit();
	}

	if ($res->num_rows != 1){
		echo "Error: Producto no existe";
		exit();
	}

	$prod = $res->fetch_assoc();

	$content = <<<EOD
<form method="post" action="product_update_req.php" id="product-form">

<input type="hidden" name="id_product" value="{$prod["id_product"]}" />

<h2>Actualización producto</h2>
<p><label for="product">Product</label>
	<input type="text" name="product" id="product" value="{$prod["product"]}" /></p>
<p><label for="description">Description</label><input type="text" name="description" id="description"  value="{$prod["description"]}" /></p>
<p><label for="price">Price</label><input type="text" name="price" id="price"  value="{$prod["price"]}" /></p>
<p><label for="reference">Reference</label><input type="text" name="reference" id="reference"  value="{$prod["reference"]}" /></p>
<p><label for="website">Website</label><input type="text" name="website" id="website"  value="{$prod["website"]}" /></p>


<p>Groups</p>
<select name="id_group">{$groups}</select>
<p>Engines</p>
<select name="id_engine_version">{$engines}</select>


<p><input type="submit" /></p>
</form>




EOD;



}


showHeader("ENTIenda ADMIN");
showContent($content);
showFooter();




?>

