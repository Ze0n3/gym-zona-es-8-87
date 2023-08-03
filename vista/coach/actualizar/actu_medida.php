<?php
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
session_start();
include("../../../controller/validar.php");

$editar = $_GET['editar'];

$con = $conex->prepare("SELECT * FROM medidas INNER JOIN usuarios ON medidas.doc_cliente = usuarios.documento WHERE doc_cliente='$editar'");
$con -> execute();
$fila = $con-> fetch();

?>

<?php
    if ((isset($_POST["validar_V"])) && ($_POST["validar_V"] == "user")) {
    $cedula = $_POST['name'];
    $pecho= $_POST['pecho'];
    $cintura= $_POST['cintura'];
    $cadera= $_POST['cadera'];
    $brazoiz= $_POST['brazo_izq'];
    $brazodr= $_POST['brazo_der'];


    $validar = $conex->prepare("SELECT * FROM medidas WHERE doc_cliente='$editar'");
    $validar->execute();
    $queryi = $validar->fetch();

    if ($pecho == "" ||$cintura == "" ||$cadera == "" ||$brazoiz == "" || $brazodr == "" ) {
        
        echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
        echo '<script>window.location="actu_medida.php"</script>';

    }else {
       
        
        $insertsql = $conex->prepare ("UPDATE medidas SET pecho='$pecho', cintura='$cintura', cadera='$cadera', brazo_izq='$brazoiz', brazo_der='$brazodr' WHERE doc_cliente='$editar'");
        $insertsql->execute();
        echo '<script>alert ("ACTUALIZACION EXITOSA");</script>';
        echo '<script>window.location="../tablas/tabla_medidas.php"</script>';
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

    <title>Actualizacion Medidas</title>

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

<a class="btn btn success" href="../tablas/tabla_medidas.php" style="margin-left: 3.6%; margin-top:0%; position:absolute;">  
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
                                
                                <h1 class="h4 text-gray-900 mb-4">Actualizacion Medidas </h1>
                            </div>
                            
                            <form class="user" name="user" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="label">Nombre del cliente</label>
                                        <input type="text" class="form-control" id="exampleFirstName" name="name" value="<?php echo $fila['nom_completo'] ?>">
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="label">Pecho</label>
                                        <input type="number" min="0" class="form-control" id="exampleFirstName" name="pecho" maxlength="4" oninput="maxlengthNumber(this);"
                                            placeholder="Pecho" title="Solo se aceptan numeros"  required>
                                    </div>
                                    

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="label">Cintura</label>
                                        <input type="number" min="0" class="form-control" id="exampleFirstName" name="cintura" maxlength="4" oninput="maxlengthNumber(this);"
                                            placeholder="Cintura" title="Solo se aceptan numeros"  required>
                                    </div>
                                    <br>

                                    <div class="col-sm-6">
                                        <label class="label">Cadera</label>
                                        <input type="number" min="0" class="form-control" id="exampleLastName" name="cadera" maxlength="4" oninput="maxlengthNumber(this);"
                                            placeholder="Cadera" title="Solo se aceptan numeros"  required>
                                    </div>
                                    <br>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="label">Brazo Izquierdo</label>
                                        <input type="text" min="0" class="form-control" id="exampleFirstName" name="brazo_izq" maxlength="4" oninput="maxlengthNumber(this);"
                                            placeholder="Brazo izquierdo" title="Solo se aceptan numeros"  required>
                                    </div>
                                    <br>
                                    <div class="col-sm-6">
                                        <label class="label">Brazo Derecho</label>
                                        <input type="text" min="0" class="form-control" id="exampleLastName" name="brazo_der" maxlength="4" oninput="maxlengthNumber(this);"
                                            placeholder="Brazo derecho" title="Solo se aceptan numeros"  required>
                                   
                                    </div>

                                </div>    

                                <script>
                                    function maxlengthNumber(obj) {
                                        console.log(obj.value);
                                        if (obj.value.length > obj.maxLength) {
                                            obj.value = obj.value.slice(0, obj.maxLength);
                                        }
                                    }
                                </script>
                                
                                <input type="submit" class="btn btn-primary btn-block" name="Suscribir">
                                
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