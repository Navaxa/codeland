<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        $sesion = $_SESSION['usuario'];
    }
    $id_articulo = $_GET['idc'];

    require_once("../crud-blog/Consultas.php");
        $usuarios = Usuarios::singleton();
        $data = $usuarios->get_articulosById($id_articulo);	
        if(count($data)){
          foreach ($data as $fila) {
            $id_escritor = $fila['id_escritor'];
            $img = $fila['imagen'];
            $titulo = $fila['titulo'];
            $contenido = $fila['contenido'];
            $etiqueta = $fila['etiqueta'];
            $fecha = $fila['fecha'];
          }
        }
        $autor = $usuarios->get_escritorById($id_escritor);	
        if(count($autor)){
            foreach ($autor as $filautor) {
              $nombre_autor = $filautor['nombre'];
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="estilos_cms.css" rel="stylesheet" type="text/css" media="all">
    <title>Ariculos</title>
</head>
<body>

<div class="wrapper row2">
  <nav id="mainav" class="hoc clear"> 
    <ul class="clear">
       <?php 
            if(isset($sesion)){
                ?>
                <li><a href="panel.php"><?php echo $sesion;?></a></li>
                <li class=""><a href="mipublicacion.php">Mis publicaciones</a></li>
                <li><a href="../login/cerrar.php">Salir</a></li>
                <?php
            }else{
                ?>
                <li class=""><a href="../index.php">inicio</a></li>
                <li><a href="#">¿Quien escribe articuos?</a></li>
                <?php
            }
       ?>
    </ul>
  </nav>
</div>

  <div class="informacion">
    <div class="contenido-articulo">
        <div class="titulo-articulo">
            <h5><?php echo $titulo;?></h5>
        </div>
        <div class="autor-articulo">
            <h6>Autor: <span><?php echo $nombre_autor;?></span></h6>
        </div>
        <div class="fecha-articulo">
            <h6><span>Fecha: </span><?php echo $fecha;?></h6>
        </div>
        <div class="contenido">
            <p><?php echo $contenido;?></p>
        </div>  
    </div>
    <!--<div class="mascontenido">
        <h5>Mas contenido</h5>
    </div>-->
  </div>



<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>