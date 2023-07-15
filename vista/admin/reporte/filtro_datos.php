
<?php

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

$SQL = $con->prepare ("SELECT * FROM datos WHERE `fecha_regi` BETWEEN '$fechaInit' AND '$fechaFin' ORDER BY fecha_regi ASC" );
$SQL -> execute();
$resul=$SQL->fetchAll();

?>

<table class="table table-hover">
    <thead>
        <tr>
                   
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
    $i = 1;
    foreach ($resul as $dataRow) { ?>
        <tbody>
            <tr>
                
                <td><?= $dataRow['documentos'] ?></td>    
                <td><?=$dataRow['peso'] ?></td>
                <td><?= $dataRow['bmi'] ?></td>
                <td><?= $dataRow['grasa'] ?></td>
                <td><?=$dataRow['musculo'] ?></td>
                <td><?= $dataRow['agua'] ?></td>
                <td><?= $dataRow['grasa_v'] ?></td>
                <td><?= $dataRow['hueso'] ?></td>
                <td><?= $dataRow['metabo'] ?></td>
                <td><?= $dataRow['proteina'] ?></td>
                <td><?= $dataRow['obesidad'] ?></td>
                <td><?= $dataRow['fecha_regi'] ?></td>
            </tr>
        </tbody>
    <?php } ?>
</table>


