<?php
if (isset($_POST['region'])) {
    require_once("../logica/Case.php");

    $case = new CaseCOVID($_POST['region']);
    $datos = $case->obtenerTotales();

    echo json_encode($datos);
}
?>
