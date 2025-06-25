<?php
if (isset($_POST['pais'])) {
    require_once("../logica/CasosPais.php");

    $casos = new CasosPais($_POST['pais']);
    $datos = $casos->obtenerUltimos100();

    echo json_encode($datos);
}
?>
