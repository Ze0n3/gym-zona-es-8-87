<?php
session_start();
require_once("../../../../base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();

if (isset($_POST['ActivoCL'])){
    $docu = $_POST['ActivoCL'];
    
    $insertsql = $conex->prepare ("UPDATE usuarios SET estado = 2  WHERE documento ='$docu'");
    $insertsql->execute();
    echo '<script>alert("SE A ACTIVADO CORRECTAMENTE");</script>';
    echo '<script>window.location="../t_cliente.php"</script>' ; 
}
elseif (isset($_POST['InactivoCL'])){
    $docu = $_POST['InactivoCL'];
    
    $insertsql = $conex->prepare ("UPDATE usuarios SET estado = 1  WHERE documento ='$docu'");
    $insertsql->execute();
    echo '<script>alert("SE A INAVILITADO CORRECTAMENTE");</script>';
    echo '<script>window.location="../t_cliente.php"</script>' ; 
}
if (isset($_POST['ActivoCO'])){
    $docu = $_POST['ActivoCO'];
    
    $insertsql = $conex->prepare ("UPDATE usuarios SET estado = 2  WHERE documento ='$docu'");
    $insertsql->execute();
    echo '<script>alert("SE A ACTIVADO CORRECTAMENTE");</script>';
    echo '<script>window.location="../t_coach.php"</script>' ; 
}
elseif (isset($_POST['InactivoCO'])){
    $docu = $_POST['InactivoCO'];
    
    $insertsql = $conex->prepare ("UPDATE usuarios SET estado = 1  WHERE documento ='$docu'");
    $insertsql->execute();
    echo '<script>alert("SE A INAVILITADO CORRECTAMENTE");</script>';
    echo '<script>window.location="../t_coach.php"</script>' ; 
}