<?php
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
session_start();
include("../../../controller/validar.php");

$control1 = $conex->prepare("SELECT * From usuarios WHERE tipo_usuario = 2");
$control1->execute();
$query1 = $control1->fetch();

    if (isset($_POST["validar_V"]))  {
    $nombre= $_POST['nombre'];
    $canti= $_POST['canti'];
    $valor= $_POST['valor'];
    $codi= $_POST['randomNumber'];


    if ($codi == "" ||$nombre == "" ||$canti == "" ||$valor == "" ) {
        
        echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
        echo '<script>window.location="new_p.php"</script>';

    } else {
       
        $insertsql2 = $conex->prepare ("INSERT INTO productos(id_producto,cod_producto,nom_producto,precio,can_inicial,docu_ingre) VALUES ('$codi','$codi','$nombre','$valor','$canti','".$_SESSION['docu']."')");
        $insertsql2->execute();
        echo '<script>alert ("PRODUCTO AGREGADO EXITOSAMENTE");</script>';
        echo '<script>window.location="new_p.php"</script>';
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

    <title>Productos</title>

    <link href="../../../img/logo_gym.png"  rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body class="bg-gradient-primary">
<a class="btn btn success" href="../index.php" style="margin-left: 3.6%; margin-top:3%; position:absolute;">
        <i class="bi bi-chevron-left"
            style="padding:10px 14px 10px 10px; color:#fff; font-size:15px; background-color:#0d6efd; border-radius:10px;">
            REGRESAR</i>
    </a><br>
    <form class="user" name="user" method="post" autocomplete="off">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-8">
                        <div class="p-5">
                            <div class="text-center">
                                <br>
                                <h1 class="h4 text-gray-900 mb-4">Agregar Productos</h1>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="label">Nombre del Producto</label>
                                        <input type="text" class="form-control" id="exampleLastName" pattern="[A-Za-z].{1,15}"  title="Solo se pueden ingresar letras" name="nombre" maxlength="15" oninput="validarletras(this);" onkeypress="return(sololetras(event));" required
                                        >
                                    </div>
                                    <br>
                                    <div class="col-sm-6">
                                    <label class="label">Codigo del Producto</label>
                                        <input type="number" id="randomNumberInput" maxlength="20" onkeypress="return(solonumeros(event));"  name="randomNumber" class="form-control" readonly required >
                                            <script>
                                            function generateRandomNumber() {
                                                
                                                var randomNumber = Math.random(9999999999) * 9999999999999999;

                                                // Asigna el número aleatorio al input
                                                document.getElementById('randomNumberInput').value = randomNumber;
                                            }
                                            </script>
                                        </div>

                                    <div class="col-sm-6">
                                        <label class="label">Cantidad Inicial</label>
                                        <input type="number" class="form-control" min="0" pattern="(?=.*\e){1,3}" title="No se admiten letras" id="exampleFirstName" name="canti"
                                        maxlength="3" oninput="maxlengthNumber(this);" required>
                                    </div>
                                    <br>
                                    <div class="col-sm-6 mb-9 mb-sm-0">
                                        <label class="label">Valor de Producto</label>
                                        <input type="number" class="form-control" min="0" id="exampleLastName" name="valor" pattern="(?=.*\e){6,7}" title="No se admite un valor de menos de 6 dijitos" maxlength="7" oninput="maxlengthNumber(this);" required
                                        >
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

                                        <!-- LONGITUD DE LETRA -->
                                        <script>
                                            function validaletras(obj) {
                                                console.log(obj.value);
                                                if (obj.value.length > obj.maxLength) {
                                                    obj.value = obj.value.slice(0, obj.maxLength);
                                                }
                                            }
                                        </script>

                                        <!-- SOLO LETRA (ESPACIO DE LETRAS SE HACE EN LETRAS) -->
                                        <script>
                                            function sololetras(e) {
                                                key = e.keyCode || e.which;

                                                teclado = String.fromCharCode(key).toLowerCase();

                                                letras = "qwertyuiopasdfghjklñzxcvbnm ";

                                                especiales = "8-37-38-46-164-46";

                                                teclado_especial = false;

                                                for (var i in especiales) {
                                                    if (key == especiales[i]) {
                                                        teclado_especial = true;
                                                        break;
                                                    }
                                                }

                                                if (letras.indexOf(teclado) == -1 && !teclado_especial) {
                                                    return false;
                                                    a
                                                }
                                            }
                                        </script>

                                        <script>
                                            $(function() {
                                            $('input[type=number]').keypress(function(key) {
                                                if(key.charCode < 48 || key.charCode > 57) return false;
                                            });
                                        });

                                        </script>
                                <br></br>
                                
                                <input type="submit" class="btn btn-primary btn-block" name="Suscribir" style="margin-top:14px;">
                                <br></br>
                                <input type="hidden" name="validar_V" value="">
                            </form>
                            <hr>
                        </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <button onclick="generateRandomNumber();" class="bi bi-chevron" style="padding:10px 14px 10px 10px; color:#fff; font-size:15px; background-color:#0d6efd; border-radius:10px;">Generar Codigo</button><br>
                                    </div>
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