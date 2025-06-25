<?php
require_once(__DIR__ . '/../persistencia/RegionDAO.php');
require_once(__DIR__ . '/../conexion/Conexion.php');

class Region {
    private $nombreRegion;

    public function __construct($nombreRegion = "") {
        $this->nombreRegion = $nombreRegion;
    }

    public function obtenerTodas() {
        $conexion = new Conexion();
        $regionDAO = new RegionDAO($this->nombreRegion);
        $conexion->abrir();
        $conexion->ejecutar($regionDAO->consultarTodas());

        $regiones = array();
        while ($fila = $conexion->registro()) {
            $regiones[] = $fila[0]; // solo hay una columna: nombreRegion
        }

        $conexion->cerrar();
        return $regiones;
    }
}
?>
