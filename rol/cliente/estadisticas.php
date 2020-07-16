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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <title>Estadisticas</title>
    
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
    $usuarios = Usuarios::singleton();

    $data = $usuarios->detalle_notificacion($id_solicitud);
            if(count($data)){
                foreach ($data as $fila) {
                               $propuesta = $fila['propuesta'];
                               $oferta=$fila['oferta'];
                }
            }
    ?>
    <script language="JavaScript" type="text/javascript">
        function promediar(){
            var rec1 = document.getElementById("dato1").value;
            var rec2 = document.getElementById("dato2").value;
            var rec3 = document.getElementById("dato3").value;
            var span = document.getElementById("span");
            var res = (parseFloat(rec1) + parseFloat(rec2) + parseFloat(rec3))/3;
            span.innerHTML = (res);
        }
    </script>
    
    <section class="container mt-5">
        <form action="graficar.php?ids=<?php echo $id_solicitud;?>&idp=<?php echo $id_proveedor;?>" method="POST">
            <h6>Ingresa la cantidad que has pagado de los ultimos 3 recibos de luz.</h6>
            <input type="number" id="dato1" name="r1" placeholder="Recibo 1" required onKeyUp="promediar()" min="0" value=0><br>
            <input type="number" id="dato2" name="r2" placeholder="Recibo 2" required onKeyUp="promediar()" min="0" value=0><br>
            <input type="number" id="dato3" name="r3" placeholder="Recibo 3" required onKeyUp="promediar()" min="0" value=0><br>
            <span id="span" name="promedio"></span><br>
            <button>Graficar</button>
        </form>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>