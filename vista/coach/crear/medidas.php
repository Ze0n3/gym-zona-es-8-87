
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Medidas Cliente</title>

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
<form class="user" name="user" method="post">
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-8">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Medidas clientes</h1>
                            </div>
                            <br>
<?php
require_once("../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
session_start();
include("../../../controller/validar.php");
?>

<?php
$control1 = $conex->prepare("SELECT * From usuarios WHERE tipo_usuario = 3");
$control1->execute();
$query1 = $control1->fetch();

    if ((isset($_POST["validar_V"])) ) {
    $cedula = $_POST['validar_V'];
    $pecho= $_POST['pecho'];
    $cintura= $_POST['cintura'];
    $cadera= $_POST['cadera'];
    $brazoiz= $_POST['brazo_izq'];
    $brazodr= $_POST['brazo_der'];

    date_default_timezone_set('America/Bogota');
    $fechaActual = date ('Y-m-d' );

    if ($cedula == "" ||$pecho == "" ||$cintura == "" ||$cadera == "" ||$brazoiz == "" || $brazodr == "" ) {
        
        echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
        echo '<script>window.location="medidas.php"</script>';

    }else {
        $insertsql2 = $conex->prepare ("INSERT INTO medidas(doc_cliente,pecho,cintura,cadera,brazo_izq,brazo_der,fecha_regi) VALUES ('$cedula','$pecho','$cintura','$cadera','$brazoiz','$brazodr','$fechaActual')");
        $insertsql2->execute();
        echo '<script>alert ("REGISTRO EXITOSO");</script>';
        echo '<script>window.location="../index.php"</script>';
    }
        
    }
    elseif ((isset($_POST["consul"]))){
                                        
                                    
        if ($_POST['doc_cli'] == "") {

            echo '<script>alert ("INGRESE EL NUMERO DE DOCUMENTO DEL CLIENTE");</script>';
            echo '<script>window.location="./datos.php"</script>';
        
        }else{
            

            $cli = $_POST['doc_cli'];

            $sus = $conex->prepare("SELECT * FROM tip_servicio WHERE id_tip_serv = 1");
            $sus ->execute();
            $suscri = $sus->fetch();

            $consu = $conex->prepare("SELECT * FROM usuarios WHERE documento = '$cli' AND tipo_usuario = 3");
            $consu ->execute();
            $ho = $consu->fetch();

            if($ho){

                date_default_timezone_set('America/Bogota');
                $fechaActual = date ('Y-m-d' );
                $fin = date("Y-m-d",strtotime($fechaActual."+ 30 days")); 

?>
                            <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0"></br>
                                        <label>Documento</label>
                                            <h2 style="color: white;"><?php echo $_POST['doc_cli']?></h2>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"></br>
                                            <label>Nombre Completo</label>
                                            <h2 style="color: white;"><?php echo $ho['nom_completo']?></h2>
                                        </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"></br>
                                        <label class="label">Pecho</label>
                                        <input type="text" class="form-control " id="exampleFirstName" name="pecho"
                                            placeholder="Pecho" maxlength="3" oninput="maxlengthNumber(this);" onkeypress="return(solonumeros(event));" pattern=".{3,.}" title="Solo se aceptan 3 numeros" required>
                                    </div>
                                    <br>

                                    <div class="col-sm-6 mb-3 mb-sm-0"></br>
                                        <label class="label">Cintura</label>
                                        <input type="text" class="form-control" id="exampleFirstName" name="cintura"
                                            placeholder="Cintura" maxlength="3" oninput="maxlengthNumber(this);" onkeypress="return(solonumeros(event));" pattern=".{3,.}" title="Solo se aceptan 3 numeros" required>
                                    </div>
                                    <br>

                                    <div class="col-sm-6"></br>
                                        <label class="label">Cadera</label>
                                        <input type="text" class="form-control" id="exampleLastName" name="cadera"
                                            placeholder="Cadera" maxlength="3" oninput="maxlengthNumber(this);" onkeypress="return(solonumeros(event));" pattern=".{3,.}" title="Solo se aceptan 3 numeros" required>
                                    </div>
                                    <br>

                                    <div class="col-sm-6 mb-3 mb-sm-0"></br>
                                        <label class="label">Brazo Izquierdo</label>
                                        <input type="text" class="form-control" id="exampleFirstName" name="brazo_izq"
                                            placeholder="Brazo izquierdo" maxlength="3" oninput="maxlengthNumber(this);" onkeypress="return(solonumeros(event));" pattern=".{3,.}" title="Solo se aceptan 3 numeros" required>
                                    </div>
                                    <br>
                                    <div class="col-sm-6" style="margin-bottom:20px; margin-left:150px;"></br>
                                        <label class="label">Brazo Derecho</label>
                                        <input type="text" class="form-control" id="exampleLastName" name="brazo_der" 
                                            placeholder="Brazo derecho" maxlength="3" oninput="maxlengthNumber(this);" onkeypress="return(solonumeros(event));" pattern=".{3,.}" title="Solo se aceptan 3 numeros" required>
                                
                                </div>

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
                                    
                                    
                                <br></br>
                                
                                <input type="submit" class="btn btn-primary btn-block" name="Suscribir">
                                <br></br>
                                <input type="hidden" name="validar_V" value="<?php echo $_POST['doc_cli']?>">
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
</body>

</html>