<!DOCTYPE html>
<html lang="">
<head>
<title>Blog</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="cms/estilos_cms.css" rel="stylesheet" type="text/css">
</head>
<body id="top">
<div class="wrapper row1">
 <!-- <header id="header" class="hoc clear"> 
    
    <div id="logo" class="fl_left">
      <h1><a href="index.html">Wetwest</a></h1>
    </div>
    <div id="quickinfo" class="fl_right">
      <ul class="nospace inline">
        <li><strong>Placerat:</strong><br>
          +00 (123) 456 7890</li>
        <li><strong>Lobortis:</strong><br>
          +00 (123) 456 7890</li>
      </ul>
    </div>
  </header>-->
</div>

<div class="wrapper row2">
  <nav id="mainav" class="hoc clear"> 
    
    <ul class="clear">
      <li class="active"><a href="../index.php">inicio</a></li>
      <!--<li><a class="drop" href="#">Pages</a>
        <ul>
          <li><a href="pages/gallery.html">Gallery</a></li>
          <li><a href="pages/full-width.html">Full Width</a></li>
          <li><a href="pages/sidebar-left.html">Sidebar Left</a></li>
          <li><a href="pages/sidebar-right.html">Sidebar Right</a></li>
          <li><a href="pages/basic-grid.html">Basic Grid</a></li
        </ul>
      </li>
      <li><a class="drop" href="#">Dropdown</a>
        <ul>
          <li><a href="#">Level 2</a></li>
          <li><a class="drop" href="#">Level 2 + Drop</a>
            <ul>
              <li><a href="#">Level 3</a></li>
              <li><a href="#">Level 3</a></li>
              <li><a href="#">Level 3</a></li>
            </ul>
          </li>
          <li><a href="#">Level 2</a></li>
        </ul>
      </li>
      <li><a href="#">Link Text</a></li>
      <li><a href="#">Link Text</a></li>
      <li><a href="#">Link Text</a></li>-->
      <li><a href="#">¿Quien escribe articuos?</a></li>
    </ul>
    
  </nav>
</div>
<div class="wrapper bgded overlay" style="background-image:url('../img/energiasolar1.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <article>
      <div>
        <p class="heading">Si eres escritor</p>
        <h2 class="heading">Unete a nosotros</h2>
        <p>Escribe articulos que impulsen el uso de energia renovable o bien las novedades que hay sobre el tema</p>
      </div>
      <footer>
        <ul class="nospace inline pushright">
          <li><a class="btn inverse" href="#">Ver artículos</a></li>
          <li><a class="btn" href="login/ingresar.php">Escribir</a></li>
        </ul>
      </footer>
    </article>
    
  </div>
</div>

<div class="wrapper row3">
  <main class="hoc container clear"> 
   <?php
    require_once("crud-blog/Consultas.php");
    $usuarios = Usuarios::singleton();
    $data = $usuarios->get_articulos();	
    if(count($data)){
      foreach ($data as $fila) {
        $id_articule = $fila['id'];
        $id_escritor = $fila['id_escritor'];
        $img = $fila['imagen'];
        $titulo = $fila['titulo'];
        $texto = $fila['contenido'];
        $etiqueta = $fila['etiqueta'];
      break;
      }
    }
   ?>
    <article class="group">
      <div class="group btmspace-80">
        <div class="one_quarter first">
          <p class="font-xs">Mas visitado</p>
          <h6 class="heading"><?php echo $titulo;?></h6>
        </div>
        <div class="three_quarter">
          <p><?php echo substr($texto, 0, 226);?></p>
          <p class="btmspace-30"><?php echo substr($texto, 227, 339);?>&hellip;</p>
          <footer><a class="btn" href="cms/articulos.php?idc=<?php echo $id_articule;?>">Leer mas &raquo;</a></footer>
        </div>
      </div>
      <!--<figure>
        <ul class="nospace group overview">
          <li class="one_half"><a href="#"><img src="images/demo/480x360.png" alt=""></a></li>
          <li class="one_half"><a href="#"><img src="images/demo/480x360.png" alt=""></a></li>
        </ul>
      </figure>-->
    </article>
   
    <div class="clear"></div>
  </main>
</div>

<div class="wrapper bgded overlay" style="background: black;">
  <article class="hoc container clear center"> 

    <div class="sectiontitle" style="margin-bottom:30px;">
      <h6 class="heading">¿Quieres comprar o ser proveedor de servicios de energia renovable?</h6>
      <!--<p>En la actualidad miles de personas desconocen..</p>-->
    </div>
    <p><a class="btn medium" href="../index.php">Ingresa aqui &raquo;</a></p>

  </article>
