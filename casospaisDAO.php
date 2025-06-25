<?php
class CasosPaisDAO {
    private $nombrePais;

    public function __construct($nombrePais) {
        $this->nombrePais = $nombrePais;
    }

    public function consultarUltimos100() {
        return "SELECT 
                    Date_reported,
                    New_cases,
                    Cumulative_cases,
                    New_deaths,
                    Cumulative_deaths
                FROM Cases
                WHERE Country = '" . $this->nombrePais . "'
                ORDER BY Date_reported DESC
                LIMIT 100";
    }
}
?>
