<?php
session_start();
$sesion = $_SESSION['usuario'];
$id_escritor = $_SESSION['id'];

if ($sesion == null || $sesion == '')  {
    header("Location:../login/cerrar.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="estilos_cms.css" rel="stylesheet" type="text/css" media="all">
    <title>Panel</title>
</head>
<body>

<div class="wrapper row2">
  <nav id="mainav" class="hoc clear"> 
    <ul class="clear">
    <li><a href="panel.php"><?php echo $sesion;?></a></li>
      <li class=""><a href="../index.php">inicio</a></li>
      <li class="active"><a href="#">Mis publicaciones</a></li>
      <li><a href="../login/cerrar.php">Salir</a></li>
    </ul>
  </nav>
</div>



<div class="wrapper row3">
  <section class="hoc container clear"> 
    <div class="group">
    <?php
        require_once("../crud-blog/Consultas.php");
        $usuarios = Usuarios::singleton();
        $data = $usuarios->get_articulosByIdEscritor($id_escritor);	
        if(count($data)){
        foreach ($data as $fila) {
            $id_articule = $fila['id'];
            $img = $fila['imagen'];
            $titulo = $fila['titulo'];
            $texto = $fila['contenido'];
            $etiqueta = $fila['etiqueta'];
            ?>
                <article class="one_third"><a href="#"><img class="btmspace-30" src="img-post/<?php echo $img;?>" width="500" height="600" alt=""></a>
                    <h6 class="nospace heading"><?php echo $titulo;?></h6>
                    <ul class="nospace meta">
                        <li><i class="fa fa-tag"></i> <a href="#"><?php echo $etiqueta;?></a></li>
                    </ul>
                    <p>Malesuada donec eu ex placerat accumsan felis quis auctor sem aliquam ut lacus laoreet placerat augue ornare pharetra&hellip;</p>
                    <footer class="nospace"><a class="btn" href="articulos.php?idc=<?php echo $id_articule;?>">Leer mas</a></footer>
                </article>
            <?php
        }
        }
    ?>
    </div>
  </section>
</div>

<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>