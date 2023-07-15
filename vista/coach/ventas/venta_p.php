<?php
require_once("../../../base_datos/bd.php");
$cone = new Database();
$conex = $cone->conectar();
?>

<?php

$control = $conex->prepare("SELECT * From productos WHERE id_producto >= 1");
$control->execute();
$query = $control->fetch();

$control1 = $conex->prepare("SELECT * From usuarios WHERE tipo_usuario = 2");
$control1->execute();
$query1 = $control1->fetch();

$control2 = $conex->prepare("SELECT * From usuarios WHERE tipo_usuario = 3");
$control2->execute();
$query2 = $control2->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Venta</title>

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
                    <div class="col-lg-8">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Venta de Productos</h1>
                            </div>
                            <form class="user" name="user" method="post" autocomplete="off">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>Documento del Coach </label>
                                        <select name="document" class="form-control form-control" id="exampleFirstName">
                                            <option value="">Seleccione el nombre del coach...</option>
                                            <?php
                                            do {
                                            ?>
                                             <option value="<?php echo ($query1['documento']) ?>"> <?php echo ($query1['nom_completo'])?> </option> 
                                            <?php
                                             } while ($query1 = $control1->fetch());
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-12">
                                        <label>Documento del Coach </label>
                                        <select name="document" class="form-control form-control" id="exampleFirstName">
                                            <option value="">Seleccione el nombre del coach...</option>
                                            <?php
                                            do {
                                            ?>
                                             <option value="<?php echo ($query2['documento']) ?>"> <?php echo ($query2['nom_completo'])?> </option> 
                                            <?php
                                             } while ($query2 = $control2->fetch());
                                            ?>
                                        </select>
                                    </div>
                                    </div>    
                                    <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Fecha: </label>
                                        <input type="date" class="form-control form-control-user" id="exampleFirstName" name="fecha">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Hora: </label>
                                        <input type="time" class="form-control form-control-user" id="exampleLastName" name="hora">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Total: </label>
                                        <input type="number" class="form-control form-control-user" id="exampleFirstName" name="total"
                                        maxlength="6" oninput="maxlengthNumber(this);"  placeholder="Total de venta">
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
                                </div>
                            </form>
                            <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php 
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>
	<div class="col-xs-12">
		<h1 style="text-align: center;">PRODUCTOS</h1>
		<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Venta realizada correctamente
						</div>
					<?php
				}else if($_GET["status"] === "2"){
					?>
					<div class="alert alert-info">
							<strong>Venta cancelada</strong>
						</div>
					<?php
				}else if($_GET["status"] === "3"){
					?>
					<div class="alert alert-info">
							<strong>Ok</strong> Producto quitado de la lista
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-warning">
							<strong>Error:</strong> El producto que buscas no existe
						</div>
					<?php
				}else if($_GET["status"] === "5"){
					?>
					<div class="alert alert-danger">
							<strong>Error: </strong>El producto está agotado
						</div>
					<?php
				}else{
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
						</div>
					<?php
				}
			}
		?>
		<br>
		<form method="post" action="agregarAlCarrito.php">
            <div class="form-group row">
                <div class="col-sm-4 mb-3 mb-sm-2">
                    <label for="codigo">Código De Barras:</label>
                    <input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">
                </div>
                <div class="col-sm-4 mb-3 mb-sm-2">
                    <label for="codigo">Nombre Del Producto:</label>
                    <input autocomplete="off" autofocus class="form-control" name="nombre" required type="text" id="codigo" placeholder="Escribe el nombre">
                </div>
            </div>   
        </form>
		<br><br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Código de barra</th>
					<th>nombre</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Total</th>
					<th>Quitar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($_SESSION["carrito"] as $indice => $producto){ 
						$granTotal += $producto->total;
					?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo $producto->cantidad ?></td>
					<td><?php echo $producto->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<h3>Total: <?php echo $granTotal; ?></h3>
		<form action="./terminarVenta.php" method="POST">
			<input name="total" type="hidden" value="<?php echo $granTotal;?>">
			<button type="submit" class="btn btn-success">Terminar venta</button>
			<a href="../index.php" class="btn btn-danger">Cancelar venta</a>
		</form>
	</div>
    
<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

array_splice($_SESSION["carrito"], $indice, 1);
header("Location: ./vender.php?status=3");
?>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>