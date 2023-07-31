<?php
session_start();
require_once ("../barcode/vendor/autoload.php");
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
session_start();
include("../../../controller/validar.php");
//creamos la consulta
$SQL = $conex->prepare ("SELECT * FROM datos" );
$SQL -> execute();
$resul=$SQL->fetchAll();

$por_pagina = 5;
if(isset($_GET['pagina'])){
$pagina = $_GET['pagina'];
}
else
{
$pagina = 1;
}
$empieza = ($pagina - 1) * $por_pagina;
$sql1 = $conex->prepare("SELECT * FROM datos
ORDER BY id_datos LIMIT $empieza, $por_pagina");
$sql1->execute();
$resultado1 = $sql1->fetchAll(PDO::FETCH_ASSOC);

?>

<?php
$sql = $conex->prepare("SELECT COUNT(*) FROM datos  ORDER BY id_datos");
$sql->execute();
$resul = $sql->fetchColumn();
$total_paginas = ceil($resul / $por_pagina);
if ($total_paginas == 0)
{
echo "<center>".'Lista Vacia'."</center>";
} else

echo "<center><a href='tabla_medidas.php?pagina=1'>" . "<i class='fa fa-arrow-left'></i>" . "</a>";
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
    <title>Lista de datos</title>
    <link href="../../../img1/logo9.png" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <a class="btn btn success" href="../index.php" style=" margin-left:-45%; margin-top:3%; position:absolute;">  
    <i class="bi bi-chevron-left" style="padding:10px 14px 10px 10px; color:#fff; font-size:15px; background-color:#0d6efd; border-radius:10px;"> REGRESAR</i>
    </a>

    <br>
    <a class="btn btn success" style="margin-left: 90%; margin-top:0%;" href="../excel/excel_datos.php">  
    <i class="bi bi-file-earmark-excel" style="padding:10px 10px 10px 10px; border-radius:10px; color:#fff; font-size:15px; background-color:#198754;">EXCEL</i>
    </a>
    <br>

    <a class="btn btn success" href="../reporte/repor_datos.php" style="margin-left: 88%; margin-top:1%;">  
    <i class="bi bi-printer" style="padding:10px 16px 10px 16px; border-radius:10px; color:#fff; font-size:15px; background-color:#E00000;">  IMPRIMIR</i>
    </a>
    <!--creamos la tabla-->
    <table>
        <!--El tr nos sirve sirve para crear las filas-->
        <!--El th se crea la cabecera-->
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
                <!-- <th>Edad</th> -->
                <th colspan="2">ACCION</th>

            </tr>
        </thead>

        <?php
        foreach ($resultado1 as $usu) {
            //se abre el ciclo con la llave
        ?>
            <!--El td sirve para sirve para crear las columnas-->
            <!--En cada td se va a mostrar los datos de una tabla usando variables por ejemplo: $variable['nombre del campo de la tabla que queremos que se vea']-->
            <tr>
            
                <td><?= $usu['documentos'] ?></td>    
                <td><?= $usu['peso'] ?></td>
                <td><?= $usu['bmi'] ?></td>
                <td><?= $usu['grasa'] ?></td>
                <td><?= $usu['musculo'] ?></td>
                <td><?= $usu['agua'] ?></td>
                <td><?= $usu['grasa_v'] ?></td>
                <td><?= $usu['hueso'] ?></td>
                <td><?= $usu['metabo'] ?></td>
                <td><?= $usu['proteina'] ?></td>
                <td><?= $usu['obesidad'] ?></td>
                

            
                

                <!--con este metodo GET vamos a poder ver la informacion que estamos enviando-->

                <td>
                    <form method="GET" action="../eliminar/eliminar_datos.php" >
                        <input type="hidden" name="elimin" value="<?= $usu['documentos'] ?>">
                        <button type="submit" onclick="return confirm('¿Esta seguro de eliminar este usuario?');">Eliminar</button>
                    </form>
                </td>
                <td>
                    <form method="GET" action="../actualizar/actu_dato.php" >
                        <input type="hidden" name="editar" value="<?= $usu['documentos'] ?>">
                        <button type="submit">Editar</button>
                    </form>
                </td>
                
            </tr>

        <?php
        } //se cierra el recorrido cerrando la llave
        ?>
    </table>
    <br>
        <div class="text-center" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group" aling>
                    <?php
                    for ($i = 1; $i <= $total_paginas; $i++) {
                        echo "<a class='btn btn-primary'  href='tabla_datos.php?pagina=" . $i . "'> " . $i . " </a>";
                    }
                    echo "<a href='tabla_datos.php?pagina=$total_paginas'>" . "<i class='fa fa-arrow-right'></i>"
                        . "</a></center>";
                    ?>
                </div>
            </div>

</body>

</html>