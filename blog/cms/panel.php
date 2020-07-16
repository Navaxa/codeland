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
    <li class="active"><a href="#"><?php echo $sesion;?></a></li>
      <li class=""><a href="../index.php">inicio</a></li>
      <li><a href="mipublicacion.php">Mis publicaciones</a></li>
      <li><a href="../login/cerrar.php">Salir</a></li>
    </ul>
  </nav>
</div>

  <div class="contenido-nuevo-articulo">
      <div class="articulo-nuevo">
        <label for="">Nueva publicacón</label>
          <form action="subir_pulicacion.php" method="POST" enctype="multipart/form-data">
              <input type="text" name="title" id="" placeholder="Titulo" required>
              <textarea placeholder="Contenido" name="contenido" required></textarea>
              <input type="file" name="img" id="" required>
              <select name="etiqueta" class="etiqueta">
                <option value="Energía solar">Elige una etiqueta</option>
                <option value="Energía solar">Energía solar</option>
                <option value="Energía eólica">Energía eólica</option>
                <option value="Energía hidroeléctrica">Energía hidroeléctrica</option>
                <option value="Biomasa">Biomasa</option>
                <option value="Biogás">Biogás</option>
                <option value="Energía del mar">Energía del mar</option>
                <option value="Energía geotérmica">Energía geotérmica</option>
              </select>
              <button>Subir</button>
          </form>
      </div>
  </div>



<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>