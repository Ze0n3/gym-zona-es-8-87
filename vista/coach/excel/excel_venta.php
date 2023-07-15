<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= ventas.xls");

session_start();
require_once ("../barcode/vendor/autoload.php");
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
//creamos la consulta
$SQL = $conex->prepare ("SELECT * FROM venta");
$SQL -> execute();
$resul=$SQL->fetchAll();
?>

<table>
        <!--El tr nos sirve sirve para crear las filas-->
        <!--El th se crea la cabecera-->
        <thead>
            <tr>
                
                <th>DOCUMENTO DEL COACH</th>
                <th>DOCUMENTO DEL CLIENTE</th>
                <th>FECHA</th>
                <th>HORA</th>
                <th>TOTAL</th>
                
               
            </tr>
        </thead>

        <?php
        foreach ($resul as $usu) {
            //se abre el ciclo con la llave
        ?>
            <!--El td sirve para sirve para crear las columnas-->
            <!--En cada td se va a mostrar los datos de una tabla usando variables por ejemplo: $variable['nombre del campo de la tabla que queremos que se vea']-->
            <tr>
            
          
                <td><?= $usu['doc_coach'] ?></td>
                <td><?= $usu['doc_cliente'] ?></td>
                <td><?= $usu['fecha'] ?></td>
                <td><?= $usu['hora'] ?></td>
                <td><?= $usu['total'] ?></td>

           
                

                <!--con este metodo GET vamos a poder ver la informacion que estamos enviando-->

                
                
            </tr>

        <?php
        } //se cierra el recorrido cerrando la llave
        ?>
</table>