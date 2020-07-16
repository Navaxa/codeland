<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Energy solutions</title>
    <link rel="stylesheet" href="index/css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <section class="contenedor nav">
                <div class="logo">
                    <h1 class="nombre-empresa">Energy solutions</h1>
                </div>
                <div class="enlaces-header">
                    <a href="#">Inicio</a>
                    <a href="blog/index.php">Blog</a>
                    <a href="#">Nosotros</a>
                    <a href="login/ingresar.php">Ingresar</a>
                </div>
                <div class="hamburguer">
                    <i class="fas fa-bars"></i>
                </div>
            </section>
        </nav>
        <div class="contenedor">
            <section class="contenido-header">
                <section class="textos-header">
                    <h1 class="title">Sumate al ahorro energético</h1>
                    <p class="parrafo-ptincipal">No hay otra forma mejor de ayudar al medio ambiente que practicando un consumo responsable.</p>
                    <a href="login/ingresar.php">Iniciar sesión</a>
                </section>
                
                <!--<img src="img/primeraIlustracion.svg" alt="">-->
            </section>
        </div>
    </header>
    <section class="about-us">
        <div class="contenedor1">
            <h2 class="titulo">Proveedores destacados</h2>
            <div class="contenedor-articulo">
                <div class="articulo" data-aos="zoom-in-right">
                    <img src="index/proveedor/asolmex.png" alt="" width="100%">
                    <!--<h3>Asolmex</h3>
                    <p>La Asociación reúne a operadores, inversionistas, proveedores y desarrolladores de 
                        Centrales Solares Fotovoltaicas a Gran Escala y de Generación Distribuida, 
                        representando sus intereses ante las dependencias y entidades del Sector Público, 
                        Asociaciones, Cámaras y Organismos Privados, Nacionales e Internacionales, 
                        promoviendo el desarrollo de la industria.</p>
                    <a href="#">Conoce mas...</a>-->
                </div>
                <div class="articulo" data-aos="zoom-in-right">
                    <img src="index/proveedor/conermex.png" alt="" width="100%">
                    <!--<h3>Conermex</h3>
                    <p>Es una empresa mexicana dedicada 100% al mercado fotovoltaico. Trayectoria iniciada
                       en el 2005 por profesionales con más de 30 años de experiencia , 
                       con socios experimentados en el mercado global. Ejecutamos la integración y puesta en
                       funcionamiento de un sistema fotovoltaico de escala comercial e industrial de 
                       Generación Distribuida hasta 500 kWp y distribuimos como mayoristas de componentes y 
                       kits solares, tanto interconectados como fuera de la red.</p>
                    <a href="#">Conoce mas...</a>-->
                </div>
                <div class="articulo" data-aos="zoom-in-right">
                    <img src="index/proveedor/sde.png" alt="" width="100%">
                    <!--<h3>SDE</h3>
                    <p>Es s una empresa mexicana dedicada 100% al mercado fotovoltaico. 
                        Trayectoria iniciada en el 2005 por profesionales con más de 30 años de experiencia ,
                         con socios experimentados en el mercado global. Ejecutamos la integración y 
                         puesta en funcionamiento de un sistema fotovoltaico de escala comercial e 
                         industrial de Generación Distribuida hasta 500 kWp y distribuimos como mayoristas 
                         de componentes y kits solares, tanto interconectados como fuera de la red.</p>
                    <a href="#">Conocer mas...</a>-->
                </div>
            </div>
        </div>
    </section>
    <section class="questions contenedor">
        <section class="textos-questions">
            <h1>Servicios de buena calidad</h1>
            <p>Tu escoges que proveedor se adapta a tu necesidades, nosotros te conectamos con ellos.</p>
            <a href="#">Conocer proveedores</a>
        </section>
        <img src="index/img1/panelsolar.jpg" alt="" data-aos="zoom-out-up" data-aos-duration="2000">
    </section>

    <?php
        require_once("login/CRUD/class/Consultas.php");
        $usuarios = Usuarios::singleton();                
        $data = $usuarios->get_numeroDeUsuarios();	
        $numedoDeUsuarios = 0;
        if(count($data)){
            foreach ($data as $fila) {
             $numedoDeUsuarios = $fila['count(*)'];
            }
        }

        $data = $usuarios->get_numeroDeProveedores();
        $numedoDeProveedores = 0;
        if(count($data)){
            foreach ($data as $fila) {
                $numedoDeProveedores = $fila['count(*)'];
            }
        }
    ?>

    <section class="results">
        <div class="contenedor1 conten-results">
            <section class="numbers">
                <div class="number" data-aos="zoom-in-left">
                    <h4>+8863</h4>
                    <p>Clientes satisfechos</p>
                </div>
                <div class="number" data-aos="zoom-in-left">
                    <h4>+<?php echo $numedoDeProveedores;?></h4>
                    <p>Proveedores de servicios</p>
                </div>
                <div class="number" data-aos="zoom-in-left">
                    <h4>+8863</h4>
                    <p>Trabajos elevorados</p>
                </div>
                <div class="number" data-aos="zoom-in-left">
                    <h4>+<?php echo $numedoDeUsuarios; ?></h4>
                    <p>Usuarios haciendo uso de esta plataforma</p>
                </div>
            </section>
            <section class="results-text">
                <h4>Un poco de lo que hemos logrado en Energy solutions</h4> <br>
                <a href="login/registrar.php">Ingrese aquí</a>
            </section>
        </div>
    </section>

    <!--<section class="contenedor1 services">
        <img src="img1/panelsolar3.jpg" alt="">
        <div class="box-skills">
            <h4><i class="far fa-check-circle"></i> Intalación de paneles solares</h4>
            <h4><i class="far fa-check-circle"></i> Asesoria</h4>
            <h4><i class="far fa-check-circle"></i> Productos destacables</h4>
            <h4><i class="far fa-check-circle"></i> Estrucuras</h4>
            <h4><i class="far fa-check-circle"></i> Proyectos</h4>
        </div>
    </section>-->

    <footer>
        <div class="partFooter">
            <h4>Servicios</h4>
            <a href="#">Services 1</a>
            <a href="#">Services 2</a>
            <a href="#">Services 3</a>
        </div>
        <div class="partFooter">
            <h4>Acerca de</h4>
            <a href="#">About 1</a>
            <a href="#">About 2</a>
            <a href="#">About 3</a>
        </div>
        <div class="partFooter">
            <h4>Redes sociales</h4>
            <div class="social-media">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
            </div>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://kit.fontawesome.com/c15b744a04.js" crossorigin="anonymous"></script>
    <script src="index/js/main.js"></script>
</body>

</html>
