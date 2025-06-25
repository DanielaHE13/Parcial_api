<?php
require_once("../logica/Region.php");

$region = new Region();
$regiones = $region->obtenerTodas();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Casos por Región</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Seleccione una Región</h2>

    <form id="formRegion">
        <select name="region" id="region">
            <option value="">--Seleccione--</option>
            <?php
            foreach ($regiones as $nombreRegion) {
                echo "<option value='$nombreRegion'>$nombreRegion</option>";
            }
            ?>
        </select>
    </form>

    <div id="resultado" style="margin-top: 20px;"></div>

    <script>
        $(document).ready(function(){
            $('#region').change(function(){
                let region = $(this).val();
                if(region !== ""){
                    $.ajax({
                        url: "ajax_totales.php",
                        method: "POST",
                        data: { region: region },
                        success: function(response){
                            let datos = JSON.parse(response);
                            $('#resultado').html(
                                `<p><strong>Casos acumulados:</strong> ${datos.totalCasos}</p>
                                 <p><strong>Muertes acumuladas:</strong> ${datos.totalMuertes}</p>`
                            );
                        }
                    });
                } else {
                    $('#resultado').html("");
                }
            });
        });
    </script>
</body>
</html>
