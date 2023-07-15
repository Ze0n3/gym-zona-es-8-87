
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

$SQL = $con->prepare ("SELECT * FROM venta WHERE `fecha` BETWEEN '$fechaInit' AND '$fechaFin' ORDER BY fecha ASC" );
$SQL -> execute();
$resul=$SQL->fetchAll();

?>

<table class="table table-hover">
    <thead>
        <tr>
                   
                <th>Documento del coach</th>
                <th>Documento del cliente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Total</th>
        </tr>
    </thead>
    <?php
    $i = 1;
    foreach ($resul as $usu) { ?>
        <tbody>
            <tr>
                
                <td><?= $usu['doc_coach'] ?></td>
                <td><?= $usu['doc_cliente'] ?></td>
                <td><?= $usu['fecha'] ?></td>
                <td><?= $usu['hora'] ?></td>
                <td><?= $usu['total'] ?></td>
            </tr>
        </tbody>
    <?php } ?>
</table>


