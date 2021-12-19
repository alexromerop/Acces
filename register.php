<?php




session_start();

require("config.php");
require("template.php");


	$content = <<<EOD
<form method="post" action="insert.php">
<h2>¡Identifícate!</h2>

<p><label for="register-user">Usuario:</label> <input type="text" name="user" id="register-user"/></p>
<p><label for="register-pass">Password:</label> <input type="password" name="pass" id="register-pass"/></p>
<p><label for="register-repass">Repassword:</label> <input type="password" name="repass" id="register-repass"/></p>
<p><label for="register-name">Nombre:</label> <input type="text" name="name" id="register-name"/></p>
<p><label for="register-surname">Surname:</label> <input type="text" name="surname" id="register-surname"/></p>
<p><label for="register-email">email:</label> <input type="email" name="email" id="register-email"/></p>
<p><label for="register-birthdate">Birthdate:</label> <input type="date" name="birthdate" id="register-birthdate"/></p>

<p><input type="submit" id="register-submit" value="Login" /></p>
</form>

EOD;



showHeader("ENTIenda: REGISTER");

showContent($content);

showFooter();

?>
