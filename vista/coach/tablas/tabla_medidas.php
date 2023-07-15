<?php
session_start();

require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
//creamos la consulta
$SQL = $conex->prepare ("SELECT * FROM medidas" );
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
    <title>Lista de medidas</title>
    <link href="../../../img1/logo9.png" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <a class="btn btn success" href="../index.php" style="margin-left: 3.6%; margin-top:3%; position:absolute;">  
    <i class="bi bi-chevron-left" style="padding:10px 14px 10px 10px; color:#fff; font-size:15px; background-color:#0d6efd; border-radius:10px;"> REGRESAR</i>
    </a>

    <br>
    <a class="btn btn success" style="margin-left: 90%; margin-top:0%;" href="../excel/excel_medidas.php">  
    <i class="bi bi-file-earmark-excel" style="padding:10px 10px 10px 10px; border-radius:10px; color:#fff; font-size:15px; background-color:#198754;">EXCEL</i>
    </a>
    <br>

    <a  class="btn btn success" href="../fehora.php" style="margin-left: 88%; margin-top:1%;">  
    <i class="bi bi-printer" style="padding:10px 16px 10px 16px; border-radius:10px; color:#fff; font-size:15px; background-color:#E00000;">  IMPRIMIR</i>
    </a>
    <!--creamos la tabla-->
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
                <!-- <th>Edad</th> -->
                <th colspan="2">ACCION</th>
               
            </tr>
        </thead>

        <?php
        foreach ($resul as $usu) {
            //se abre el ciclo con la llave
        ?>
            <!--El td sirve para sirve para crear las columnas-->
            <!--En cada td se va a mostrar los datos de una tabla usando variables por ejemplo: $variable['nombre del campo de la tabla que queremos que se vea']-->
            <tr>
               
                <td><?= $usu['doc_cliente'] ?></td>    
                <td><?= $usu['pecho'] ?></td>
                <td><?= $usu['cintura'] ?></td>
                <td><?= $usu['cadera'] ?></td>
                <td><?= $usu['brazo_izq'] ?></td>
                <td><?= $usu['brazo_der'] ?></td>
                

           
                

                <!--con este metodo GET vamos a poder ver la informacion que estamos enviando-->

                <td>
                    <form method="GET" action="../eliminar/eliminar_medidas.php" >
                        <input type="hidden" name="elimin" value="<?= $usu['doc_cliente'] ?>">
                        <button type="submit" onclick="return confirm('¿Esta seguro de eliminar este usuario?');">Eliminar</button>
                    </form>
                </td>
                <td>
                    <form method=" GET" action="../actualizar/actu_medida.php" >
                        <input type="hidden" name="editar" value="<?= $usu['doc_cliente'] ?>">
                        <button type="submit">Editar</button>
                    </form>
                </td>
                
            </tr>

        <?php
        } //se cierra el recorrido cerrando la llave
        ?>
    </table>


</body>

</html>