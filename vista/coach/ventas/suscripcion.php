<?php

//conexion con pdo
require_once("../../../base_datos/bd.php");
$daba = new database();
$con = $daba ->conectar();
session_start();
include("../../../controller/validar.php");
?>

<?php
    if (isset($_POST["validar_V"])) {

    $doc_c = $_SESSION['docu'];
    $doc_cl= $_POST['docum'];  
    $s_fecha = $_POST['s_fecha']; 
    $v_fecha = $_POST['v_fecha'];
    $precio= $_POST['precio'];


    if ($s_fecha == "" || $v_fecha == "" || $precio == "" ) {
        
        echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
        echo '<script>window.location="./suscripcion.php"</script>';
    } else {
        
        $insertsql = $con->prepare ("INSERT INTO suscripcion(fecha_ini,fecha_venc,doc_coach,doc_cliente,precio) VALUES ('$s_fecha','$v_fecha','$doc_c','$doc_cl','$precio')");
        $insertsql->execute();
        echo '<script>alert ("SUSCRIPCION EXITOSA");</script>';
        echo '<script>window.location="./suscripcion.php"</script>';
    }
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

    <title>Suscripciones</title>

    <link href="../../../img1/logo9.png" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
<a class="btn btn success" href="../index.php" style="margin-left: 3.6%; margin-top:0%; position:absolute;">  
    <i class="bi bi-chevron-left" style="padding:10px 14px 10px 10px; color:#fff; font-size:15px; background-color:#0d6efd; border-radius:10px;"> REGRESAR</i>
    </a>
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-8">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Suscripciones </h1>
                            </div>
                            <form class="user" method="post" name="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Documento del cliente</label>
                                        <input type="number" class="form-control " id="exampleFirstName" name="doc_cli" >
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="hidden" name="docu" >
                                        <button type="submit"  name="consul" class="btn btn-primary btn-user btn-block">Consultar</button>
                                    </div>
                                    <?php

                                    if (isset($_POST['consul'])){

                                        
                                    
                                    if ($_POST['doc_cli'] == "") {
        
                                        echo '<script>alert ("INGRESE EL NUMERO DE DOCUMENTO DEL CLIENTE");</script>';
                                        echo '<script>window.location="./suscripcion.php"</script>';
                                    
                                    }else{

                                        $cli = $_POST['doc_cli'];

                                        $consu = $con->prepare("SELECT * FROM usuarioS WHERE documento = '$cli' AND tipo_usuario = 3");
                                        $consu ->execute();
                                        $ho = $consu->fetchAll();

                                        if($ho){
                                            date_default_timezone_set('America/Bogota');
                                            $fechaActual = date ('Y-m-d' );
                                            $fin = date("Y-m-d",strtotime($fechaActual."+ 30 days")); 

                                    ?>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Documento del cliente</label>
                                        <h3><?php echo $cli ?></h3>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Fecha de suscripcion</label>
                                        <input type="text" class="form-control " id="exampleFirstName" name="s_fecha" value="<?php echo $fechaActual; ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Fecha de vencimiento</label>
                                        <input type="text" class="form-control " id="exampleLastName" name="v_fecha" value="<?php echo $fin ?>" >
                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Precio de la suscripcion</label>
                                        <input type="number" class="form-control" id="exampleLastName" name="precio" value="">
                                    </div>
                                </div>
                                
                                <input type="hidden" name="docum" value="<?php echo $cli ?>">
                                <button type="submit"  name="validar_V" class="btn btn-primary btn-user btn-block">INGRESAR</button>
                            </form>
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
<?php
}
else {
    echo '<script>alert ("NO HAY NINGUN CLIENTE CON ESE NUMERO DE DOCUMENTO");</script>';
    echo '<script>window.location="./suscripcion.php"</script>';
    }
    }
}

?>
