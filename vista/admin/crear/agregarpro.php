<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AGREGAR CANTIDAD PRODUCTOS</title>

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
    <form class="user" name="user" method="get" autocomplete="off">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">

<?php
require_once("../../../base_datos/bd.php");
$cone = new Database();
$conex = $cone->conectar();
session_start();
include("../../../controller/validar.php");
?>


<?php
if (isset($_GET['consul'])){
    $codigo = $_GET["codigo"];

    $statement = $conex->prepare("SELECT * FROM productos WHERE id_producto='$codigo' or nom_producto LIKE '%$codigo%' and docu_ingre ='".$_SESSION['docu']."'");
    $statement->execute();
    $resultados = $statement->fetchAll();

    if ($codigo == ""){
        ?>
        <div class="alert alert-warning">
                <strong>Error:</strong> Ingrese el codigo o nombre del producto
            </div>
        <?php
    }
    
elseif($resultados){

?>
<table class="table table-bordered">
<thead>
    <tr>
        <th>ID</th>
        <th>Código</th>
        <th>Nombre del Producto</th>
        <th>Existencia</th>
        <th>Cantidad Agregar</th>
        <th>Agregar</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach($resultados as $pro){ 
            
        ?>
    <tr>
        <td><?= $pro['id_producto'] ?></td>
        <td><?= $pro['cod_producto'] ?></td>
        <td><?= $pro['nom_producto'] ?></td>
        <td><?= $pro['can_inicial']?></td>
        <td><?= $_GET['cantidad']?></td>
        <td><a class="btn btn-success" name="agregar" href='sumarcan.php?id=<?php echo $pro['id_producto']?>&canti=<?php echo $_GET['cantidad']?>'><i class="bi bi-cart-check-fill"></i></a></td>
    </tr>
    <?php 
    }
    ?>
    <a class="btn btn-danger" href="./agregarpro.php"><i class="bi bi-cart-x"></i>Cancelar</a>
    <?php
} 
 
            else{ 
                echo '<script>alert (" El producto que buscas no existe en tu inventario");</script>';
                echo '<script>window.location="./agregarpro.php"</script>';
            }
        }
        else{
            ?>
            <div class="p-5" style="margin-top:80px;">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">AGREGAR CANTIDAD DE PRODUCTOS</h1>
                            </div>
                                <div class="form-group row">
                                    <div class="col-sm-8 mb-0 mb-sm-0">
                                        <label for="codigo">Código de barras o Nombre del producto:</label>
                                        <input autocomplete="off" autofocus class="form-control"  title="" maxlength="15" name="codigo" type="text" id="codigo" placeholder="Ingrese sobre el producto" required>
                                    </div>
                                    <div class="col-sm-8 mb-0 mb-sm-0"><br>
                                        <label for="codigo">Cantidad A Sumar:</label>
                                        <input autocomplete="off" autofocus class="form-control"  title="" maxlength="15" name="cantidad" type="text" id="codigo" placeholder="Ingrese sobre el producto" required>
                                    </div>
                                    <div class="col-sm-6 mb-0 mb-sm-0"><br>
                                        <input type="submit" class="btn btn-primary btn-block" name="consul">
                                        <input type="hidden" name="consul">
                                    </div>
                            </div>
        <?php
        }
                    ?>
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

                                <!-- SOLO NUMERO,LONGITUD -->
                                <script>
                                    function maxlengthNumber(obj) {
                                        console.log(obj.value);
                                        if (obj.value.length > obj.maxLength) {
                                            obj.value = obj.value.slice(0, obj.maxLength);
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