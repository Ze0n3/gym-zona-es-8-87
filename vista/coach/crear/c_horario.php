<?php
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
?>


<?php
$control1 = $conex->prepare("SELECT * From ejercicio WHERE id_ejercicio >= 1");
$control1->execute();
$query1 = $control1->fetch();

$control2 = $conex->prepare("SELECT * From usuarios WHERE tipo_usuario = 2");
$control2->execute();
$query2 = $control2->fetch();

$control3 = $conex->prepare("SELECT * From dia");
$control3->execute();
$query3 = $control3->fetch();

    if ((isset($_POST["validar_V"])) && ($_POST["validar_V"] == "user")) {
    $dia = $_POST['dia'];
    $hora= $_POST['h_hora'];
    $eje= $_POST['eje'];
    $docu= $_POST['docu'];

    if ($dia == "" ||$hora == "" ||$eje == "" ||$docu == "" ) {
        
        echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
        echo '<script>window.location="c_horario.php"</script>';

    } else {
       
        $insertsql2 = $conex->prepare ("INSERT INTO horario(dia,hora,ejercicio,doc_coach) VALUES ('$dia','$hora','$eje','$docu')");
        $insertsql2->execute();
        echo '<script>alert ("REGISTRO EXITOSO");</script>';
        echo '<script>window.location="c_horario.php"</script>';
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

    <title>Crear horario</title>

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
                                <br></br>
                                
                                <h1 class="h4 text-gray-900 mb-4">Crear horario</h1>
                            </div>
                            <br>
                            <form class="user" name="user" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="label">Dia del horario</label>
                                        <select name="dia" class="form-control " id="exampleFirstName">
                                            <option value="">Seleccione el dia...</option>
                                            <?php
                                            do {
                                            ?>
                                             <option value="<?php echo ($query3['id_dia']) ?>"> <?php echo ($query3['nom_dia']) ?> </option> 
                                            <?php
                                             } while ($query3 = $control3->fetch());
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                    <br>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="label">Hora</label>
                                        <input type="time" class="form-control form-control-user" id="exampleFirstName" name="h_hora">
                                    </div>
                                    <br>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="label">Tipo de servicio</label>
                                        <select name="eje" class="form-control " id="exampleFirstName">
                                            <option value="">Seleccione el tipo de ejercicio...</option>
                                            <?php
                                            do {
                                            ?>
                                             <option value="<?php echo ($query1['id_ejercicio']) ?>"> <?php echo ($query1['nom_ejercicio']) ?> </option> 
                                            <?php
                                             } while ($query1 = $control1->fetch());
                                            ?>
                                        </select>
                                    </div>
                                    <br>

                                    <div class="col-sm-6">
                                        <label class="label">Documento del coach</label>
                                        <select name="docu" class="form-control " id="exampleFirstName">
                                            <option value="">Seleccione el documento del coach...</option>
                                            <?php
                                            do {
                                            ?>
                                             <option value="<?php echo ($query2['documento']) ?>"> <?php echo ($query2['nom_completo']) ?> </option> 
                                            <?php
                                             } while ($query2 = $control2->fetch());
                                            ?>
                                        </select>
                                    </div>
                                    <br>

                                <br>
                                <br>
                                <input type="submit" class="btn btn-primary btn-user btn-block" name="Suscribir">
                                <br></br>
                                <input type="hidden" name="validar_V" value="user">
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