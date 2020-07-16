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
require_once("../../login/CRUD/class/Consultas.php");
    $usuarios = Usuarios::singleton();    
    
    $data = $usuarios->Read_a_datos_proveedorById($id_proveedor);
    if(count($data)){
        foreach ($data as $fila) {
                       $email_proveedor=$fila['email'];
        }
    }

    $data = $usuarios->verificar($id_solicitud,$email_proveedor);
            if(count($data)){
                foreach ($data as $fila) {
                               $propuesta = $fila['propuesta'];
                               $oferta=$fila['oferta'];
                }
            }

$r1 = $_POST['r1'];
$r2 = $_POST['r2'];
$r3 = $_POST['r3'];
$promedio = ($r1+$r2+$r3)/3;
$promedio = $promedio/2;
#echo $promedio." Promedio <br>";
$aleatorio = rand(5,15);
#echo $aleatorio." aleatorio <br>";
$descuento = (100 - $aleatorio)/100;
#echo $descuento." descuento <br>";
$oferta_des = $oferta;
$oferta_des = $oferta*$descuento;
#echo $oferta." oferta real <br>";
$tiempo_conOferta = $oferta_des/$promedio;
#echo $tiempo_conOferta." tiempo con descuento<br>";
$oferta = $oferta - $oferta_des;
$tiempo_Sobrente = $oferta/$promedio;
#echo $tiempo_Sobrente." tiempo restante<br>";
$tiempo = $tiempo_conOferta+$tiempo_Sobrente;
#echo $tiempo." tiempo real <br>";;
#echo $oferta_des." oferta descuento <br>";
#echo $oferta." oferta restante <br>";
$resto_oferta = $oferta/$tiempo_conOferta;
#echo $resto_oferta." oferta cantidad restante  <br>";

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

    
    <div class="grafica container mt-2" id="grafica">
        <div id="myfirstchart"></div>
    </div>
    
    <script>
            new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'myfirstchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
                
            data: [
                <?php
                $mes = 2020;
                $valor = $promedio;
                $count = 0;
                $anio = 0;
                for($i = 0; $i<=$tiempo_conOferta; $i++){
                    
                    $anio++;
                    
                    echo '{ bimester: "'.$mes.'", value: '.$valor.' },';
                    if($anio == 12){
                        #echo '{ bimester: "'.$mes.'", value: '.$valor.' },';
                        $anio = 0;
                        $mes++;
                    }
                   
                    $valor =  $valor + $promedio + $resto_oferta;
                }
                /*while($count <= $tiempo){
                    $count++;
                    $anio++;
                    
                    if($anio == 3){
                        if($anio == 6){
                            if($anio == 12){
                                echo '{ bimester: "'.$mes.'", value: '.$valor.' },';
                                $anio = 0;
                                $mes++;
                            }
                        }
                    }
                    $valor =  $valor + $promedio;
                    
                    
                }*/
                
                ?>
            ],
                // The name of the data record attribute that contains x-values.
                xkey: 'bimester',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['value'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['$']

            
            
            });

    </script>

    <h5>Usted va enpezar a ahorrar a partir del año: <span><?php echo $mes;?></span></h5>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>