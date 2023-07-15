<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= medidas.xls");

session_start();
require_once ("../barcode/vendor/autoload.php");
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
//creamos la consulta
$SQL = $conex->prepare ("SELECT * FROM medidas");
$SQL -> execute();
$resul=$SQL->fetchAll();
?>

<table>
        <!--El tr nos sirve sirve para crear las filas-->
        <!--El th se crea la cabecera-->
        <thead>
            <tr>
                
                <th>Documento</th>
                <th>Pecho</th>
                <th>Cintura</th>
                <th>Cadera</th>
                <th>Brazo_izq</th>
                <th>Brazo_der</th>

            </tr>
        </thead>

        <?php
        foreach ($resul as $medi) {
            //se abre el ciclo con la llave
        ?>
            <!--El td sirve para sirve para crear las columnas-->
            <!--En cada td se va a mostrar los datos de una tabla usando variables por ejemplo: $variable['nombre del campo de la tabla que queremos que se vea']-->
            <tr>
                <td><?= $medi['documento'] ?></td>    
                <td><?= $medi['pecho'] ?></td>
                <td><?= $medi['cintura'] ?></td>
                <td><?= $medi['cadera'] ?></td>
                <td><?= $medi['brazo_izq'] ?></td>
                <td><?= $medi['brazo_der'] ?></td>
            
                

                <!--con este metodo GET vamos a poder ver la informacion que estamos enviando-->
            </tr>

        <?php
        } //se cierra el recorrido cerrando la llave
        ?>
</table>