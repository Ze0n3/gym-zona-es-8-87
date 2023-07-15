<?php

    session_start();
    require_once("../../../base_datos/bd.php");
    $cone = new Database();
    $conex = $cone->conectar();
    $elimi = $_GET['elimin'];

    $eliminar = $conex->prepare("DELETE FROM usuarios WHERE documento= '$elimi ' ");
    $eliminar->execute();
    $delete = $eliminar->fetch();

    if(!$delete){
        echo'<script> alert ("//SE ELIMINARON CORRECTAMENTE LOS DATOS//");</script>';
        echo'<script> window.location="../tablas/t_usu.php"</script>';

    }else{
        echo'<script> alert ("//NO SE ELIMINARON CORRECTAMENTE LOS DATOS//");</script>';
        echo'<script> window.location="../tablas/t_usu.php"</script>';
    }

?>