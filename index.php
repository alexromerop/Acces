<?php




session_start();

require("config.php");
require("template.php");

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db);

if (!isset($_SESSION["id_user"])){
	$content = <<<EOD
<form method="post" action="login_req.php">
<h2>¡Identifícate!</h2>

<p><label for="login-user">Usuario:</label> <input type="text" name="user" id="login-user"/></p>
<p><label for="login-pass">Password:</label> <input type="password" name="pass" id="login-pass"/></p>

<p><input type="submit" id="login-submit" value="Login" /></p>
</form>

EOD;
}
else{

	$query = "SELECT * FROM users WHERE id_user=".$_SESSION["id_user"];

	$res = $conn->query($query);
	$user = $res->fetch_assoc();

	$content = "Bienvenido/a ".$user["user"];
}


showHeader("ENTIenda: HOME");

showContent($content);

showFooter();

?>
