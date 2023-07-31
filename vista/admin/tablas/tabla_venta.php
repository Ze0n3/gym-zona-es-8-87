<?php
session_start();
include("../../../controller/validar.php");
$daba = new Database();
$conex = $daba->conectar();
session_start();
//creamos la consulta


$por_pagina = 5;
if(isset($_GET['pagina'])){
$pagina = $_GET['pagina'];
}
else
{
$pagina = 1;
}
$empieza = ($pagina - 1) * $por_pagina;
$sql1 = $conex->prepare("SELECT
(SELECT nom_completo FROM usuarios WHERE documento = venta.doc_coach) AS nombre_coach,
venta.id_venta,
venta.fecha,
venta.hora,
venta.total,
productos.nom_producto,
det_venta.cantidad,
usuarios.nom_completo
FROM venta
INNER JOIN usuarios ON usuarios.documento = venta.doc_cliente
INNER JOIN det_venta ON venta.id_venta = det_venta.id_venta
INNER JOIN productos ON productos.id_producto = det_venta.id_productos
 LIMIT $empieza, $por_pagina");
$sql1->execute();
$resultado1 = $sql1->fetchAll();

?>

<?php
$sql = $conex->prepare("SELECT COUNT(*) FROM venta  ORDER BY id_venta");
$sql->execute();
$resul = $sql->fetchColumn();
$total_paginas = ceil($resul / $por_pagina);
if ($total_paginas == 0)
{
echo "<center>".'Lista Vacia'."</center>";
} else

echo "<center><a href='tabla_venta.php?pagina=1'>" . "<i class='fa fa-arrow-left'></i>" . "</a>";
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
    <title>Lista de ventas</title>
    <link href="../../../img1/logo9.png" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <a class="btn btn success" href="../index.php" style="margin-left: 3.6%; margin-top:3%; position:absolute;">  
    <i class="bi bi-chevron-left" style="padding:10px 14px 10px 10px; color:#fff; font-size:15px; background-color:#0d6efd; border-radius:10px;"> REGRESAR</i>
    </a>

    <br>
    <a class="btn btn success" style="margin-left: 90%; margin-top:0%;" href="../excel/excel_horario.php">  
    <i class="bi bi-file-earmark-excel" style="padding:10px 10px 10px 10px; border-radius:10px; color:#fff; font-size:15px; background-color:#198754;">EXCEL</i>
    </a>
    <br>

    <a  class="btn btn success" href="../reporte/repor_venta.php" style="margin-left: 88%; margin-top:1%;">  
    <i class="bi bi-printer" style="padding:10px 16px 10px 16px; border-radius:10px; color:#fff; font-size:15px; background-color:#E00000;">  IMPRIMIR</i>
    </a>
    <!--creamos la tabla-->
    <table>
        <!--El tr nos sirve sirve para crear las filas-->
        <!--El th se crea la cabecera-->
        <thead>
            <tr>
                <th>FACTURA</th>
                <th>NOMBRE DEL COACH</th>
                <th>NOMBRE DEL CLIENTE</th>
                <th>PRODUCTOS</th>
                <th>CANTIDAD</th>
                <th>FECHA</th>
                <th>HORA</th>
                <th>TOTAL</th>
                

            </tr>
        </thead>

        <?php
        foreach ($resultado1 as $usu) {
            //se abre el ciclo con la llave
        ?>
            <!--El td sirve para sirve para crear las columnas-->
            <!--En cada td se va a mostrar los datos de una tabla usando variables por ejemplo: $variable['nombre del campo de la tabla que queremos que se vea']-->
            <tr>
            
                <td><?= $usu['id_venta'] ?></td>
                <td><?= $usu['nombre_coach'] ?></td>
                <td><?= $usu['nom_completo'] ?></td>
                <td><?= $usu['nom_producto'] ?></td>
                <td><?= $usu['cantidad'] ?></td>
                <td><?= $usu['fecha'] ?></td>
                <td><?= $usu['hora'] ?></td>
                <td><?= $usu['total'] ?></td>

            
                

                <!--con este metodo GET vamos a poder ver la informacion que estamos enviando-->

                
                
            </tr>

        <?php
        } //se cierra el recorrido cerrando la llave
        ?>
    </table>

        |<div class="text-center" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group" aling>
                    <?php
                    for ($i = 1; $i <= $total_paginas; $i++) {
                        echo "<a class='btn btn-primary'  href='tabla_venta.php?pagina=" . $i . "'> " . $i . " </a>";
                    }
                    echo "<a href='tabla_venta.php?pagina=$total_paginas'>" . "<i class='fa fa-arrow-right'></i>"
                        . "</a></center>";
                    ?>
                </div>
            </div>

</body>

</html>