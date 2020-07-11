<?php
    session_start();
    $sesion = $_SESSION['usuario'];
    $email = $_SESSION['email'];

	if ($sesion == null || $sesion == '') {
		header("Location:../../login/ingresar.php");
    }

    $propuesta = $_POST['propuesta'];
    $solicitud = $_GET['cl'];
    $estado_noticia = 1;


    require_once("../../login/CRUD/class/Consultas.php");
    $usuarios = Usuarios::singleton();                
    $data = $usuarios->Read_a_datos_proveedor($email);	
    if(count($data)){
        foreach ($data as $fila) {
            $nombreProveedor=$fila['nombre'];
            $empresa=$fila['empresa'];
            $telefono = $fila['telefono'];
            $cargo=$fila['cargo'];
            $estado=$fila['estado'];
            $calle = $fila['calle'];
            $cp=$fila['cp'];
            $acerca_de=$fila['acerca_de'];
            $site=$fila['sitioweb'];
            $logo=$fila['logo'];
        }
    }

    $data = $usuarios->get_interese();	
        if(count($data)){
            foreach ($data as $fila) {
                if($fila['id'] == $solicitud){
                    $id_interes = $fila['id'];
                    $nombre_Cliente=$fila['nombre'];
                    $descripcion=$fila['descripcion'];
                    $servicio = $fila['servicio'];
                    $email_Cliente = $fila['email'];
                    break;
                }
                 
            }
        }
    $data = $usuarios->Insertar_notificacion($nombre_Cliente, $email_Cliente, $nombreProveedor, $email, $propuesta, $id_interes, $estado_noticia);
    header("Location:masinfo.php?cl=$id_interes");
?>
