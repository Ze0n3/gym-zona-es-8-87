<?php
require_once("../../../base_datos/bd.php");
$cone = new Database();
$conex = $cone->conectar();
session_start();
include("../../../controller/validar.php");
?>

<?php
     if (isset($_POST["validar_V"])) {
    
        $nombre = $_POST['usu'];

        if ($nombre == "" ) {
        
            echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
            echo '<script>window.location="tip_usu.php"</script>';
    
        }
        else{
        $insertsql2 = $conex->prepare ("INSERT INTO tip_user(nom_tip_user) VALUES ('$nombre')");
        $insertsql2->execute();
        echo '<script>alert ("Registro Exitoso, Gracias");</script>';
        echo '<script>window.location="tip_usu.php"</script>';
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

    <title>Crear tipo de usuario</title>

    <link href="../../../img/logo_gym.png"  rel="icon">
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
<a class="btn btn success" href="../index.php" style="margin-left: 3.6%; margin-top:3%; position:absolute;">
        <i class="bi bi-chevron-left"
            style="padding:10px 14px 10px 10px; color:#fff; font-size:15px; background-color:#0d6efd; border-radius:10px;">
            REGRESAR</i>
    </a><br>
    <form class="user" name="user" method="POST">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-8">
                        <div class="p-5" style="margin-top:80px;">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tipo de Usuario</h1>
                            </div>
                                <div class="form-group row">
                                    
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="label">Tipo de Usuario</label>
                                        <input type="text" pattern="[A-Za-z]"  title="Solo se pueden ingresar letras" class="form-control" id="exampleFirstName" name="usu" onkeypress="return(sololetras(event));"
                                         maxlength="16" placeholder="Tipo de usuario" required>
                                    </div>
                                    
                                </div>

                                 

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