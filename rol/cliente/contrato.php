<?php
	session_start();
    $sesion = $_SESSION['usuario'];
    $email = $_SESSION['email'];
    $rol = $_SESSION['rol'];

	if ($sesion == null || $sesion == '' || $rol != 'cliente')  {
		header("Location:../../login/ingresar.php");
    }

    $id_proveedor = $_GET['idp'];
    $id_solicitud = $_GET['ids'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap4.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap4.5/css/estilos.css">
    <title>Contrato</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a href="#" class="navbar-brand">
            <!--<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lightning-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
            </svg>-->
            Energy Solutions</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#second-navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse" id="second-navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav.item"><a class="nav-link" href="cliente.php?op=0">Panel</a></li>
                    <li class="nav.item"><a class="nav-link" href="solicitudes.php">Solicitudes</a></li>
                    <li class="nav.item"><a class="nav-link" href="#">
                        Notificaciones
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"/>
    <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
    </svg>
                        </a></li>
                    
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <?php echo $sesion ?>
                        </a>
                        <div class="dropdown-menu">
                            <a href="perfilc.php" class="dropdown-item">Perfil</a> 
                            <a href="configc.php" class="dropdown-item">Configuraciòn</a>
                            <a href="../../login/cerrar.php" class="dropdown-item">Salir</a>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <?php
        require_once("../../login/CRUD/class/Consultas.php");
        $usuarios = Usuarios::singleton();    

        $data = $usuarios->Read_a_datos_cliente($email);	
        if(count($data)){
            foreach ($data as $fila) {
                $id_cliente=$fila['id'];
                $nom_cliente=$fila['nombre'];
                $dedicacion=$fila['dedicacion'];
                $telefono = $fila['telefono'];
                $estado=$fila['estado'];
                $calle = $fila['calle'];
                $cp=$fila['cp'];
                $acerca_de=$fila['acerca_de'];
                $facebook=$fila['facebook'];
                $foto_perfil=$fila['foto_perfil'];
            }
        }

        $data = $usuarios->Read_a_datos_proveedorById($id_proveedor);
        if(count($data)){
            foreach ($data as $fila) {
                $nombre_proveedor=$fila['nombre'];
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

        $data = $usuarios->Lee_Contrato($id_cliente, $id_proveedor);
        if(count($data)){
            foreach ($data as $fila) {
                $id_contrato=$fila['id'];
            }
        }

        if(isset($id_contrato)){
            #$data = $usuarios->Hacer_Contrato($nom_cliente, $id_cliente, $nombre_proveedor, $id_proveedor, $id_solicitud);              
        }else{
            $data = $usuarios->Hacer_Contrato($nom_cliente, $id_cliente, $nombre_proveedor, $id_proveedor, $id_solicitud);              

        }

        

        
        

        
    ?>
    
    <section class="mt-5 container contrato-final">
        <div class="contrato-official p-5">
            <div class="encabezado-contrato">
                <h5 class="tile-contrato">Felicidades!!! <?php echo $sesion?></h5>
            </div>
            <div class="cuerpo-contrato">
                <p>Has hecho un trato con: <span><?php echo $nombre_proveedor.' '.$cargo.' de '.$empresa;?></span></p>
                <p>En seguida nos contactaremos con <?php echo $nombre_proveedor; ?> para que trabaje en tu petición y se comunique contigo. Mantente pendiente a cualquir notificación.</p>
            </div>
        </div>
        <div class="proveedor-solicitado p-5">
            <div class="encabezado-datos-proveedor">
                <h5 class="title-datos">Datos de tu proveedor</h5>
            </div>
            <p>No olvides los datos de contacto de tu proveedor ya que por medio de estos se comunicara contigo.</p>
            <h6>Empresa: <span><?php if(isset($empresa)){echo $empresa;}else{echo "El proveedor no a añadido su empresa";} ?></span></h6>
            <h6>Nombre: <span><?php if(isset($nombre_proveedor)){echo $nombre_proveedor;}else{echo "El proveedor no añadido su nombre";}?></span></h6>
            <h6>Cargo: <span><?php if(isset($cargo)){echo $cargo;}else{echo "El proveedor no ha añadido su cargo dentro de la empresa";} ?></span></h6>
            <h6>Teléfono: <span><?php if(isset($telefono)){echo $telefono;}else{echo "El proveedor no ha añadido su número de telefono";} ?></span></h6>
            <h6>Dirección: <span><?php if(isset($calle)){echo $calle;}else{echo "";} if(isset($estado)){echo ', '.$estado;}else{echo "";}if(isset($cp)){echo ', '.$cp;}else{echo "";}?></span></h6>
            <h6>Sitio web official: <span><?php if(isset($site)){echo '<a href="'.$site.'">Te llevamos</a>';}else{echo "El proveedor aun no ha agregado su sitio";} ?></span></span></h6>
            
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>