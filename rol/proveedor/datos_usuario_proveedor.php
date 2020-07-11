<?php

    session_start();
    $sesion = $_SESSION['usuario'];
    $email = $_SESSION['email'];
    $rol = $_SESSION['rol'];
    if ($sesion == null || $sesion == '') {
        header("Location:../../login/ingresar.php");
    }

    if($rol == 'proveedor'){
        $nombre = $_POST['nombre'];
        $nombre_company = $_POST['nombre_company'];
        $telefono = $_POST['cel'];
        $cargo = $_POST['cargo'];
        $estado = $_POST['estado'];
        $dir = $_POST['dir'];
        $cp = $_POST['cp'];
        $sobre_company = $_POST['sobre_company'];
        $site = $_POST['site'];
        
    
        $nombre_imagen = $_FILES['logo']['name'];
        $tipo_imagen = $_FILES['logo']['type'];
        $tamagno_imagen = $_FILES['logo']['size'];
        if($tamagno_imagen <= 1000000){
            if($tipo_imagen == "image/jpd" || $tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png"){
    
                $directorio = $_SERVER['DOCUMENT_ROOT'].'/projects/ahorroEnergetico/rol/img_logos/';
                move_uploaded_file($_FILES['logo']['tmp_name'], $directorio.$nombre_imagen);
    
                require_once("../../login/CRUD/class/Consultas.php");
                $usuarios = Usuarios::singleton();
    
                $data = $usuarios->Read_a_datos_proveedor($email);
                if(count($data)){
                    foreach ($data as $fila) {
                        $confirma_correo=$fila['email'];
                    }
                }
                if(isset($confirma_correo)){
                    $data = $usuarios->Insertar_a_datos_proveedorUpdate($nombre, $nombre_company, $telefono, $cargo, $estado, $dir, $cp, $sobre_company, $site, $email, $nombre_imagen);
                }else{
                    $data = $usuarios->Insertar_a_datos_proveedorPrimeraVez($nombre, $nombre_company, $telefono, $cargo, $estado, $dir, $cp, $sobre_company, $site, $email, $nombre_imagen);
                }
                $data = $usuarios->Update_Usuario($nombre, $email);
                header("Location:config.php");
    
            }else{
                echo "Este archivo no es una imagen";
            }
        }else{
            echo "Tamaño grande";
        }

    }else{

        $nombre = $_POST['nombre'];
        $dedicacion = $_POST['dedicacion'];
        $telefono = $_POST['cel'];
        $estado = $_POST['estado'];
        $dir = $_POST['dir'];
        $cp = $_POST['cp'];
        $sobre_user = $_POST['sobre_user'];
    
        if(!isset($_POST['facebook'])){
            $facebook = "";
        }else{
            $facebook = $_POST['facebook'];
        }
        
    
        $nombre_imagen = $_FILES['perfil']['name'];
        $tipo_imagen = $_FILES['perfil']['type'];
        $tamagno_imagen = $_FILES['perfil']['size'];
        if($tamagno_imagen <= 1000000){
            if($tipo_imagen == "image/jpd" || $tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png"){
    
                $directorio = $_SERVER['DOCUMENT_ROOT'].'/projects/ahorroEnergetico/rol/img_perfil/';
                move_uploaded_file($_FILES['perfil']['tmp_name'], $directorio.$nombre_imagen);
    
                require_once("../../login/CRUD/class/Consultas.php");
                $usuarios = Usuarios::singleton();
    
                $data = $usuarios->Read_a_datos_cliente($email);
                if(count($data)){
                    foreach ($data as $fila) {
                        $confirma_correo=$fila['email'];
                    }
                }
                if(isset($confirma_correo)){
                    $data = $usuarios->Insertar_a_datos_clienteUpdate($nombre, $dedicacion, $telefono, $estado, $dir, $cp, $sobre_user, $email, $facebook, $nombre_imagen);
                }else{
                    $data = $usuarios->Insertar_a_datos_clientePrimeraVez($nombre, $dedicacion, $telefono, $estado, $dir, $cp, $sobre_user, $email, $facebook, $nombre_imagen);
                }
                $data = $usuarios->Update_Usuario($nombre, $email);
                header("Location:../cliente/configc.php");
    
            }else{
                echo "Este archivo no es una imagen";
            }
        }else{
            echo "Tamaño grande";
        }

    }

    

?>