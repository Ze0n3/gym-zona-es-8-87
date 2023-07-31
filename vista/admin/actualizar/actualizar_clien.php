<?php
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
include("../../controller/validar.php");

$editar = $_GET['editar'];

$control1 = $conex->prepare("SELECT * From genero");
$control1->execute();
$query1 = $control1->fetch();

$control = $conex->prepare("SELECT * From usuarios");
$control->execute();
$query = $control->fetch();



    $validar = $conex->prepare("SELECT * FROM usuarios INNER JOIN tip_user ON usuarios.tipo_usuario = tip_user.id_tip_user INNER JOIN genero ON usuarios.genero=genero.id_genero INNER JOIN estado ON usuarios.estado=estado.id_estado where documento = '$editar'");
    $validar->execute();
    $queryi = $validar->fetch();

if (isset($_POST["validar_V"]) == "cli") {
    $cedula = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $genero = $_POST['genero'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $fecha_n = $_POST['nacimiento'];
    $usu = $_POST['usuario'];

    $fecha_nacimiento = $fecha_n;
    $dia_actual = date("Y-m-d");
    $edad_diff = date_diff(date_create($fecha_nacimiento), date_create($dia_actual));
    $edad = $edad_diff->format('%y');     

    $validar = $conex->prepare("SELECT * FROM usuarios INNER JOIN tip_user ON usuarios.tipo_usuario = tip_user.id_tip_user INNER JOIN genero ON usuarios.genero=genero.id_genero INNER JOIN estado ON usuarios.estado=estado.id_estado where documento = '$editar'");
    $validar->execute();
    $queryi = $validar->fetch();

    if ($cedula == "" || $nombre == "" || $usu == "" || $edad == "" || $genero == "" || $telefono == "" || $direccion == "" || $correo == "" || $fecha_n == "") {

        echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
        echo '<script>window.location="../tablas/t_usu.php"</script>';
    } else if ($query['usuario'] == $usu ) {
        echo '<script>alert ("USUARIO YA EXISTEN // CAMBIELO//");</script>';
        echo 'script>windows.location="../tablas/t_usu.php"</script>';
    } else {
        $insertsql = $conex->prepare("UPDATE usuarios SET nom_completo = '$nombre',edad = '$edad',genero = '$genero',usuario = '$usu',fecha_nacimiento = '$fecha_n', telefono = '$telefono' ,direccion = '$direccion',correo =  '$correo' WHERE documento = $editar");
        $insertsql->execute();
        echo '<script>alert ("SE A CTUALIZADO CORRECTAMENTE");</script>';
        echo '<script>window.location="../tablas/t_usu.php"</script>';
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

    <title>Actualizar Cliente</title>

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
    
    <a class="btn btn success" href="../tablas/t_usu.php" style="margin-left: 3.6%; margin-top:3%; position:absolute;">
        <i class="bi bi-chevron-left"
            style="padding:10px 14px 10px 10px; color:#fff; font-size:15px; background-color:#0d6efd; border-radius:10px;">
            REGRESAR</i>
    </a><br><br><br>
    <form method="post" autocomplete="off" name="cli">
        <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-6">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-10">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Actualizar Cliente</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                        <label>Numero de documento</label>
                                        <input type="number" class="form-control form-control-user"
                                                id="exampleFirstName" maxlength="10" name="documento"
                                                oninput="maxlengthNumber(this);" value="<?php echo $queryi['documento'] ?>">
                                
                                        </div>
                                        <div class="col-sm-4">
                                        <label>Nombre completo </label>
                                        <input type="text" class="form-control form-control-user"  maxlength="50" oninput="validarletras(this);" onkeypress="return(sololetras(event));" id="exampleFirstName" name="nombre" value="<?php echo $queryi['nom_completo']?>">
                                        </div>
                                        <div class="col-sm-4"><br>
                                        <label>Usuario</label>
                                            <input type="text" style="margin-bottom:24px;" class="form-control form-control-user"
                                                id="exampleFirstName" name="usuario" maxlength="4"
                                                oninput="maxlengthNumber(this);" value="<?php echo $queryi['usuario'] ?>">
                                        </div>
                                        <div class="col-sm-4"><br>
                                        <label>Genero</label>
                                            <select name="genero" style="margin-bottom:24px;" class="form-control form-control-user"
                                                id="exampleFirstName">
                                                <option value=""><?php echo ($queryi['genero']) ?></option>
                                                <?php
                                                do {
                                                    ?>
                                                    <option value="<?php echo ($query1['id_genero']) ?>"> <?php echo ($query1['genero']) ?> </option>
                                                    <?php
                                                } while ($query1 = $control1->fetch());
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4"><br>
                                        <label>Estatura</label>
                                            <input type="number" style="margin-bottom:24px;" class="form-control form-control-user"
                                                id="exampleFirstName" name="estatura" maxlength="4"
                                                oninput="maxlengthNumber(this);" value="<?php echo $queryi['estatura'] ?>">
                                        </div>
                                        
                                        <div class="col-sm-4"><br>
                                        <label>Numero de telefono</label>
                                            <input type="number" style="margin-bottom:24px;" class="form-control form-control-user"
                                                id="exampleLastName" name="telefono" maxlength="10"
                                                oninput="maxlengthNumber(this);" value="<?php echo $queryi['telefono'] ?>">
                                        </div>
                                        <div class="col-sm-4">
                                        <label>Direccion</label><br>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleFirstName" name="direccion" maxlength="20" oninput="validarletras(this);" onkeypress="return(sololetras(event));" value="<?php echo $queryi['direccion'] ?>">
                                        </div>
                                        <div class="col-sm-4">
                                        <label>Correo electronico</label><br>
                                            <input type="text" class="form-control form-control-user"
                                                id="email" name="correo" maxlength="35" oninput="validarletras(this);" onkeypress="return(sololetrasco(event));" value="<?php echo $queryi['correo'] ?>">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Fecha de nacimiento</label><br>
                                            <input type="date" class="form-control form-control-user"
                                                id="exampleLastName" name="nacimiento" value="<?php echo $queryi['fecha_nacimiento'] ?>">
                                            <br>
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
                                            document.getElementById('email').addEventListener('input', function() {
                                                campo = event.target;
                                                valido = document.getElementById('emailOK');
                                                    
                                                emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                                                //Se muestra un texto a modo de ejemplo, luego va a ser un icono
                                                if (emailRegex.test(campo.value)) {
                                                valido.innerText = "válido";
                                                } else {
                                                valido.innerText = "incorrecto";
                                                }
                                            });
                                        </script>
                                        
                                        <input type="submit" class="btn btn-primary btn-user btn-block"
                                            name="Suscribir">
                                        <input type="hidden" name="validar_V" value="user">
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>