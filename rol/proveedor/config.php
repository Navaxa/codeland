<?php 	
	session_start();
	$sesion = $_SESSION['usuario'];
    $email = $_SESSION['email'];
    $rol = $_SESSION['rol'];
	if ($sesion == null || $sesion == '' || $rol != 'proveedor') {
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
    <title>Configuraciòn</title>
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
                            <a href="#" class="dropdown-item activo">Configuración</a>
                            <a href="../../login/cerrar.php" class="dropdown-item">Salir</a>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>


    

    <section style="background: #ededf4; text-align: center;" class="p-5">
        <div class="container">
            <h1>Tu cuenta</h1>
        </div>
    </section>

    <?php
        require_once("../../login/CRUD/class/Consultas.php");
        $usuarios = Usuarios::singleton();                
        $data = $usuarios->Read_a_datos_proveedor($email);	
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
            }
        }
    ?>

    <section class="container mt-5">
    <form action="datos_usuario_proveedor.php" name="formulario" method="POST" class="row" enctype="multipart/form-data">
            <div class="form col-lg-6 col-md-12">
                <h5>Nombre</h5>
                <input class="cajon" id="nombre" type="text" name="nombre" placeholder="Nombre completo" required="" value="<?php if(isset($nombre)){echo $nombre;}else{
                    echo $sesion;
                } ?>">
            </div>
            <div class="form col-lg-6 col-md-12">
                <h5>Empresa</h5>
                <input class="cajon" id="nombre_company" type="text" name="nombre_company" placeholder="Nombre empresa" required="" value="<?php if(isset($empresa)){ echo $empresa;}else{ echo "";}?>">
            </div>
            <div class="form col-lg-6 col-md-12">
                <h5>Teléfono</h5>
                <input class="cajon" id="cel" type="number" name="cel" placeholder="Teléfono" required="" value="<?php if($telefono == 0){ echo 'Teléfono'; }else{echo $telefono;} ?>">
            </div>
            <div class="form col-lg-6 col-md-12">
                <h5>Cargo</h5>
                <input class="cajon" id="cargo" type="text" name="cargo" placeholder="Tu cargo en la empresa" required="" value="<?php if(isset($cargo)){ echo $cargo;}else{ echo "";} ?>">
            </div>
            <div class="form col-lg-12 col-md-12">
                <h5>Dirección</h5>
                <div class="row dir container">
                    <select class="cajon col-lg-3 col-md-12 direccion" name="estado" id="estado">
                        <option><?php if(isset($estado)){ echo $estado;}else{ echo "Estado";}?></option>
                        <option >Ciudad de México</option>
                        <option >Aguascalientes</option>
                        <option >Baja California</option>
                        <option >Baja California Sur	</option>
                        <option >Campeche</option>
                        <option >Coahuila de Zaragoza	</option>
                        <option >Colima</option>
                        <option >Chiapas</option>
                        <option >Chihuahua</option>
                        <option >Durango</option>
                        <option >Guanajuato</option>
                        <option >Guerrero</option>
                        <option >Hidalgo</option>
                        <option >Jalisco</option>
                        <option >México</option>
                        <option >Michoacán </option>
                        <option >Morelos</option>
                        <option >Nayarit</option>
                        <option >Nuevo León	</option>
                        <option >Oaxaca</option>
                        <option >Puebla</option>
                        <option >Querétaro</option>
                        <option >Quintana Roo	</option>
                        <option >San Luis Potosí	</option>
                        <option >Sinaloa</option>
                        <option >Sonora</option>
                        <option >Tabasco</option>
                        <option >Tamaulipas </option>
                        <option >Tlaxcala	</option>
                        <option >Veracruz</option>
                        <option >Yucatán</option>
                        <option >Zacatecas</option>
                    </select>
                    <input class="cajon col-lg-6 col-md-12 direccion" id="dir" type="text" name="dir" placeholder="Calle" required="" value="<?php if(isset($calle)){ echo $calle;}else{ echo "";} ?>">
                    <input class="cajon col-lg-2 col-md-12 direccion" id="cp" type="number" name="cp" placeholder="C.P." required="" value="<?php if($cp == 0){ echo 'C.P.'; }else{echo $cp;} ?>">
                </div>
                </div>
                <div class="from  col-lg-12 col-md-12">
                    <h5>Sitio Web</h5>
                    <input class="cajon" id="site" type="text" name="site" placeholder="URL de su sitio Web" required="" value="<?php if(isset($site)){ echo $site;}else{ echo "";}?>">
                </div>
            <div class="form col-lg-12 col-md-12 pt-2">
                <h5>Sobre tu empresa</h5>
                <textarea class="cajon" id="descripcon" cols="50" rows="5" type="Textarea" name="sobre_company" placeholder="Cuentanos de tu empresa" required=""><?php if(isset($acerca_de)){ echo $acerca_de;}else{ echo "";} ?></textarea>
            </div>
            <div class="form col-lg-12 col-md-12 form">
                <h5>Logo de tu empresa</h5>
                <input type="file" name="logo" required="">
            </div>
		    <div class="form col-lg-2 col-md-12 form">
                <button id="guardar" class="negociar guardar">Guardar</button>
            </div>
	</form>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>