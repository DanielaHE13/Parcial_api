<?php
class Conexion {
    private $conexion;
    private $resultado;

    public function abrir() {
        $this->conexion = new mysqli("localhost", "root", "", "covid");
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function cerrar() {
        $this->conexion->close();
    }

    public function ejecutar($sentencia) {
        $this->resultado = $this->conexion->query($sentencia);
    }

    public function registro() {
        return $this->resultado->fetch_row(); // fetch_row devuelve array indexado
    }

    public function filas() {
        return $this->resultado->num_rows;
    }
}
?>
