!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <!--Importante--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar</title>
    <style>
    .color{
        background-color: #9BB;  
    }
</style>
</head>
<body>
    
<?php
require_once ("../barcode/vendor/autoload.php");
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
$fecha = date("d_m_Y");


/**PARA FORZAR LA DESCARGA DEL EXCEL */
header("Content-Type: text/html;charset=utf-8");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
$filename = "ReporteDatos_" .$fecha. ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename . "");


/***RECIBIENDO LAS VARIABLE DE LA FECHA */
$fechaInit = date("Y-m-d", strtotime($_POST['fecha_ingreso']));
$fechaFin  = date("Y-m-d", strtotime($_POST['fechaFin']));


/*
$sqlTrabajadores = ("select * from trabajadores where (fecha_ingreso>='$fechaInit' and fecha_ingreso<='$fechaFin') order by fecha_ingreso desc");
$sqlTrabajadores = ("SELECT * FROM trabajadores WHERE fecha_ingreso BETWEEN '$fechaInit' AND '$fechaFin' order by fecha_ingreso desc
$sqlTrabajadores = ("SELECT * FROM `trabajadores` WHERE fecha_ingreso BETWEEN '$fechaInit' AND '$fechaFin'
$sqlTrabajadores = ("select * from trabajadores where fecha_ingreso >= '$fechaInit' and fecha_ingreso < '$fechaFin';
$sqlTrabajadores = ("SELECT * FROM trabajadores WHERE fecha_ingreso BETWEEN '$fechaInit' AND '$fecha2' ORDER BY fecha_ingreso DESC
*/                       

$sqlTrabajadores = $conex->prepare ("SELECT * FROM datos WHERE fecha_regi BETWEEN '$fechaInit' AND '$fechaFin' ORDER BY fecha_regi DESC");
$sqlTrabajadores->execute();
?>


<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background: #D0CDCD;">
                <th>Documento</th>
                <th>Peso</th>
                <th>Bmi</th>
                <th>Grasa</th>
                <th>Musculo</th>
                <th>Agua</th>
                <th>Grasa_v</th>
                <th>Hueso</th>
                <th>Metabo</th>
                <th>Proteina</th>
                <th>Obesidad</th>
                <th>Fecha de registro</th>
    </tr>
</thead>
<?php

    foreach ( $sqlTrabajadores as $dato) { ?>
    
        <tr>
            
                <td><?= $dato['documentos'] ?></td>    
                <td><?= $dato['peso'] ?></td>
                <td><?= $dato['bmi'] ?></td>
                <td><?= $dato['grasa'] ?></td>
                <td><?= $dato['musculo'] ?></td>
                <td><?= $dato['agua'] ?></td>
                <td><?= $dato['grasa_v'] ?></td>
                <td><?= $dato['hueso'] ?></td>
                <td><?= $dato['metabo'] ?></td>
                <td><?= $dato['proteina'] ?></td>
                <td><?= $dato['obesidad'] ?></td>
                <td><?= $dato['fecha_regi'] ?></td>
        </tr>
    
    
<?php } ?>
</table>

</body>
</html>