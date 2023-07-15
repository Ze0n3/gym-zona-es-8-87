<?php
session_start();
require_once ("../barcode/vendor/autoload.php");
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();

$SQL = $conex->prepare ("SELECT*FROM horario");
$SQL -> execute();
$resul=$SQL->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/stiledi.css">
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <title>Imprimir Horario</title>
    <link href="../../../img1/logo9.png" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <a class="btn btn success" href="../tablas/tabla_horario.php" style="margin-left: 3.6%; margin-top:3%; position:relative;">  
    <i class="bi bi-chevron-left" style="padding:10px 14px 10px 10px; color:#fff; font-size:15px; background-color:#0d6efd; border-radius:10px;"> REGRESAR</i>
    </a>

    <!--creamos la tabla-->
    <table>
        <!--El tr nos sirve sirve para crear las filas-->
        <!--El th se crea la cabecera-->
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Id del horario</th>
                <th>FECHA</th>
                <th>HORA</th>
                <th>TIPO DE SERVICIO</th>
                <th>DOCUMENTO DEL COACH</th>
               
            </tr>
        </thead>

        <?php
        foreach ($resul as $hor) {
            //se abre el ciclo con la llave
        ?>
            <!--El td sirve para sirve para crear las columnas-->
            <!--En cada td se va a mostrar los datos de una tabla usando variables por ejemplo: $variable['nombre del campo de la tabla que queremos que se vea']-->
            <tr>
            
                <td style="background-color:#fff; padding-right:0%; padding-left:2.5%;"><?php $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                    echo $generator->getBarcode($hor['id_horario'], $generator::TYPE_CODE_128); ?></td>    
                <td><?= $hor['id_horario'] ?></td>
                <td><?= $hor['dia'] ?></td>
                <td><?= $hor['hora'] ?></td>
                <td><?= $hor['ejercicio'] ?></td>
                <td><?= $hor['doc_coach'] ?></td>

           
                

                <!--con este metodo GET vamos a poder ver la informacion que estamos enviando-->

                
                
            </tr>

        <?php
        } //se cierra el recorrido cerrando la llave
        ?>
    </table>


</body>

</html>