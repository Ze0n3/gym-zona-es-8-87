<?php
require_once("../../../base_datos/bd.php");
$cone = new Database();
$conex = $cone->conectar();
session_start();
include("../../../controller/validar.php");

if (isset($_GET["agregar"]))return; {
    
    $producto = $_GET['id'];
    $cantidad = $_GET['canti'];

    $statement = $conex->prepare("SELECT * FROM productos WHERE id_producto='$producto' and docu_ingre ='".$_SESSION['docu']."'");
    $statement->execute();
    $resultados = $statement->fetch();

    $suma = $resultados['can_inicial'] + $cantidad;

    $actu = $conex->prepare("UPDATE productos SET can_inicial = '$suma' where id_producto='$producto' and docu_ingre='".$_SESSION['docu']."'");
    $actu->execute();
    echo '<script>alert ("Se a agregado la cantidad correctamente");</script>';
    echo '<script>window.location="agregarpro.php"</script>';
}