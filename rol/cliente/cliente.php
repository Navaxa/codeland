<?php 	
	session_start();
    $sesion = $_SESSION['usuario'];
    $email = $_SESSION['email'];
    $rol = $_SESSION['rol'];

	if ($sesion == null || $sesion == '' || $rol != 'cliente')  {
		header("Location:../../login/ingresar.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap4.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap4.5/css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Bienvenido</title>
    <script type="text/javascript">
        function esconder(){
            var restringir = document.getElementById("restrinccion");
            var formulario = document.getElementById("boton");
            restringir.style.visibility = "visible";
            formulario.style.cursor = "not-allowed";
            formulario.disabled = true;
        }
    </script>
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
                    <li class="nav.item activo"><a class="nav-link" href="#">Panel</a></li>
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


    <section style="background: #ededf4; text-align: center;" class="p-5">
        <div class="container">
            <h1>Panel</h1>
            <p></p>
        </div>
    </section>

    <div class="container mt-3" id="restrinccion">
        <div class="alert alert-secondary">
            <strong><span>Si quieres solicitar un servicio debes ingresar tus datos de cliente en el apartado de <a href="configc.php">configuraciones</a></span></strong>
        </div>
    </div>

    <section class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-5">
                <div class="col-lg-12 col-md-12 box">
                    <div class="row">
                    <a class="col-lg-12 col-md-4 menu" href="?op=0">Solicitar servicios</a>
                    <a class="col-lg-12 col-md-4 menu" href="?op=1">Proveedores</a>
                    <!--<a class="col-lg-12 col-md-4 menu" href="?op=2">Ofertas</a>-->
                    </div>
                </div>
            </div>


            <div class="col-lg-8 col-md-12">
                <div class="col-lg-12 col-md-12 box-derecha">
                    <div class="row">
            <?php
                
                $suceso = $_GET['op'];
                if($suceso == 1){
                    require_once("../../login/CRUD/class/Consultas.php");
                    $usuarios = Usuarios::singleton();                
                    $data = $usuarios->Read_proveedores();	
                    if(count($data)){
                        foreach ($data as $fila) {
                            $nombre=$fila['nombre'];
                            $empresa=$fila['empresa'];
                            $telefono = $fila['telefono'];
                            $cargo=$fila['cargo'];
                            $estado=$fila['estado'];
                            $calle = $fila['calle'];
                            $cp=$fila['cp'];
                            $acerca_de=$fila['acerca_de'];
                            $site=$fila['sitioweb'];
                            $logo=$fila['logo'];


                                echo '<div class="proveedor col-lg-3 col-md-12">
                                <div class="row">
                                    <div class="proveedor-logo col-lg-12 col-xs-2" >
                                    <img src="../img_logos/'.$logo.'" alt="" width=100px
                                    height=100px>
                                    </div>
                                    <div class="proveedor-des col-lg-12 col-xs-2">
                                        <div class="nom-empresa">
                                        <h5>'.$empresa.'</h5>
                                        </div>
                                        <div class="nom-proveedor">
                                            <h5>'.$nombre.'</h5>
                                        </div>
                                        <div class="direccion">
                                            <h6>'.$calle.','.' '.$estado.', '.$cp.'</h6>
                                        </div>
                                        <div class="proveedor-des-web">
                                            <h6><a href='.$site.'>sitio Web</a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                                
                        }
                    }
                }else if($suceso == 0){ 
                    ?>
                            <form action="solicitud-servicio.php" class="solicitud" method="POST" >
                                <div class="servicios-solicitud">
                                    <h5>Servicio:</h5>
                                    <input type="text" placeholder="ejemplo: (Instalación de paneles solares)" name="servicio" required>
                                </div>
                                <div class="descripcion-solicitud">
                                    <h5>Descripción de servicio:</h5>
                                    <textarea name="descripcion-servicio" required></textarea>
                                </div>
                                <button class="boton-solicitud" id="boton">Enviar</button>
                            </form>
                    <?php
                }
            

            ?>

                    </div>
                </div>
            </div>
            
        </div>

    </section>

    <?php
    require_once("../../login/CRUD/class/Consultas.php");
        $usuarios = Usuarios::singleton();                
        $data = $usuarios-> Read_a_datos_cliente($email);	
        if(count($data)){
            foreach ($data as $fila) {
                $id = $fila['id'];
            }
        }
        if(!isset($id)){
            echo '<script type="text/javascript">
            esconder();
        </script>';
        }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>