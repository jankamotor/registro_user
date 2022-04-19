<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
    $cedula   = stripslashes($_REQUEST['cedula']);
    $cedula = mysqli_real_escape_string($con,$cedula);
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
    $fecha_nacimiento   = stripslashes($_REQUEST['fecha_nacimiento']);
    $fecha_nacimiento = mysqli_real_escape_string($con,$fecha_nacimiento);
    $telefono   = stripslashes($_REQUEST['telefono']);
    $telefono = mysqli_real_escape_string($con,$telefono);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
    $direccion   = stripslashes($_REQUEST['direccion']);
    $direccion = mysqli_real_escape_string($con,$direccion);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (cedula, username,fecha_nacimiento, telefono, email, direccion, password, trn_date)
VALUES ('$cedula', '$username', '$fecha_nacimiento', '$telefono', '$email', '$direccion', '".md5($password)."', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="cedula" placeholder="Cedula" required />
<input type="text" name="username" placeholder="Nombre" required />
<input type="text" name="fecha_nacimiento" placeholder="Fecha Nacimiento" required />
<input type="text" name="telefono" placeholder="Telefono" required />
<input type="email" name="email" placeholder="Email" required />
<input type="text" name="direccion" placeholder="Direccion" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>