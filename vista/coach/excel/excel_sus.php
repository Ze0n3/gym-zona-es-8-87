<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= suscripcion.xls");

session_start();
require_once ("../barcode/vendor/autoload.php");
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
//creamos la consulta
$SQL = $conex->prepare ("SELECT * FROM suscripcion");
$SQL -> execute();
$resul=$SQL->fetchAll();
?>

<table>
        <!--El tr nos sirve sirve para crear las filas-->
        <!--El th se crea la cabecera-->
        <thead>
            <tr>
                
                <th>Id de suscripcion</th>
                <th>Documento del cliente</th>
                <th>Documento del Coach</th>
                <th>Fecha de suscripcion</th>
                <th>Fecha de vencimiento</th>
                <th>Precio</th>

            </tr>
        </thead>

        <?php
        foreach ($resul as $sus) {
            //se abre el ciclo con la llave
        ?>
            <!--El td sirve para sirve para crear las columnas-->
            <!--En cada td se va a mostrar los datos de una tabla usando variables por ejemplo: $variable['nombre del campo de la tabla que queremos que se vea']-->
            <tr>
                <td><?= $sus['id_suscripcion'] ?></td>    
                <td><?= $sus['doc_cliente'] ?></td>
                <td><?= $sus['doc_coach'] ?></td>
                <td><?= $sus['fecha_ini'] ?></td>
                <td><?= $sus['fecha_venc'] ?></td>
                <td><?= $sus['precio'] ?></td>
            
                

                <!--con este metodo GET vamos a poder ver la informacion que estamos enviando-->
            </tr>

        <?php
        } //se cierra el recorrido cerrando la llave
        ?>
</table>