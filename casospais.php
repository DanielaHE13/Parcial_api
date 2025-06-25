<?php
require_once(__DIR__ . '/../persistencia/CasosPaisDAO.php');
require_once(__DIR__ . '/../conexion/Conexion.php');

class CasosPais {
    private $nombrePais;

    public function __construct($nombrePais) {
        $this->nombrePais = $nombrePais;
    }

    public function obtenerUltimos100() {
        $conexion = new Conexion();
        $conexion->abrir();

        $dao = new CasosPaisDAO($this->nombrePais);
        $conexion->ejecutar($dao->consultarUltimos100());

        $datos = [];
        while ($fila = $conexion->registro()) {
            $datos[] = [
                "fecha" => $fila[0],
                "nuevos" => $fila[1],
                "acumulados" => $fila[2],
                "muertesNuevas" => $fila[3],
                "muertesAcumuladas" => $fila[4]
            ];
        }

        $conexion->cerrar();
        return $datos;
    }
}
?>
