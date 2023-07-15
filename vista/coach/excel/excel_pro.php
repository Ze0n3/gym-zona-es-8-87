<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= producto.xls");

session_start();
require_once ("../barcode/vendor/autoload.php");
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
//creamos la consulta
$SQL = $conex->prepare ("SELECT * FROM productos");
$SQL -> execute();
$resul=$SQL->fetchAll();
?>

<table>
        <!--El tr nos sirve sirve para crear las filas-->
        <!--El th se crea la cabecera-->
        <thead>
            <tr>
                
                <th>PRODUCTO</th>
                <th>NOMBRE</th>
                <th>PRECIO</th>
                <th>CANTIDAD INICIAL</th>
                <th>CANTIDAD FINAL</th>

            </tr>
        </thead>

        <?php
        foreach ($resul as $pro) {
            //se abre el ciclo con la llave
        ?>
            <!--El td sirve para sirve para crear las columnas-->
            <!--En cada td se va a mostrar los datos de una tabla usando variables por ejemplo: $variable['nombre del campo de la tabla que queremos que se vea']-->
            <tr>
                <td><?= $pro['id_producto'] ?></td>
                <td><?= $pro['nom_producto'] ?></td>
                <td><?= $pro['precio'] ?></td>
                <td><?= $pro['can_inicial'] ?></td>
                <td><?= $pro['can_final'] ?></td>
            
                

                <!--con este metodo GET vamos a poder ver la informacion que estamos enviando-->
            </tr>

        <?php
        } //se cierra el recorrido cerrando la llave
        ?>
</table>