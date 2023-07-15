<?php
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
?>

<?php

$control = $conex->prepare("SELECT * From tip_user WHERE id_tip_user ");
$control->execute();
$query = $control->fetch();

?>

<?php

$control1 = $conex->prepare("SELECT * From genero");
$control1->execute();
$query1 = $control1->fetch();

?>
<?php

// $control2 = $conex->prepare("SELECT * From estado WHERE id_estado = 2");
// $control2->execute();
// $query2 = $control2->fetch();

?>

<?php
if (isset($_POST["validar_V"]) == "cli") {
    $cedula = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $genero = $_POST['genero'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $fecha_n = $_POST['nacimiento'];

    $fecha_nacimiento = $fecha_n;
    $dia_actual = date("Y-m-d");
    $edad_diff = date_diff(date_create($fecha_nacimiento), date_create($dia_actual));
    $edad = $edad_diff->format('%y');

    $validar = $conex->prepare("SELECT * FROM usuarios where documento='$cedula' ");
    $validar->execute();
    $queryi = $validar->fetch();

    if ($cedula == "" || $nombre == "" || $edad == "" || $genero == "" || $telefono == "" || $direccion == "" || $correo == "" || $fecha_n == "") {

        echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
        echo '<script>window.location="registrocli.php"</script>';
    } else if ($queryi) {
        echo '<script>alert ("DOCUMENTO YA EXISTEN // CAMBIELO//");</script>';
        echo 'script>windows.location="registrocli.php"</script>';
    } else {
        $insertsql = $conex->prepare("INSERT INTO usuarios(documento,cod_barras,nom_completo,edad,genero,fecha_nacimiento,tipo_usuario,telefono,direccion,correo,estado) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $insertsql->execute([$cedula, $cedula, $nombre, $edad, $genero, $fecha_n, 3, $telefono, $direccion, $correo, 1]);
        echo '<script>alert ("Cliente Creado exitosamente, Gracias");</script>';
        echo '<script>window.location="../index.php"</script>';
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

    <title>Crear Cliente</title>

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
    <a class="btn btn success" href="../index.php" style="margin-left: 3.6%; margin-top:3%; position:absolute;">
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
                                    <h1 class="h4 text-gray-900 mb-4">Crear Clientes</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-2"><br>
                                        <label>Documento</label>
                                            <input type="number" class="form-control form-control-user"
                                                id="exampleFirstName" maxlength="10" name="documento"
                                                placeholder="Numero de documento" oninput="maxlengthNumber(this);">
                                        </div>
                                        <div class="col-sm-4 mb-3 mb-sm-2"><br>
                                        <label>Nombre completo</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleLastName" maxlength="50" oninput="validarletras(this);" onkeypress="return(sololetras(event));" name="nombre" placeholder="Nombre completo">
                                        </div>
                                        <div class="col-sm-4"><br>
                                        <label>Genero</label>
                                            <select name="genero" class="form-control form-control-user"
                                                id="exampleFirstName">
                                                <option value="">Genero</option>
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
                                            <input type="number" class="form-control form-control-user"
                                                id="exampleFirstName" name="estatura" maxlength="4"
                                                oninput="maxlengthNumber(this);" placeholder="Estatura">
                                        </div>
                                        <div class="col-sm-4"><br>
                                        <label>Telefono</label>
                                            <input type="number" class="form-control form-control-user"
                                                id="exampleLastName" name="telefono" maxlength="10"
                                                oninput="maxlengthNumber(this);" placeholder="Telefono">
                                        </div>
                                        <div class="col-sm-4 mb-3 mb-sm-0"><br>
                                        <label>Direccion</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleFirstName" name="direccion" maxlength="50" placeholder="Direccion">
                                        </div>
                                        <div class="col-sm-4 mb-3 mb-sm-0"><br>
                                        <label>Correo electronico</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleLastName" name="correo" maxlength="35" placeholder="Correo electronico">
                                        </div>
                                        <div class="col-sm-4 mb-3 mb-sm-0"><br>
                                            <label>Fecha de nacimiento</label>
                                            <input type="date" class="form-control form-control-user"
                                                id="exampleLastName" name="nacimiento">
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