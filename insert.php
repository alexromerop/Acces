<?php


if(!isset($_POST["user"]) || !isset($_POST["pass"])|| !isset($_POST["repass"]) ||
 !isset($_POST["name"]) || !isset($_POST["surname"])|| !isset($_POST["email"])||!isset($_POST["birthdate"])) {
 
 echo "ERROR 1: faltan campos por rellenar";

 exit();
 }


 $user = trim($_POST["user"]);
 if(strlen($user) <= 2){
 echo "ERROR 2: Usuario no cumple los requisitos";
 exit();
 }

 $pass = trim($_POST["pass"]);
 if(strlen($pass) <= 3){
 echo "ERROR 3: Contraseña no cumple los requisitos";
 exit();
 }

 $repass = trim($_POST["repass"]);

 if($pass != $repass){
 echo "ERROR 4: Las contraseñas no són iguales";
 exit();
 }

 $name = trim($_POST["name"]);

 $surname = trim($_POST["surname"]);

 $email = trim($_POST["email"]);

 $tmp = addslashes($user);

$birthdate = trim($_POST["birthdate"]);

 if(strlen($tmp) != strlen($user)){
 echo "ERROR 5: Error verificación usuario";
 exit();
 }

 $user = $tmp;
 $tmp = addslashes($pass);

 if(strlen($tmp) != strlen($pass)){
 echo "ERROR 6: Error verificacion contraseña";
 }

 $pass = md5($tmp);
 $tmp = addslashes($name);

 if(strlen($tmp) != strlen($name)){
 echo "ERROR 7: No conciden el nombre";
 }

 $name = $tmp;
 $tmp = addslashes($surname);

 if(strlen($tmp) != strlen($surname)){
 echo "ERROR 8: No conciden los apellidos";
 }

 $surname = $tmp;

 $query = <<<EOD

 INSERT INTO users (user, password, email, name, surname, birthdate)
 VALUES ('{$user}','{$pass}','{$email}','{$name}','{$surname}','{$birthdate}');

 EOD;

 require("config.php");

 $conn = mysqli_connect($db_server, $db_user, $db_pass, $db);

 if(!$conn){
 echo "ERROR 9: No se pudo conectar a la base de datos";
 exit();
 }

 $res = $conn->query($query);

 if(!$res){
 echo "ERROR 10: Query error";
 exit();
 }

 $query = <<<EOD
 SELECT * FROM users WHERE email='{$email}';
 EOD;

 $res = $conn->query($query);

 if(!$res){
 echo "ERROR 10: Query error";
 exit();
 }

 $user = $res->fetch_assoc();

 session_start();

 $_SESSION["id_user"] = $id_user;

header("Location: index.php");
exit();

 ?>
