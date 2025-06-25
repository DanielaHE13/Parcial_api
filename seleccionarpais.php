<?php
require_once("../logica/Country.php");

$pais = new Country();
$paises = $pais->obtenerTodos();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Últimos 100 registros del país</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Seleccione un País</h2>

    <select name="pais" id="pais">
        <option value="">--Seleccione--</option>
        <?php
        foreach ($paises as $nombre) {
            echo "<option value='$nombre'>$nombre</option>";
        }
        ?>
    </select>

    <div id="resultados" style="margin-top:20px;"></div>

    <script>
        $(document).ready(function(){
            $('#pais').change(function(){
                let pais = $(this).val();
                if(pais !== ""){
                    $.ajax({
                        url: "ajax_ultimos100.php",
                        type: "POST",
                        data: { pais: pais },
                        success: function(response){
                            let registros = JSON.parse(response);
                            let html = "<h3>Últimos 100 registros</h3><table border='1'><tr><th>Fecha</th><th>Casos Nuevos</th><th>Casos Acumulados</th><th>Muertes Nuevas</th><th>Muertes Acumuladas</th></tr>";
                            registros.forEach(function(reg){
                                html += `<tr>
                                    <td>${reg.fecha}</td>
                                    <td>${reg.nuevos}</td>
                                    <td>${reg.acumulados}</td>
                                    <td>${reg.muertesNuevas}</td>
                                    <td>${reg.muertesAcumuladas}</td>
                                </tr>`;
                            });
                            html += "</table>";
                            $('#resultados').html(html);
                        }
                    });
                } else {
                    $('#resultados').html("");
                }
            });
        });
    </script>
</body>
</html>
