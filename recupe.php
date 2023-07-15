<?php
require_once("base_datos/bd.php");
$daba = new database();
$con = $daba ->conectar();
session_start();

if (isset($_POST["recuconfa"])){

  $con2 = $_POST["contra"];
  $incri = password_hash($con2, PASSWORD_DEFAULT, ['cost' => 14]);
  $docu = $_POST["do"];

  $upta = $con -> prepare("UPDATE usuarios SET contraseña = '$incri' where documento = '$docu' ");
  $upta -> execute();

  echo '<script>alert("SE A ACTUALIZADO CORRECTAMENTE");</script>';
  echo '<script>window.location="login.html"</script>' ; 
    exit();

}


else{
    if (isset($_POST["recu"])){
      
    $docu = $_POST["docu"];
    $usu = $_POST["usu"];
    
    $consu = $con -> prepare("SELECT * FROM usuarios WHERE documento = '$docu' AND usuario = '$usu'");
    $consu -> execute();
    $fil = $consu ->fetch();

    if ($fil){
        
        ?>
        <!DOCTYPE html>
        <html lang="en">
        
        <head>
        
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
        
            <title>RECUPERARA CONTRASEÑA</title>
        
            <link href="img/logo_gym.png" rel="icon">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
            <!-- Custom fonts for this template-->
            <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
            <link
                href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
                rel="stylesheet">
        
            <!-- Custom styles for this template-->
            <link href="css/sb-admin-2.min.css" rel="stylesheet">

        
        </head>
        
        <body class="bg-gradient-primary">
        
            <div class="container">
        
                <!-- Outer Row -->
                <div class="row justify-content-center">
        
                    <div class="col-xl-10 col-lg-12 col-md-9">
        
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-2">Olvidaste tu contraseña?</h1>
                                            </div>
                                            <form class="user" method="post" >
                                                <div class="form-group">
                                                    <input type="password" class="form-control form-control-user"
                                                        id="documento" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Debe contener al menos un número y una mayúscula y una minúscula letra, y al menos 8 o más caracteres" placeholder="Ingrese Nueva Contraseña" maxlength="16" required > 
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control form-control-user"
                                                        id="documento" name="contra"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Debe contener al menos un número y una mayúscula y una minúscula letra, y al menos 8 o más caracteres" placeholder="Ingrese Nueva Contraseña" maxlength="16" required
                                                        placeholder="Confirma Contraseña">
                                                </div>
                                                <input type="hidden" value="<?php echo $docu ?>" name="do" >
                                                <button type="submit"  name="recuconfa" class="btn btn-primary btn-user btn-block">INGRESAR</button>
                                                


                                            
                                        
                                            </form>
                                            
                                            <div class="text-center">
                                                <a class="small" href="index.php">REGRESAR</a>
                                            </div>
                                        </div>
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
        
        <?php
    }
    else{
        if($_POST["docu"] == "" ||  $_POST["usu"] == ""){
            echo '<script>alert("HAY ALGUN CAMPO VACIO // SE DEBEN LLEVAR TODOS");</script>';
            echo '<script>window.location="forgot-password.html"</script>' ; 
        }

        else{
            echo '<script>alert("No se encontraron datos validos ");</script>';
        echo '<script>window.location="forgot-password.html"</script>' ; 
    }

        } 
}
    
}


?>