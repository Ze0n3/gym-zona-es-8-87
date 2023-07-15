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
$filename = "ReporteClientes_" .$fecha. ".xls";
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

$resul = $conex->prepare ("SELECT * FROM usuarios INNER JOIN tip_user ON usuarios.tipo_usuario = tip_user.id_tip_user INNER JOIN genero ON usuarios.genero=genero.id_genero INNER JOIN estado ON usuarios.estado=estado.id_estado WHERE usuarios.tipo_usuario = 3  AND `fecha_nacimiento` BETWEEN '$fechaInit' AND '$fechaFin' ORDER BY fecha_nacimiento ASC");
$resul->execute();
?>


<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background: #D0CDCD;">
                <th>Documento</th>
                <th>Nombre Completo</th>
                <th>usuario</th>
                <th>Tipo Usuario</th>
                <th>Genero</th>
                <th>Estado</th>
                <th>Fecha de Nacimiento</th>
    </tr>
</thead>
<?php

    foreach ( $resul as $usu) { ?>
    
        <tr>
            
                <td><?= $usu['documento'] ?></td>
                <td><?= $usu['nom_completo'] ?></td>
                <td><?= $usu['usuario'] ?></td>
                <td><?= $usu['nom_tip_user'] ?></td>
                <td><?= $usu['genero'] ?></td>
                
                <td><?= $usu['estado'] ?></td>
                <td><?= $usu['fecha_nacimiento'] ?></td>
        </tr>
    
    
<?php } ?>
</table>

</body>
</html>