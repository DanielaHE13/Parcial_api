<?php
require_once(__DIR__ . '/../persistencia/CaseDAO.php');
require_once(__DIR__ . '/../conexion/Conexion.php');

class CaseCOVID {
    private $region;

    public function __construct($region) {
        $this->region = $region;
    }

    public function obtenerTotales() {
        $conexion = new Conexion();
        $conexion->abrir();

        $caseDAO = new CaseDAO($this->region);
        $conexion->ejecutar($caseDAO->consultarTotalesRegion());

        $registro = $conexion->registro();
        $conexion->cerrar();

        return [
            "totalCasos" => $registro[0],
            "totalMuertes" => $registro[1]
        ];
    }
}
?>
