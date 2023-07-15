<?php
require_once("../../../base_datos/bd.php");
$cone = new Database();
$conex = $cone->conectar();
session_start();
?>

<?php

$control = $conex->prepare("SELECT * From venta_serv ");
$control->execute();
$query = $control->fetch();


$control1 = $conex->prepare("SELECT * From usuarios where tipo_usuario = 3");
$control1->execute();
$query1 = $control1->fetch();



date_default_timezone_set('America/Bogota');
$fechaActual = date('Y-m-d');
$hora = date(" H:i:s");



?>

<?php

$tipo_s = $conex->prepare("SELECT * From tip_servicio WHERE id_tip_serv > 1");
$tipo_s->execute();
$resp = $tipo_s->fetch();

?>


<?php
if (isset($_GET["validar_V"])) {
    $cedula_u =  $_SESSION['docu'];
    $cedula_c = $_GET['clien'];
    $tip_serv = $_GET['tip_serv'];
    $v_fecha = $_GET['v_fecha'];
    $precio = $_GET['precio'];


    $insertsql2 = $conex->prepare("INSERT INTO venta_serv(fecha_ini, doc_coach, doc_cliente, id_tip_servi,fecha_fin, valor) VALUES ('$fechaActual','$cedula_u','$cedula_c','$tip_serv','$fin','$precio')");
    $insertsql2->execute();
    echo '<script>alert ("VENTA REALIZADA // SE LE VENDE = ");</script>';
    echo '<script>window.location="./venserv.php"</script>';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Venta de servicio</title>

    <link href="../../../img1/logo9.png" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <?php
    if (isset($_GET['consul'])) {

        $tip_serv = $_GET['tip_serv'];
        $ven = $_GET['fecha'];

        if ( $tip_serv == "" || $ven == "" || $_GET['cli'] == "") {

            echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
            echo '<script>window.location="./venserv.php"</script>';
        }
        else {
            $cli = $_GET['cli'];
            $ve = $_GET['fecha'];
            $fin = date("Y-m-d", strtotime($fechaActual . "+ $ve days"));

            $tipo = $conex->prepare("SELECT * From tip_servicio WHERE id_tip_serv = " . $_GET['tip_serv'] . " ");
            $tipo->execute();
            $re = $tipo->fetch();

            $consu = $conex->prepare("SELECT * FROM usuarios WHERE documento = '$cli' AND tipo_usuario = 3");
            $consu ->execute();
            $ho = $consu->fetch();
        
            if($ho && $cli){
                $total=$re['precio']*$ve;

        ?>
            <a class="btn btn success" href="../index.php" style="margin-left: 3.6%; margin-top:3%; position:absolute;">
        <i class="bi bi-chevron-left"
            style="padding:10px 14px 10px 10px; color:#fff; font-size:15px; background-color:#0d6efd; border-radius:10px;">
            REGRESAR</i>
    </a><br>
    <form method="get">
            <div class="container">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                            <div class="col-lg-8">
                                <div class="p-5" style="margin-top:12%;">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Venta Servicios</h1>
                                    </div> 
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>nombre del cliente</label>
                                                <h2 name="clien" value="<?php echo $cli ?>"><?php echo $ho['nom_completo'] ?></h2>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>Precio del servicio</label>
                                                <h2 name="precio" value="<?php echo ($total) ?>"><?php echo ($total) ?></h2>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>Fecha de vencimiento</label>
                                                <h2 name="v_fecha" value="<?php echo $fin; ?>"><?php echo $fin; ?></h2>
                                            </div>
                                            <input type="hidden" name="docum">
                                            <button type="submit" name="validar_V" class="btn btn-primary btn-block">INGRESAR</button>
                                            <hr>
                                        </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }else {
            echo '<script>alert ("NO HAY NINGUN CLIENTE CON ESE NUMERO DE DOCUMENTO ");</script>';
    echo '<script>window.location="./venserv.php"</script>';
            }
            }
        }
 else {
            ?>
            <a class="btn btn success" href="../index.php" style="margin-left: 3.6%; margin-top:3%; position:absolute;">
        <i class="bi bi-chevron-left"
            style="padding:10px 14px 10px 10px; color:#fff; font-size:15px; background-color:#0d6efd; border-radius:10px;">
            REGRESAR</i>
    </a><br>
            <form method="get">
            <div class="container">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                            <div class="col-lg-8">
                                <div class="p-5" style="margin-top:12%;">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Venta Servicios</h1>
                                    </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>Documento del cliente</label>
                                                <input type="number" name="cli"  pattern="(?=.*\e)[0-9]{6,10}" title="Solo se aceptan numeros" maxlength="10" oninput="maxlengthNumber(this);" class="form-control " id="exampleFirstName"  required>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>Fecha de suscripcion</label>
                                                <h2 name="s_fecha" value=""><?php echo $fechaActual; ?></h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Dia de servicio</label>
                                                <input type="text" class="form-control" id="exampleLastName" name="fecha" placeholder="dias  de servicios" maxlength="4" title="Solo se aceptan numeros">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="label">Tipos de servicio</label>
                                                <select name="tip_serv" class="form-control" id="exampleFirstName">
                                                    <option value="">Seleccione...</option>
                                                    <?php
                                                    do {
                                                    ?>
                                                        <option value="<?php echo ($resp['id_tip_serv']) ?>"> <?php echo ($resp['servicio']) ?> </option>
                                                    <?php
                                                    } while ($resp = $tipo_s->fetch());
                                                    ?>
                                                </select>
                                            </div>
                                            <input type="hidden" name="consul" value="<?php echo $ho['documento']?>">
                                            <button type="submit" class="btn btn-primary btn-block">CONSULTAR</button>
                                        <?php
                                    }
                                        ?>

                                    </form>
                                    <script>
                                        function maxlengthNumber(obj) {
                                            console.log(obj.value);
                                            if (obj.value.length > obj.maxLength) {
                                                obj.value = obj.value.slice(0, obj.maxLength);
                                            }
                                        }
                                    </script>
                                    <hr>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

</body>

</html>