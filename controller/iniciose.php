<?php
require_once("../base_datos/bd.php");
$daba = new database();
$con = $daba ->conectar();
session_start();

if (isset($_POST["inise"])) {
    $docu = $_POST["docume"];
    $contra = $_POST["contra"];

    $cone = $con -> prepare("SELECT * FROM usuarios WHERE documento='$docu' AND estado=2");
    $cone -> execute();
    $fil = $cone -> fetch();
    


    if ($fil && password_verify($contra, $fil['contraseña'])) {
        $_SESSION['docu'] = $fil['documento'];
        $_SESSION['nombres'] = $fil['nom_completo'];
        $_SESSION['tipo'] = $fil['tipo_usuario'];
        $_SESSION['user'] = $fil['usuario'];

        if ($_SESSION['tipo'] == 1) {
            header("location:../vista/admin/index.php");
            exit();
        } else if ($_SESSION['tipo'] == 2) {
            header("location:../vista/coach/index.php");
            exit();
        } else {
            echo '<script>alert("NO SE ENCUENTRAN DATOS VALIDOS");</script>';
            echo '<script>window.location="../error.html"</script>';
            exit();
        }
    } else {
        echo '<script>window.location="../error.html"</script>';
        exit();
    }
}
