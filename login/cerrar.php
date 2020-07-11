<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		$_SESSION['usuario']=null;
		session_destroy();
		header("Location:../index.php");		
	}else{
				header("Location:ingresar.php");

	}
?>