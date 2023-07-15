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
$filename = "ReporteVentasServicios_" .$fecha. ".xls";
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

$sqlTrabajadores = $conex->prepare ("SELECT * FROM venta_serv WHERE fecha_fin BETWEEN '$fechaInit' AND '$fechaFin' ORDER BY fecha_fin ASC");
$sqlTrabajadores->execute();
?>


<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background: #D0CDCD;">
                <th>Documento del coach</th>
                <th>Documento del cliente</th>
                <th>Tipo de servicio</th>
                <th>Fecha inicial</th>
                <th>Fecha final</th>
    </tr>
</thead>
<?php

    foreach ( $sqlTrabajadores as $usu) { ?>
    
        <tr>
            
                <td><?= $usu['doc_coach'] ?></td>
                <td><?= $usu['doc_cliente'] ?></td>
                <td><?= $usu['id_tip_servi'] ?></td>
                <td><?= $usu['fecha_ini'] ?></td>
                <td><?= $usu['fecha_fin'] ?></td>
        </tr>
    
    
<?php } ?>
</table>

</body>
</html>