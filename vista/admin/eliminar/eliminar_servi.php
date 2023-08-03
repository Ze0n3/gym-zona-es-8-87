<?php

    session_start();
    require_once("../../../base_datos/bd.php");
    $cone = new Database();
    $conex = $cone->conectar();
    $eli = $_GET['elimin'];

    $elimm = $conex->prepare("DELETE FROM tip_servicio WHERE id_tip_serv= '$eli' ");
    $elimm->execute();
    $borrar = $elimm->fetch();

    if(!$borrar){
        echo'<script> alert ("//SE ELIMINARON CORRECTAMENTE LOS DATOS//");</script>';
        echo'<script> window.location="../tablas/tabla_tip_servicio.php"</script>';

    }else{
        echo'<script> alert ("//NO SE ELIMINARON CORRECTAMENTE LOS DATOS//");</script>';
        echo'<script> window.location="../tablas/tabla_tip_servicio.php"</script>';
    }

?>