<?php

    session_start();
    require_once("../../../base_datos/bd.php");
    $cone = new Database();
    $conex = $cone->conectar();
    $eli = $_GET['elimin'];

    $eli = $conex->prepare("DELETE FROM tip_user WHERE id_tip_user= '$eli' ");
    $eli->execute();
    $bor = $eli->fetch();

    if(!$bor){
        echo'<script> alert ("//SE ELIMINARON CORRECTAMENTE LOS DATOS//");</script>';
        echo'<script> window.location="../tablas/t_cliente.php"</script>';

    }else{
        echo'<script> alert ("//NO SE ELIMINARON CORRECTAMENTE LOS DATOS//");</script>';
        echo'<script> window.location="../tablas/t_cliente.php"</script>';
    }

?>