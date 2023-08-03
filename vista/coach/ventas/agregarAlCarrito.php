<?php
require_once("../../../base_datos/bd.php");
$cone = new Database();
$conex = $cone->conectar();
session_start();
include("../../../controller/validar.php");

if (isset($_GET["agregar"]))return;
	$codigo = $_GET["id"];
	$canti = $_GET["canti"];
	$docu = $_GET["docu"];
	$sentencia = $conex->prepare("SELECT * FROM productos WHERE id_producto = ?  LIMIT 1;");
	$sentencia->execute([$codigo]);
	$producto = $sentencia->fetch(PDO::FETCH_OBJ);

if($producto){
	if($producto->can_final = 0){
		header("Location: ./venta_p.php?status=5");
		exit;
	}
	$indice = false;
	for ($i = 0 ; $i < count($_SESSION["carrito"]); $i++) { 
		if($_SESSION["carrito"][$i]->id_producto === $codigo){
			$indice = $i;
			break;
		}
	}
	if($indice === FALSE){
		$producto->cantidad = $canti;
		$producto->total = $producto->precio * $canti ;
		array_push($_SESSION["carrito"], $producto);

	}else{
		$_SESSION["carrito"][$indice]->cantidad = $canti;
		$_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precio;
	}
	header("Location: ./venta_p.php");
}else header("Location: ./venta_p.php?status=4");

?>