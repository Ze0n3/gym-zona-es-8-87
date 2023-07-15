<?php
require_once("../../../base_datos/bd.php");
$cone = new Database();
$conex = $cone->conectar();
?>

<?php

$control = $conex->prepare("SELECT * From tip_servicio WHERE id_tip_serv >= 1");
$control->execute();
$query = $control->fetch();

?>


<?php
    if ((isset($_POST["validar_V"])) && ($_POST["validar_V"] == "user")) {
    $cedula_c = $_POST['documento_c']; 
    $cedula_u = $_POST['documento_u'];
    
    // $estado = $_POST['estado'];

    $validar = $conex->prepare("SELECT * FROM usuarios where documento='$cedula' or nom_completo = '$nombre'");
    $validar->execute();
    $queryi = $validar->fetch();

    if ($cedula == "" || $nombre == "" ) {
        
        echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
        echo '<script>window.location="actualizar_tip_serv.php"</script>';
    } else if ($queryi) {
        echo '<script>alert ("DOCUMENTO O USUARIO EXISTEN // CAMBIELOS//");</script>';
        echo 'script>windows.location="actualizar_tip_serv.php"</script>';
    } else {
        $hash=password_hash($contraseña, PASSWORD_DEFAULT, ['cost'=>15]);
        $insertsql = $conex->prepare ("INSERT INTO usuario(documento,com_completo,edad,genero,estatura,fecha_nacimiento,tipo_usuario,usuario,contraseña,telefono,direccion,correo,ejercicio,fecha_registro,hora_registo,precio) VALUES ('$cedula','$nombre','$edad','$genero','$estatura','$telefono','$direccion','$correo','$user','$hash','$tipo_usu','$edad','$genero','$estatura','$fecha_n','$ejercicio','$f_sus','$h_sus','$total')");
        $insertsql->execute();
        $resultado=$insertsql->fetch();
        if ($insertsql=1){
        $insertsql2 = $conex->prepare ("INSERT INTO medidas(documento,pecho,cintura,cadera,brazo_izq,brazo_der) VALUES ('$cedula','$pecho','$cintura','$cadera','$brazo_i','$brazo_d')");
        $insertsql2->execute();
        if ($insertsql2=1){$insertsql3 = $conex->prepare ("INSERT INTO datos(documento,peso,bmi,grasa,musculo,agua,grasa_v,hueso,metabo,proteina,obesidad,edad) VALUES ('$cedula','$peso','$bmi','$grasa','$musculo','$agua','$grasa_v','$hueso','$metabo','$proteina','$edad2')");
        $insertsql3->execute();
        echo '<script>alert ("Registro Exitoso, Gracias");</script>';
        echo '<script>window.location="../index.php"</script>';
        }
        }
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

    <title>Actualizar servicio</title>

    <link href="../../../img/logo_gym.png" rel="icon">
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
                    <div class="col-lg-7" style="margin-top:60px;">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Actualizar Tipo de Servicio</h1>
                            </div>
                            <form class="user" name="user">
                                <div class="form-group row">
                                    
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="label">Nombre del servicio</label>
                                        <select name="tip_usuario" class="form-control" id="exampleFirstName" required>
                                            <option value="">Seleccione...</option>
                                            <?php
                                                // do {
                                                ?>
                                                    <option value="<?php echo ($query['id_tip_user']) ?>"> <?php echo ($query['nom_tip_user']) ?> </option>
                                                <?php
                                                // } while ($query = $control->fetch());
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Precio de servicio </label>
                                        <input type="number" class="form-control" min="0" id="exampleFirstName" name="total" maxlength="6" oninput="maxlengthNumber(this);"
                                        title="Solo se aceptan numeros"    placeholder="Precio de servicio" required>
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