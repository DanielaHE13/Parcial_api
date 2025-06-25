<?php
class CountryDAO {
    private $nombre;

    public function __construct($nombre = "") {
        $this->nombre = $nombre;
    }

    public function consultarTodos() {
        return "SELECT nombre FROM Country ORDER BY nombre";
    }
}
?>
