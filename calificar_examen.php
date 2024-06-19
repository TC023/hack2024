<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados del Examen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 600px;
            margin: 20px auto;
            padding: 0 20px;
        }
        h1 {
            text-align: center;
        }
        .results {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Resultados del Examen</h1>
    
    <?php
    // Verificar si se han enviado respuestas desde el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $respuestas_correctas = array(
            "q1" => "3",  // Respuesta correcta para 2 + __ = 5
            "q2" => "5",  // Respuesta correcta para 3 * __ = 15
            "q3" => "20", // Respuesta correcta para __ / 4 = 5
            "q4" => "5"   // Respuesta correcta para 10 - __ = 5
        );
        
        // Inicializar variables para el conteo de respuestas correctas
        $correctas = 0;
        
        // Iterar sobre las respuestas del formulario
        foreach ($_POST as $key => $value) {
            // Verificar si la respuesta es correcta
            if (array_key_exists($key, $respuestas_correctas) && $value == $respuestas_correctas[$key]) {
                $correctas++;
            }
        }
        
        // Mostrar el resultado al usuario
        echo '<div class="results">';
        echo '<p>Respuestas correctas: ' . $correctas . ' de ' . count($respuestas_correctas) . '</p>';
        echo '</div>';
    } else {
        // Si no se han enviado respuestas, mostrar un mensaje de error
        echo '<div class="results">';
        echo '<p>No se recibieron respuestas.</p>';
        echo '</div>';
    }
    ?>
    
</body>
</html>
