<?php
require_once("../logica/Country.php");

$pais = new Country();
$paises = $pais->obtenerTodos();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seleccionar País</title>
</head>
<body>
    <h2>Seleccione un País</h2>
    <form method="post">
        <select name="pais" id="pais">
            <option value="">--Seleccione--</option>
            <?php
            foreach ($paises as $nombre) {
                echo "<option value='$nombre'>$nombre</option>";
            }
            ?>
        </select>
    </form>
</body>
</html>
