<?php
	$var = "";
	if(isset($_GET["op"])){
		$var = $_GET["op"];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ingresar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="../css/themify-icons.css">
</head>
<body>
	<form action="validar.php" method="POST">
		<h2>Ahorro <span>Energético</span></h2>
		<input class="cajon" type="Email" placeholder="Email" name="email">
		<input class="cajon" type="password" placeholder="Contraseña" name="pass">
		<!--<input type="checkbox" name="acept"> <label for="acept">Recordar contraseña</label>-->

		<?php
			if ($var != ""){
			echo '<span id="sestado" class="marcar">Datos no validos</span>';
			}
		?>
		<button id="registro">iniciar sesion</button>
		<!--<button id="gmail"><i class="ti-google"></i> Ingresar con Gmail</button>-->
		<hr>
		<p><a href="recuperacion.html">olvide mi contraseña</a></p>
		<p>¿Aun no tienes una cuenta? <a href="login.php">Regístrate</a></p>
	</form>
</body>
</html>