<?php 	
	session_start();
    $sesion = $_SESSION['usuario'];
    $email = $_SESSION['email'];
    $rol = $_SESSION['rol'];

	if ($sesion == null || $sesion == '' || $rol != 'cliente')  {
		header("Location:../../login/ingresar.php");
    }

    if(isset($_GET['id'])){
        $detalle_solicitud = $_GET['id'];
    }else{
        Echo "Esta solicitud no existe";
        return;
    }

    
    require_once("../../login/CRUD/class/Consultas.php");
    $usuarios = Usuarios::singleton();
    $data = $usuarios->Lee_ContratoExistente($detalle_solicitud);
        if(count($data)){
            foreach ($data as $fila) {
                $id_contrato=$fila['id'];
                $id_p=$fila['id_proveedor'];
            }
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap4.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap4.5/css/estilos.css">
    <title>Detalles solicitud</title>
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
                    <!--<li class="nav.item"><a class="nav-link" href="#">
                        Notificaciones
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"/>
    <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
    </svg>
                        </a></li>-->
                    
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
        $usuarios1 = Usuarios::singleton(); 
        $cuenta_solicitudes = $usuarios1->Cuenta_Solicitudes($detalle_solicitud);	
        $numedoDeSolicitudes = 0;
        if(count($cuenta_solicitudes)){
            foreach ($cuenta_solicitudes as $fila) {
                        $numedoDeSolicitudes = $fila['count(*)'];
                   }
        }

        if($numedoDeSolicitudes == 0){
            ?>
            <div class="container">
                <div class="alert alert-secondary">
                    <strong>Aun no tienes propuestas</strong>
                </div>
            </div>
            <?php
            return;
        }
    ?>

    
    <?php
        
        $data = $usuarios->detalle_notificacion($detalle_solicitud);
            if(count($data)){
                foreach ($data as $fila) {
                               $email_proveedor=$fila['email_proveedor'];
                               $propuesta = $fila['propuesta'];
                               $data2 = $usuarios->Read_a_datos_proveedor($email_proveedor);
                               if(count($data2)){
                                foreach ($data2 as $fila2) {
                                    $id_proveedor=$fila2['id'];
                                    $nombre=$fila2['nombre'];
                                    $empresa=$fila2['empresa'];
                                    $telefono = $fila2['telefono'];
                                    $cargo=$fila2['cargo'];
                                    $estado=$fila2['estado'];
                                    $calle = $fila2['calle'];
                                    $cp=$fila2['cp'];
                                    $acerca_de=$fila2['acerca_de'];
                                    $site=$fila2['sitioweb'];
                                    $logo=$fila2['logo'];

                                    ?>
                        <section class="container contenedor-propuesta mt-5" >
                            <div class="container masinfo pb-5">
                                <div class="estado_propues">
                                    <h4><?php echo $empresa;?></h4>
                                </div>
                                <div class="info-cliente">
                                    <div class="info-cliente-des">
                                        <h6>Oferta</h6>
                                        <p><?php echo $propuesta; ?></p>
                                    </div>
                                    <div class="info-cliente-servicio">
                                        <h6>Empresa: <?php echo $empresa;?></h6>
                                        
                                    </div>
                                    <div class="info-cliente-ofrece">
                                        
                                        <h6>Datos de contacto</h6>
                                        <h6>Número: <span><?php echo $telefono;?></span></h6>
                                        <h6>Email: <span><?php echo $email_proveedor;?></span></h6>
                                        <h6>Sitio web oficial: <span><a href=" <?php echo $site;?>">Te llevamos</a></span></h6>
                                        <br>
                                        <h6>Que te parecio la propuesta de <?php echo $nombre;?></h6>
                                    </div>
                                </div>
                                <div class="contacto-cliente mb-5">
                                    <div class="contacto-cliente-datos">
                                            <h6>Proveedor: <?php echo $nombre;?></h6>
                                    </div>
                                    <div class="contacto-cliente-boton">
                                        <a href="contrato.php?idp=<?php echo $id_proveedor;?>&ids=<?php echo $detalle_solicitud;?>" >Aceptar</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                          
                                    <?php
                                }
                            }

                }
            }

    ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>