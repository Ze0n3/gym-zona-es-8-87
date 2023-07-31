<?php
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
include("../../controller/validar.php");

$editar = $_GET['editar'];

$con = $conex->prepare("SELECT * FROM datos INNER JOIN usuarios ON datos.documentos = usuarios.documento WHERE documentos='$editar'");
$con -> execute();
$fila = $con-> fetch();
?>

<?php
    if ((isset($_POST["validar_V"])) && ($_POST["validar_V"] == "user")) {

    $cedula = $_POST['nombre'];
    $peso= $_POST['peso'];
    $bmi= $_POST['bmi'];
    $grasa= $_POST['grasa'];
    $musculo= $_POST['musculo'];
    $agua= $_POST['agua'];
    $grasa_v= $_POST['grasa_v'];
    $hueso= $_POST['hueso'];
    $metabo= $_POST['metabo'];
    $proteina= $_POST['proteina'];
    $obesidad= $_POST['obesidad'];
    $fecha= $_POST['fecha'];

    // $estado = $_POST['estado'];

    $validar1 = $conex->prepare("SELECT * FROM datos WHERE documentos='$editar'");
    $validar1->execute();
    $queryi1 = $validar1->fetch();

    if ($cedula == "" || $peso == ""|| $bmi == ""|| $grasa == ""|| $musculo == ""|| $agua == ""|| $grasa_v == ""|| $hueso == ""|| $metabo == ""|| $proteina == ""|| $obesidad == ""|| $fecha == "" ) {
        
        echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
        echo '<script>window.location="actu_dato.php"</script>';

    } else if (!$queryi1) {
      
        echo '<script>alert ("LOS DATOS INGRESADOS SON INCORRECTOS");</script>';
        echo '<script>windows.location="actu_dato.php"</script>';
    } 
     else {
        $insertsql3= $conex->prepare ("UPDATE datos SET peso='$peso', bmi='$bmi',grasa='$grasa', musculo='$musculo', agua='$agua', grasa_v='$grasa_v', hueso='$hueso', metabo='$metabo', proteina='$proteina', obesidad='$obesidad', fecha_regi='$fecha' WHERE documentos='$editar'");
        $insertsql3->execute();
        echo '<script>alert ("ACTUALIZACION EXITOSA");</script>';
        echo '<script>window.location="../tablas/tabla_datos.php"</script>';
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

    <title>Actualizacion datos</title>

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
<a class="btn btn success" href="../tablas/tabla_datos.php" style="margin-left: 3.6%; margin-top:0%; position:absolute;">  
    <i class="bi bi-chevron-left" style="padding:10px 14px 10px 10px; color:#fff; font-size:15px; background-color:#0d6efd; border-radius:10px;"> REGRESAR</i>
    </a>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Actualizacion de Datos</h1>
                            </div>
                            <form class="user" name="user" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label>Nombre del Cliente </label>
                                        <input type="text" style="margin-bottom:10px;" class="form-control" id="exampleFirstName"  name="nombre" value="<?php echo $fila['nom_completo'] ?>" required>
                                    </div>
                                    <div class="col-sm-4" style="margin-bottom:10px;">
                                    <label>Peso</label>
                                        <input type="number" min="1" class="form-control" id="exampleLastName" name="peso" maxlength="4" oninput="maxlengthNumber(this);"
                                            placeholder="peso" title="Solo se aceptan numeros" required>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>BMI </label>
                                        <input type="number" min="1" style="margin-bottom:10px;" class="form-control"  maxlength="4" oninput="maxlengthNumber(this);"id="exampleFirstName" name="bmi"
                                            placeholder="bmi" title="Solo se aceptan numeros" required>
                                    </div>
                                   
                                    <div class="col-sm-4">
                                    <label>Grasa </label>
                                        <input type="number" min="1" style="margin-bottom:10px;" class="form-control" maxlength="4" oninput="maxlengthNumber(this);" id="exampleFirstName" name="grasa"
                                            placeholder="grasa" title="Solo se aceptan numeros" required>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Musculo </label>
                                        <input type="number" min="1" style="margin-bottom:10px;" class="form-control" maxlength="4" oninput="maxlengthNumber(this);" id="exampleLastName" name="musculo"
                                            placeholder="musculo" title="Solo se aceptan numeros" required>
                                    </div>
                                    <div class="col-sm-4 ">
                                    <label>Agua </label>
                                        <input type="number" min="1" style="margin-bottom:10px;" class="form-control" maxlength="4" oninput="maxlengthNumber(this);" id="exampleFirstName" name="agua"
                                            placeholder="agua" title="Solo se aceptan numeros" required>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Grasa_V </label>
                                        <input type="number" min="1" style="margin-bottom:10px;" class="form-control" maxlength="4" oninput="maxlengthNumber(this);" id="exampleLastName" name="grasa_v"
                                            placeholder="grasa_v" title="Solo se aceptan numeros" required> 
                                    </div>                    

                                    <div class="col-sm-4 ">
                                        <label>Hueso</label>
                                        <input type="number" min="1" style="margin-bottom:10px;" class="form-control" maxlength="4" oninput="maxlengthNumber(this);" id="exampleFirstName" name="hueso"
                                            placeholder="hueso" title="Solo se aceptan numeros" required>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Metabo </label>
                                        <input type="number" min="1" style="margin-bottom:10px;" class="form-control" maxlength="4" oninput="maxlengthNumber(this);" id="exampleFirstName" name="metabo"
                                            placeholder="matabo" title="Solo se aceptan numeros" required>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Proteina </label>
                                        <input type="number" min="1" style="margin-bottom:10px;" class="form-control" maxlength="4" oninput="maxlengthNumber(this);" id="exampleFirstName" name="proteina"
                                            placeholder="proteina" title="Solo se aceptan numeros" required>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label>Obesidad </label>
                                        <input type="number" min="1" style="margin-bottom:10px;" class="form-control" maxlength="4" oninput="maxlengthNumber(this);" id="exampleFirstName" name="obesidad"
                                            placeholder="obesidad" title="Solo se aceptan numeros" required>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label>Fecha: </label>
                                            <input type="date" class="form-control" id="exampleFirstName" name="fecha">
                                    </div>      


                                    
        
                                </div>

                                <!-- SOLO NUMERO,LONGITUD -->
                                <script>
                                    function maxlengthNumber(obj) {
                                        console.log(obj.value);
                                        if (obj.value.length > obj.maxLength) {
                                            obj.value = obj.value.slice(0, obj.maxLength);
                                        }
                                    }
                                </script>
                                
                                <input type="submit" class="btn btn-primary btn-block" name="enviar">
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