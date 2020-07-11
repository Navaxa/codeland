<?php
session_start();
$sesion = $_SESSION['usuario'];
$email = $_SESSION['email'];
if ($sesion == null || $sesion == '') {
    header("Location:../../login/ingresar.php");
}
$tipo_servicio = $_POST['servicio'];
$descripcion = $_POST['descripcion-servicio'];


require_once("../../login/CRUD/class/Consultas.php");
$usuarios = Usuarios::singleton();                
$data = $usuarios->Insertar_solicitud($sesion, $descripcion, $tipo_servicio, $email);

header("Location:cliente.php?op=0?");

?>