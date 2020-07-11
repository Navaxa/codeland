<?php
	require_once("CRUD/class/Consultas.php");
	$usuarios = Usuarios::singleton();

	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$data = $usuarios->get_Usuario($email, $pass);	
	if(count($data)){
		foreach ($data as $fila) {
	        $email =$fila['email'];
			$rol=$fila['rol'];
			$nombre = $fila['nombre'];
	    }
	    session_start();
		$_SESSION['usuario'] = $nombre;
		$_SESSION['email'] = $email;
		$_SESSION['rol'] = $rol;
	    if ($rol == "cliente"){
	    	header("Location:../rol/cliente/cliente.php?op=0");
	    }else if ($rol == "proveedor") {
	    	header("Location:../rol/proveedor/proveedor.php");
	    }else if($rol == "usuario por definirse"){
	    	header("Location:../principal/trabajos/empleo_menor.php");
	    }
		
	}else{
		header("Location:ingresar.php?op=1");
	}
?>