<?php
	require_once("CRUD/class/Consultas.php");
	$usuarios = Usuarios::singleton();

	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$rol = $_POST['rol'];
	#$seleccion = $_POST['seleccion'];
	#$pass = hash('sha512', $pass); para encryptar la contraseña

	$data = $usuarios->Comprueba_email($email);	
	if(count($data)){
		foreach ($data as $fila) {
			$emailC=$fila['email'];
		}
	}
	if(isset($emailC)){
		return header("Location:login.php?op=1");
	}else

	$data = $usuarios->Insertar($nombre, $email, $pass, $rol);	
	if($rol == "proveedor"){
		$data = $usuarios->Insertar_a_datos_proveedor($nombre, $email);
	}else{

	}
	header("Location:ingresar.php");
?>