</div>

<div class="wrapper row3 contenido">
  <section class="hoc container clear"> 

    <!--<div class="sectiontitle">
      <h6 class="heading">Nulla pretium nulla ligula</h6>
      <p>Placerat ut tincidunt eget varius quis erat quisque euismod</p>
    </div>-->
    <div class="group">
      <?php
        require_once("crud-blog/Consultas.php");
        $usuarios = Usuarios::singleton();
        $data = $usuarios->get_articulos();
        $cuenta = 0;	
        if(count($data)){
          foreach ($data as $fila) {
            $id_articule = $fila['id'];
            $id_escritor = $fila['id_escritor'];
            $img = $fila['imagen'];
            $titulo = $fila['titulo'];
            $texto = $fila['contenido'];
            $etiqueta = $fila['etiqueta'];
            $autor = $usuarios->get_escritorById($id_escritor);	
            if(count($autor)){
              foreach ($autor as $filautor) {
                $nombre_autor = $filautor['nombre'];
              }
            }
            
            ?>
            <article class="one_third"><a href="cms/articulos.php?idc=<?php echo $id_articule;?>"><img class="btmspace-30" src="cms/img-post/<?php echo $img;?>" width="500" height="600" alt=""></a>
              <h6 class="nospace heading"><?php echo $titulo;?></h6>
              <ul class="nospace meta">
                <li><i class="fa fa-user"></i> <a href="#"><?php echo $nombre_autor;?></a></li>
                <li><i class="fa fa-tag"></i> <a href="#"><?php echo $etiqueta;?></a></li>
              </ul>
              <p><?php echo substr($texto, 0, 117);?>&hellip;</p>
              <footer class="nospace"><a class="btn" href="cms/articulos.php?idc=<?php echo $id_articule;?>">Leer mas</a></footer>
            </article>
            <?php
          }
        }
      ?>
      
      
    </div>
  </section>
</div>

<div class="wrapper bgded overlay light" style="background: black;">
  <article class="hoc cta clear"> 

    <h6 class="three_quarter first">escribe articulos e inpulsa el uso de la energía renovable.</h6>
    <footer class="one_quarter"><a class="btn" href="login/login.php">Registrate aqui &raquo;</a></footer>
   
  </article>
</div>

<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    
    <!--<div class="one_quarter first">
      <h6 class="heading">Leo nullam vitae</h6>
      <ul class="nospace btmspace-30 linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
          Street Name &amp; Number, Town, Postcode/Zip
          </address>
        </li>
        <li><i class="fa fa-phone"></i> +00 (123) 456 7890</li>
        <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
      </ul>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="heading">Feugiat turpis phasellus</h6>
      <ul class="nospace linklist">
        <li><a href="#">Ullamcorper erat id suscipit</a></li>
        <li><a href="#">Felis quam id dui donec</a></li>
        <li><a href="#">Posuere nulla id congue</a></li>
        <li><a href="#">Bibendum nulla vestibulum</a></li>
        <li><a href="#">Urna ac ipsum iaculis</a></li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="heading">Nec hendrerit sem</h6>
      <ul class="nospace linklist">
        <li><a href="#">Pharetra curabitur quis</a></li>
        <li><a href="#">Nisi nec odio tincidunt</a></li>
        <li><a href="#">Tempor vitae at metus</a></li>
        <li><a href="#">Sed at ante et est</a></li>
        <li><a href="#">Dapibus hendrerit aenean</a></li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="heading">Fusce euismod urna</h6>
      <p class="nospace btmspace-15">Non fringilla laoreet phasellus volutpat arcu eget posuere euismod arcu purus.</p>
      <form method="post" action="#">
        <fieldset>
          <legend>Newsletter:</legend>
          <input class="btmspace-15" type="text" value="" placeholder="Name">
          <input class="btmspace-15" type="text" value="" placeholder="Email">
          <button type="submit" value="submit">Submit</button>
        </fieldset>
      </form>
    </div>-->
   
  </footer>
</div>

<div class="wrapper row5">
  <div id="copyright" class="hoc clear" style="text-align: center;"> 

    <p class="fl_left" style="width:100%;">Copyright &copy; 2020 - All Rights Reserved - <a href="../index.php">Energy Solutions</a></p>
    <!---<p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
      -->
  </div>
</div>
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>