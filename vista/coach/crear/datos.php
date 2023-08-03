<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DATOS</title>

    <link href="../../../img/logo_gym.png"  rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- direccion para que funcione solo numero -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body class="bg-gradient-primary">

<a class="btn btn success" href="../index.php" style="margin-left: 3.6%; margin-top:3%; position:absolute;">
        <i class="bi bi-chevron-left"
            style="padding:10px 14px 10px 10px; color:#fff; font-size:15px; background-color:#0d6efd; border-radius:10px;">
            REGRESAR</i>
    </a><br>
<form class="user" name="user" method="post">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">DATOS</h1>
                            </div>
<?php
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
session_start();
include("../../../controller/validar.php");

$control2 = $conex->prepare("SELECT * From usuarios WHERE tipo_usuario = 3");
$control2->execute();
$query2 = $control2->fetch();
?>

<?php
    if ((isset($_POST["validar_V"]))) {

    $cedula = $_POST['validar_V'];
    $peso= $_POST['peso'];

    // $estado = $_POST['estado'];

    $validar1 = $conex->prepare("SELECT * FROM usuarios WHERE documento='$cedula'");
    $validar1->execute();
    $estatura = $validar1->fetch();

    if ($cedula == ""  ) {
        
        echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
        echo '<script>window.location="datos.php"</script>';

    } 
     else {
        $estatura_metros = $estatura['estatura'] / 100; // Convertir la estatura de cm a metros
        $imc = $peso / ($estatura_metros * $estatura_metros);
        $bmi = round($imc, 2);
        
        if ($estatura['genero'] === 'Femenino') {
            $sexo = 2;
        } else {
            $sexo = 1;
        }
        $porcentaje_grasa_corporal = 1.2 * $bmi + 0.23 * $estatura['edad'] - 10.8 * $sexo - 5.4;
        $grasa = round($porcentaje_grasa_corporal, 2);

        // Estimar la grasa visceral basada en el IMC
    if ($bmi < 18.5) {
        // Si el IMC es menor a 18.5, se considera un valor promedio de grasa visceral de 10
        $grasa_v = 10;
    } elseif ($bmi >= 18.5 && $bmi < 25) {
        // Si el IMC está entre 18.5 y 24.9, se considera un valor promedio de grasa visceral de 7
        $grasa_v = 7;
    } elseif ($bmi >= 25 && $bmi < 30) {
        // Si el IMC está entre 25 y 29.9, se considera un valor promedio de grasa visceral de 14
        $grasa_v = 14;
    } else {
        // Si el IMC es mayor o igual a 30, se considera un valor promedio de grasa visceral de 20
        $grasa_v = 20;
    }

    $musculo = 100 - ($grasa + $grasa_v);
    $total = $grasa + $musculo + $grasa_v;

    $agua_porcentaje = 50; // Puedes ajustar este valor según tus necesidades
    $hueso_porcentaje = 15; // Puedes ajustar este valor según tus necesidades

    $agua = $total * ($agua_porcentaje / 100);
    $hueso = $total * ($hueso_porcentaje / 100);

    $obesidad =  ($grasa + $musculo + $grasa_v + $agua + $hueso) - 100;


    // Cálculo del metabolismo basal
    if ($sexo === 0) { // Mujer
        $metabolismo = 655 + (9.6 * $peso) + (1.8 * $estatura['estatura']) - (4.7 * $estatura['edad']);
    } else { // Hombre
        $metabolismo = 66 + (13.7 * $peso) + (5 * $estatura['estatura']) - (6.8 * $estatura['edad']);
    }
    
    // Calcular el valor de proteina
    $proteina = $peso * 0.83;

    date_default_timezone_set('America/Bogota');
    $fecha = date ('Y-m-d' );

        $insertsql3= $conex->prepare ("INSERT INTO datos(documentos,peso,bmi,grasa,musculo,agua,grasa_v,hueso,metabo,proteina,obesidad,fecha_regi) VALUES ('$cedula','$peso','$bmi','$grasa','$musculo','$agua','$grasa_v','$hueso','$metabolismo','$proteina','$obesidad','$fecha')");
        $insertsql3->execute();
        echo '<script>alert ("REGISTRO EXITOSO");</script>';
        echo '<script>window.location="./datos.php"</script>';
        }
    }
                                    elseif ((isset($_POST["consul"]))){
                                        
                                    
                                    if ($_POST['doc_cli'] == "") {
        
                                        echo '<script>alert ("INGRESE EL NUMERO DE DOCUMENTO DEL CLIENTE");</script>';
                                        echo '<script>window.location="./datos.php"</script>';
                                    
                                    }else{
                                        

                                        $cli = $_POST['doc_cli'];

                                        $consu = $conex->prepare("SELECT * FROM usuarios WHERE documento = '$cli' AND tipo_usuario = 3");
                                        $consu ->execute();
                                        $ho = $consu->fetch();

                                        if($ho){

                                            date_default_timezone_set('America/Bogota');
                                            $fechaActual = date ('Y-m-d' );
                                            $fin = date("Y-m-d",strtotime($fechaActual."+ 30 days")); 
                                    ?>
                                    <form class="user" method="post" name="user">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"></br>
                                            <label>Documento</label>
                                            <h2 style="color: white;"><?php echo $_POST['doc_cli']?></h2>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"></br>
                                            <label>Nombre Completo</label>
                                            <h2 style="color: white;"><?php echo $ho['nom_completo']?></h2>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"></br>
                                        <label>Peso</label>
                                            <input type="number" class="form-control" id="peso" name="peso"
                                                placeholder="peso" onclick="ponerbmi()" maxlength="4" oninput="ponerpeso();">
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
                                        <!-- SOLO NUMEROS () -->
                                        <script>
                                            function solonumeros(e) {
                                                key = e.keyCode || e.which;

                                                teclado = String.fromCharCode(key).toLowerCase();

                                                letras = "0123456789.";

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
                                </div>
                                <input type="submit" class="btn btn-primary  btn-block" name="enviar">
                                <input type="hidden" name="validar_V" value="<?php echo $_POST['doc_cli']?>">
                            </form>
                            <hr>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        // FUNCION DE JAVASCRIPT PARA VALIDAR LOS AÑOS DE RANGO PARA LA FECHA DE NACIMIENTO
        var fechaInput = document.getElementById('fecha');
        // Calcular las fechas mínima y máxima permitidas
        var fechaMaxima = new Date();
        fechaMaxima.setFullYear(fechaMaxima.getFullYear() - 14); // Restar 18 años para que la persona se registre 
        var fechaMinima = new Date();
        fechaMinima.setFullYear(fechaMinima.getFullYear() - 60); // Restar 80 años
        // Formatear las fechas mínima y máxima en formato de fecha adecuado (YYYY-MM-DD)
        var fechaMaximaFormateada = fechaMaxima.toISOString().split('T')[0];
        var fechaMinimaFormateada = fechaMinima.toISOString().split('T')[0];

        // Establecer los atributos min y max del campo de entrada de fecha
        fechaInput.setAttribute('min', fechaMinimaFormateada);
        fechaInput.setAttribute('max', fechaMaximaFormateada);
    </script>

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
    echo '<script>window.location="./datos.php"</script>';
    }
    }
}
else{
        
    ?>
    <form class="user" method="post" name="user">
        <div class="form-group row" >
            <div class="col-sm-6 mb-3 mb-sm-0" id="div">
                <label>Documento del cliente</label>
                <input type="number"
                        class="form-control" id="exampleFirstName" pattern="(?=.*\e)[0-9]{6,10}"
                        maxlength="10" name="doc_cli" placeholder="Numero de documentos"
                        oninput="maxlengthNumber(this);" title="Solo se aceptan numeros" required>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="hidden" name="docu"  value="">
                <button type="submit"  name="consul" onclick="show();" class="btn btn-primary btn-user btn-block" >Consultar</button>
            </div><br>
            </form>
            <?php
            }

?>