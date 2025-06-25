<?php
require_once(__DIR__ . '/../persistencia/CountryDAO.php');
require_once(__DIR__ . '/../conexion/Conexion.php');

class Country {
    public function obtenerTodos() {
        $conexion = new Conexion();
        $conexion->abrir();

        $dao = new CountryDAO();
        $conexion->ejecutar($dao->consultarTodos());

        $paises = [];
        while ($fila = $conexion->registro()) {
            $paises[] = $fila[0];
        }

        $conexion->cerrar();
        return $paises;
    }
}
?>
