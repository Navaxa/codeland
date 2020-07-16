<?php
    session_start();
    $sesion = $_SESSION['usuario'];
    $email = $_SESSION['email'];

	if ($sesion == null || $sesion == '') {
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
    <title>Negociar</title>

    <script type="text/javascript">
        function habilitar(){
            var boton = document.getElementById("boton-aplicar");
            var textarea = document.getElementById("text-area");
            var oferta = document.getElementById("cotizacion");
                    boton.disabled = true;
                    textarea.disabled = true;
                    oferta.disabled = true;
                    boton.innerHTML="Has aplicado";
        }
        function esconder(){
            var restringir = document.getElementById("restrinccion");
            restringir.style.visibility = "visible";
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
                    <li class="nav.item"><a class="nav-link" href="proveedor.php">Tablero</a></li>
                    <li class="nav.item"><a class="nav-link" href="clientes.php">Mis clientes</a></li>
                    <!--<li class="nav.item"><a class="nav-link" href="#">
                        Notificaciones
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"/>
    <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
    </svg>-->
                        </a></li>
                    
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <?php echo $sesion ?>
                        </a>
                        <div class="dropdown-menu">
                            <a href="perfil.php" class="dropdown-item">Perfil</a> 
                            <a href="config.php" class="dropdown-item">Configuraciòn</a>
                            <a href="../../login/cerrar.php" class="dropdown-item">Salir</a>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-3" id="restrinccion">
        <div class="alert alert-secondary">
            <strong><span>Si quieres negociar debes ingresar tus datos de proveedores en el apartado de <a href="config.php">configuraciones</a></span></strong>
        </div>
    </div>
    <?php
    require_once("../../login/CRUD/class/Consultas.php");
    $usuarios = Usuarios::singleton(); 
        $solicitud = $_GET['cl'];           
        $data = $usuarios->get_interese();	
        if(count($data)){
            foreach ($data as $fila) {
                if($fila['id'] == $solicitud){
                    $id_Cliente = $fila['id'];
                    $nombre=$fila['nombre'];
                    $descripcion=$fila['descripcion'];
                    $servicio = $fila['servicio'];
                    $email_Cliente = $fila['email'];
                    break;
                }
                 
            }
        }
    ?>

    <section class="p-4 container">
        <div class="container masinfo pb-5">
            <div class="estado_propues">
                <h4>Propuesta abierta</h4>
            </div>
            <div class="info-cliente">
                <div class="info-cliente-des">
                    <h6>Descripción</h6>
                    <p><?php echo $descripcion;?></p>
                </div>
                <div class="info-cliente-servicio">
                    <h6>Servicio</h6>
                    <p><?php echo $servicio;?></p>
                </div>
                <div class="info-cliente-ofrece">
                    <h6>Hasle una propuesta a <?php echo $nombre;?></h5>
                    <form action="aplicar.php?cl=<?php echo $id_Cliente;?>" method="POST">
                        <textarea name="propuesta" method="POST" required id="text-area"></textarea>
                        <h6>Cotización en $MXN: </h6><input type="number" id="cotizacion" required  placeholder="$MXN" name="oferta">
                </div>
            </div>
            <div class="contacto-cliente mb-5">
                <div class="contacto-cliente-datos">
                        <h6>Cliente: <?php echo $nombre;?></h6>
                </div>
                <div class="contacto-cliente-boton">
                    <button id="boton-aplicar">Aplicar</button>
                    </form>
                </div>
            </div>
            <?php 
                $estado = 0;
                $data = $usuarios->Lee_notificacion($email_Cliente, $email, $id_Cliente);	
                if(count($data)){
                    foreach ($data as $fila) {
                        $estado = $fila['estado_notificacion'];
                    }
                }
                if($estado == 1){
                    ?>
                        <div class="solicitud-aplicada">
                            <h4>Ya has aplicado esta solicitud, espera su respuesta.</h4>
                        </div>
                        <script type="text/javascript">
                            habilitar();
                        </script>
                    <?php
                }
            ?>
        </div>
    </section>    
    
    <?php
        
        $usuarios = Usuarios::singleton();                
        $data = $usuarios->Read_a_datos_proveedor($email);	
        if(count($data)){
            foreach ($data as $fila) {
                $id = $fila['id'];
                 
            }
        }
        if(!isset($id)){
            echo '<script type="text/javascript">
            habilitar();
            esconder();
        </script>';
        }

    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>