<?php
sleep(1);
require_once("../../../base_datos/bd.php");
$daba = new database();
$con = $daba ->conectar();
session_start();

/**
 * Nota: Es recomendable guardar la fecha en formato año - mes y dia (2022-08-25)
 * No es tan importante que el tipo de fecha sea date, puede ser varchar
 * La funcion strtotime:sirve para cambiar el forma a una fecha,
 * esta espera que se proporcione una cadena que contenga un formato de fecha en Inglés US,
 * es decir año-mes-dia e intentará convertir ese formato a una fecha Unix dia - mes - año.
*/

$fechaInit = date("Y-m-d", strtotime($_POST['f_ingreso']));
$fechaFin  = date("Y-m-d", strtotime($_POST['f_fin']));

$SQL = $con->prepare ("SELECT * FROM medidas WHERE `fecha_regi` BETWEEN '$fechaInit' AND '$fechaFin' ORDER BY fecha_regi ASC" );
$SQL -> execute();
$resul=$SQL->fetchAll();

?>

<table class="table table-hover">
    <thead>
        <tr>
                   
                <th>Documento</th>
                <th>Pecho</th>
                <th>Cintura</th>
                <th>Cadera</th>
                <th>Brazo_izq</th>
                <th>Brazo_der</th>
                <th>Fecha de registro</th>
        </tr>
    </thead>
    <?php
    $i = 1;
    foreach ($resul as $usu) { ?>
        <tbody>
            <tr>
                
                <td><?= $usu['doc_cliente'] ?></td>    
                <td><?= $usu['pecho'] ?></td>
                <td><?= $usu['cintura'] ?></td>
                <td><?= $usu['cadera'] ?></td>
                <td><?= $usu['brazo_izq'] ?></td>
                <td><?= $usu['brazo_der'] ?></td>
                <td><?= $usu['fecha_regi'] ?></td>
            </tr>
        </tbody>
    <?php } ?>
</table>