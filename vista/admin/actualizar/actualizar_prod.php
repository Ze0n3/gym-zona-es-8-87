<?php
require_once("../../../base_datos/bd.php");
$cone = new Database();
$conex = $cone->conectar();
include("../../controller/validar.php");

$editar = $_GET['editar'];

$validar = $conex->prepare("SELECT * FROM productos where id_producto='$editar'");
$validar->execute();
$queryi = $validar->fetch();

    if ((isset($_POST["validar_V"])) && ($_POST["validar_V"] == "user")) {
    $n_producto = $_POST['n_producto']; 
    $precio = $_POST['precio'];
    $c_inicial = $_POST['c_inicial'];
    

    if ($n_producto == "" || $precio == "" || $c_inicial == "" ) {
        
        echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
        echo '<script>window.location="actualizar_prod.php"</script>';
    } else if ($queryi) {
        echo '<script>alert ("DOCUMENTO O USUARIO EXISTEN // CAMBIELOS//");</script>';
        echo 'script>windows.location="actualizar_prod.php"</script>';
    } else {
        $insertsql = $conex->prepare ("UPDATE productos SET nom_producto='$n_producto', precio='$precio', can_inicial='$c_inicial' WHERE id_producto='$editar'");
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

    <title>Actualizar Productos</title>

    <link href="../../img1/logo9.png" rel="icon">
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
                    <div class="col-lg-8" style="margin-top:40px;">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Actualizar productos</h1>
                            </div>
                            <form class="user">
                                <div class="form-group row">
                                    
                                    <div class="col-sm-6">
                                    <label>Nombre del producto</label>
                                    <input type="text" class="form-control" id="exampleFirstName" name="n_producto" value="<?php echo $queryi['nom_producto'] ?>">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Precio</label>
                                        <input type="number" title="Solo se aceptan numeros" class="form-control" id="exampleFirstName" name="precio"
                                        value="<?php echo $queryi['precio'] ?>" oninput="maxlengthNumber(this);">
                                    </div>
                                    <div class="col-sm-6">
                                    <label>Cantidad inicial</label>
                                        <input type="number" min=0 class="form-control" id="exampleLastName" name="c_inicial" title="Solo se aceptan numeros" 
                                        value="<?php echo $queryi['can_inicial'] ?>"  oninput="maxlengthNumber(this);">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Cantidad final </label>
                                        <input type="number" class="form-control" id="exampleFirstName" name="c_final"
                                        value="<?php echo $queryi['can_final'] ?>"  oninput="maxlengthNumber(this);">
                                    </div>
                                    
                                   
                                </div>
                                
                                <input type="submit" class="btn btn-primary btn-block" name="Suscribir">
                                <input type="hidden" name="validar_V" value="user">
                            </form>
                             <!-- SOLO NUMERO,LONGITUD -->
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