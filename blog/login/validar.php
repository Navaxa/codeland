<?php
	require_once("../crud-blog/Consultas.php");
	$usuarios = Usuarios::singleton();

	$bandera = 0;
	if(isset($_POST['email']) && isset($_POST['pass'])){
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$bandera = 1;
	}else{
		echo "no ha colocado datos";
		return;
	}


	$data = $usuarios->get_escritor($email, $pass);	
	if(count($data)){
		foreach ($data as $fila) {
			if(isset($fila['id']) && isset($fila['nombre'])){
				$id =$fila['id'];
				$nombre = $fila['nombre'];
				$bandera = 1;
			}
			
			
		}
	}

	if($bandera == 1){
		session_start();
		$_SESSION['usuario'] = $nombre;
		$_SESSION['id'] = $id;
		header("Location:../cms/panel.php");
	}else{
		echo  "El correo no existe en la db";
	}

	  
?>