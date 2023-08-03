<?php

    session_start();
    require_once("../../../base_datos/bd.php");
    $cone = new Database();
    $conex = $cone->conectar();
    $elimi = $_GET['elimin'];

    $delete = $conex->prepare("DELETE FROM genero WHERE id_genero= '$elimi ' ");
    $delete->execute();
    $eliminar = $delete->fetch();

    if(!$eliminar){
        echo'<script> alert ("//SE ELIMINARON CORRECTAMENTE LOS DATOS//");</script>';
        echo'<script> window.location="../tablas/genero.php"</script>';

    }else{
        echo'<script> alert ("//NO SE ELIMINARON CORRECTAMENTE LOS DATOS//");</script>';
        echo'<script> window.location="../tablas/genero.php"</script>';
    }

?>