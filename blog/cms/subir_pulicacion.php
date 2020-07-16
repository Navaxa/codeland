<?php
    session_start();
    $sesion = $_SESSION['usuario'];
    $id_escritor = $_SESSION['id'];
    if ($sesion == null || $sesion == '') {
        header("Location:../login/ingresar.php");
    }

    $title = $_POST['title'];
    $contenido = $_POST['contenido'];
    $etiqueta = $_POST['etiqueta'];
    $nombre_imagen = $_FILES['img']['name'];
    $tipo_imagen = $_FILES['img']['type'];
    $tamagno_imagen = $_FILES['img']['size'];
    $bandera=0 ;
    if($tamagno_imagen <= 1000000){
        if($tipo_imagen == "image/jpd" || $tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png"){

            $directorio = $_SERVER['DOCUMENT_ROOT'].'/projects/ahorroEnergetico/blog/cms/img-post/';
            move_uploaded_file($_FILES['img']['tmp_name'], $directorio.$nombre_imagen);
            require_once("../crud-blog/Consultas.php");
	        $usuarios = Usuarios::singleton();
            $data = $usuarios->Insertar_post($title, $contenido, $nombre_imagen, $etiqueta, $id_escritor);
            $bandera= 1;

        }else{
            echo "Este archivo no es una imagen";
        }
    }else{
        echo "Tamaño grande";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../login/css/estilos_escritor.css">
	<title>Regitro</title>
</head>
<body>
<?php
	if($bandera == 1){
		?>
		<div class="registro">
			<h1>Se subio tu post</h1>
			<a href="panel.php">Regresar al panel</a>
		</div>
		<?php
	}else{
		?>
		<div class="registro">
			<h1>No se pudo registrar intente mas tarde</h1>
			<a href="panel.php">Regresar</a>
		</div>
		<?php
	}
?>
	
</body>
</html>