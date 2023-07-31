<?php
session_start();
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
session_start();
include("../../../controller/validar.php");
$por_pagina = 5;
if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1;
}
$empieza = ($pagina - 1) * $por_pagina;

//creamos la consulta
$SQL = $conex->prepare("SELECT * FROM usuarios INNER JOIN tip_user ON usuarios.tipo_usuario = tip_user.id_tip_user INNER JOIN genero ON usuarios.genero=genero.id_genero INNER JOIN estado ON usuarios.estado=estado.id_estado ORDER BY documento LIMIT $empieza, $por_pagina");
$SQL->execute();
$resultado1 = $SQL->fetchAll();


?>

<?php
$sql = $conex->prepare("SELECT COUNT(*) FROM usuarios  ORDER BY documento");
$sql->execute();
$resul = $sql->fetchColumn();
$total_paginas = ceil($resul / $por_pagina);
if ($total_paginas == 0) {
    echo "<center>" . 'Lista Vacia' . "</center>";
} else

    echo "<center><a href='t_usu.php?pagina=1'>" . "<i class='fa fa-arrow-left'></i>" . "</a>";
?>
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
    <title>Lista de usuarios</title>
    <link href="../../../img/logo_gym.png" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>

    <a class="btn btn success" href="../index.php" style="margin-left: -45%; margin-top:3%; position:absolute;">
        <i class="bi bi-chevron-left"
            style="padding:10px 14px 10px 10px; color:#fff; font-size:15px; background-color:#0d6efd; border-radius:10px;">
            REGRESAR</i>
    </a>

    <br>
    <a class="btn btn success" style="margin-left: 90%; margin-top:0%;" href="../excel/excel_usu.php">
        <i class="bi bi-file-earmark-excel"
            style="padding:10px 10px 10px 10px; border-radius:10px; color:#fff; font-size:15px; background-color:#198754;">EXCEL</i>
        </button>
        <br>

        <a class="btn btn success" href="../imprimir/imp_usu.php" style="margin-left: 88%; margin-top:1%;">
            <i class="bi bi-printer"
                style="padding:10px 16px 10px 16px; border-radius:10px; color:#fff; font-size:15px; background-color:#E00000;">
                IMPRIMIR</i>
        </a>

        <!--creamos la tabla-->
        <table>
            <!--El tr nos sirve sirve para crear las filas-->
            <!--El th se crea la cabecera-->
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombre Completo</th>
                    <th>usuario</th>
                    <th>Tipo Usuario</th>
                    <th>Genero</th>

                    <th>Estado</th>
                    <th colspan="2">Accion</th>
                </tr>
            </thead>

            <?php
            foreach ($resultado1 as $usu) {
                
                ?>
                <tr>
                    <td>
                        <?= $usu['documento'] ?>
                    </td>
                    <td>
                        <?= $usu['nom_completo'] ?>
                    </td>
                    <td>
                        <?= $usu['usuario'] ?>
                    </td>
                    <td>
                        <?= $usu['nom_tip_user'] ?>
                    </td>
                    <td>
                        <?= $usu['genero'] ?>
                    </td>

                    <td>
                        <?= $usu['estado'] ?>
                    </td>



                    <!--con este metodo GET vamos a poder ver la informacion que estamos enviando-->

                    <td>
                        <form method="GET" action="../eliminar/eliminar_usu.php">
                            <input class="btn btn-primary" type="hidden" name="elimin" value="<?= $usu['documento'] ?>">
                            <button type="submit"
                                onclick="return confirm('¿Esta seguro de eliminar este usuario?');">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <form method=" GET" action="../actualizar/actualizar_clien.php">
                            <input type="hidden" name="editar" value="<?= $usu['documento'] ?>">
                            <button type="submit">Editar</button>
                        </form>
                    </td>
                </tr>

                <?php
            } //se cierra el recorrido cerrando la llave
            ?>
        </table>

        |<div class="text-center" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group me-2" role="group" aria-label="First group" aling>
                <?php
                for ($i = 1; $i <= $total_paginas; $i++) {
                    echo "<a class='btn btn-primary'  href='t_usu.php?pagina=" . $i . "'> " . $i . " </a>";
                }
                echo "<a href='t_usu.php?pagina=$total_paginas'>" . "<i class='fa fa-arrow-right'></i>"
                    . "</a></center>";
                ?>
            </div>
        </div>

</body>

</html>