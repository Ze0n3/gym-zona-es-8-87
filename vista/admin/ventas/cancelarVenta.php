<?php
require_once("../../../base_datos/bd.php");
$cone = new Database();
$conex = $cone->conectar();
session_start();

unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];

header("Location: ./venta_p.php?status=2");
?>