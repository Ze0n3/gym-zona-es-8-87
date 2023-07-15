
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

$SQL = $con->prepare ("SELECT * FROM usuarios INNER JOIN tip_user ON usuarios.tipo_usuario = tip_user.id_tip_user INNER JOIN genero ON usuarios.genero=genero.id_genero INNER JOIN estado ON usuarios.estado=estado.id_estado WHERE usuarios.tipo_usuario = 3  AND `fecha_nacimiento` BETWEEN '$fechaInit' AND '$fechaFin' ORDER BY fecha_nacimiento ASC" );
$SQL -> execute();
$resul=$SQL->fetchAll();

?>

<table class="table table-hover">
    <thead>
        <tr>
                   
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
    $i = 1;
    foreach ($resul as $usu) { ?>
        <tbody>
            <tr>
                
                <td><?= $usu['documento'] ?></td>
                <td><?= $usu['nom_completo'] ?></td>
                <td><?= $usu['usuario'] ?></td>
                <td><?= $usu['nom_tip_user'] ?></td>
                <td><?= $usu['genero'] ?></td>
                
                <td><?= $usu['estado'] ?></td>
                <td><?= $usu['fecha_nacimiento'] ?></td>
            </tr>
        </tbody>
    <?php } ?>
</table>


