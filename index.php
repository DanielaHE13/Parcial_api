<?php
require_once("../logica/Region.php");
?>



$region = new Region();
$regiones = $region->obtenerTodas();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seleccionar Región</title>
</head>
<body>
    <h2>Seleccione una Región</h2>
    <form method="post">
        <select name="region" id="region">
            <?php
            foreach ($regiones as $nombreRegion) {
                echo "<option value='$nombreRegion'>$nombreRegion</option>";
            }
            ?>
        </select>
    </form>
</body>
</html>
