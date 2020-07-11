<?php 	
	session_start();
    $sesion = $_SESSION['usuario'];
    $email = $_SESSION['email'];
    $rol = $_SESSION['rol'];

	if ($sesion == null || $sesion == '' || $rol != 'cliente')  {
		header("Location:../../login/ingresar.php");
    }

    require_once("../../login/CRUD/class/Consultas.php");
    $usuarios = Usuarios::singleton();                
    $data = $usuarios->Read_a_datos_cliente($email);	
    if(count($data)){
        foreach ($data as $fila) {
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap4.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap4.5/css/estilos.css">
    <title>Mi perfil</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a href="#" class="navbar-brand">Energy Solutions</a>
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
                            <a href="#" class="dropdown-item activo">Perfil</a> 
                            <a href="configc.php" class="dropdown-item">Configuración</a>
                            <a href="../../login/cerrar.php" class="dropdown-item">Salir</a>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <section style="background: #ededf4; text-align: center;" class="p-5">
        <div class="container">
            <img class="logo" src="../img_perfil/<?php echo $foto_perfil?>" alt="">
            <h1><?php echo $sesion ?></h1>
            <p></p>
        </div>
    </section>

    
    <section class="container mt-5">
        <div class="info">
            <h6>Dedticación: <span><?php if(isset($dedicacion)){echo $dedicacion;}else{echo "No nos has dicho a que te dedicas";} ?></span></h3>
            <h6>Telefono: <span><?php if(isset($telefono)){echo $telefono;}else{echo "No has ingresado tu número de telefono";} ?></span></h3> 
            <h6>Dirección: <span><?php if(isset($calle)){echo $calle;}else{echo "";} if(isset($estado)){echo ', '.$estado;}else{echo "";}if(isset($cp)){echo ', '.$cp;}else{echo "";}?></span></h3>
            <h6>Facebook: <span><?php if(isset($facebook)){ if($facebook == ""){echo "No nos has compartido tu Facebook";}{echo '<a href="'.$facebook.'">'.$facebook.'</a>';}}else{echo "No nos has compartido tu Facebook";} ?></span></h3> 
            <h6>Acerca de ti: <span><?php if(isset($acerca_de)){echo $acerca_de;}else{echo "Aun no tenemos descripción de tu empresa, recuerda que es importante saber algo de tu empresa para que los clientes encuentren un mayor interes";} ?></span></h3>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
