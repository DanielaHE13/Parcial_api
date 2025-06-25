<?php
class CaseDAO {
    private $region;

    public function __construct($region) {
        $this->region = $region;
    }

    public function consultarTotalesRegion() {
        return "SELECT 
                    SUM(c.Cumulative_cases) AS totalCasos,
                    SUM(c.Cumulative_deaths) AS totalMuertes
                FROM Cases c
                INNER JOIN Country p ON c.Country_code = p.codigo
                INNER JOIN Region r ON p.idRegion = r.idRegion
                WHERE r.nombreRegion = '" . $this->region . "'";
    }
}
?>
