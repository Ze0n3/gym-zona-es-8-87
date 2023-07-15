<?php
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
session_start();
?>
<?php
if(isset($_POST["codigo"]) || ($_POST["nombre"])) return;
$codigo = $_POST["codigo"];
$nom = $_POST["nombre"];

$sentencia = $conex->prepare("SELECT * FROM productos WHERE id_producto = ? LIMIT 1;");
$sentencia->execute([$codigo]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);

$senten = $conex->prepare("SELECT * FROM productos WHERE nom_producto = ? ");
$senten->execute([$nom]);
$produc = $senten->fetch(PDO::FETCH_OBJ);



if($producto || $produc){
	if($producto->existencia < 1){
		header("Location: ./vender.php?status=5");
		exit;
	}
	$indice = false;
	for ($i=0; $i < count($_SESSION["carrito"]); $i++) { 
		if($_SESSION["carrito"][$i]->codigo === $codigo){
			$indice = $i;
			break;
		}
	}
	if($indice === FALSE){
		$producto->cantidad = 1;
		$producto->total = $producto->precioVenta;
		array_push($_SESSION["carrito"], $producto);
	}else{
		$_SESSION["carrito"][$indice]->cantidad++;
		$_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precioVenta;
	}
	header("Location: ./vender.php");
}else header("Location: ./vender.php?status=4");
?>