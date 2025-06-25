<?php
class RegionDAO {
    private $nombreRegion;

    public function __construct($nombreRegion = "") {
        $this->nombreRegion = $nombreRegion;
    }

    public function consultarTodas() {
        return "SELECT nombreRegion FROM Region";
    }
}
?>
