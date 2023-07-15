<?php
require_once("../../../base_datos/bd.php");
$cone = new Database();
$conex = $cone->conectar();
session_start();

if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

array_splice($_SESSION["carrito"], $indice, 1);
header("Location: ./venta_p.php?status=3");
?>