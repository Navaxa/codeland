<?php
	require_once("../crud-blog/Consultas.php");
	$usuarios = Usuarios::singleton();
	$bandera = 0;

	if(isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['pass'])){
		$nombre = $_POST['nombre'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$data = $usuarios->insertar_usuario_escritor($nombre, $email, $pass);	
		$bandera = 1;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/estilos_escritor.css">
	<title>Regitro</title>
</head>
<body>
<?php
	if($bandera == 1){
		?>
		<div class="registro">
			<h1>Registro exitoso</h1>
			<a href="ingresar.php">Inicia sesion</a>
		</div>
		<?php
	}else{
		?>
		<div class="registro">
			<h1>No se pudo registrar intente mas tarde</h1>
			<a href="login.php">Regresar</a>
		</div>
		<?php
	}
?>
	
</body>
</html>