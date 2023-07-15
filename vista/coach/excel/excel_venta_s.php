<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= ventas de servicio.xls");

session_start();
require_once ("../barcode/vendor/autoload.php");
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
//creamos la consulta
$SQL = $conex->prepare ("SELECT * FROM venta_serv");
$SQL -> execute();
$resul=$SQL->fetchAll();
?>

<table>
        <!--El tr nos sirve sirve para crear las filas-->
        <!--El th se crea la cabecera-->
        <thead>
            <tr>
                
                <th>FECHA INICIAL</th>
                <th>DOCUMENTO DEL COACH</th>
                <th>DOCUMENTO DEL CLIENTE</th>
                <th>TIPO DE SERVICIO</th>
                <th>FECHA FINAL</th>
                
                
               
            </tr>
        </thead>

        <?php
        foreach ($resul as $usu) {
            //se abre el ciclo con la llave
        ?>
            <!--El td sirve para sirve para crear las columnas-->
            <!--En cada td se va a mostrar los datos de una tabla usando variables por ejemplo: $variable['nombre del campo de la tabla que queremos que se vea']-->
            <tr>
            
          
                <td><?= $usu['fecha_ini'] ?></td>
                <td><?= $usu['doc_coach'] ?></td>
                <td><?= $usu['doc_cliente'] ?></td>
                <td><?= $usu['id_tip_servi'] ?></td>
                <td><?= $usu['fecha_fin'] ?></td>
               
            </tr>

        <?php
        } //se cierra el recorrido cerrando la llave
        ?>
</table>
