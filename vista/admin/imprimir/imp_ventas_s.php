<?php
session_start();
require_once("../barcode/vendor/autoload.php");
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();

$SQL = $conex->prepare ("SELECT*FROM venta_serv");
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
    <title>Imprimir venta de servicio</title>
    <link href="../../../img1/logo9.png" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <a class="btn btn success" href="../tablas/tabla_venta_s.php" style="margin-left: 3.6%; margin-top:3%; position:relative;">  
    <i class="bi bi-chevron-left" style="padding:10px 14px 10px 10px; color:#fff; font-size:15px; background-color:#0d6efd; border-radius:10px;"> REGRESAR</i>
    </a>

    <!--creamos la tabla-->
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



</body>

</html>