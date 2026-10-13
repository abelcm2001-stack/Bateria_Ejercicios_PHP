<?php

// Arrays con las partes disponibles para construir las frases.
$inicios = [
    "Yo en tu lugar",
    "La verdad es que",
    "Tú sabes que",
    "No hay duda de que",
    "Al final"
];
$medios = [
    "siempre hay que invertir en",
    "lo importante es",
    "nunca subestimes",
    "yo siempre digo que",
    "el secreto está en"
];
$finales = [
    "la bolsa de valores.",
    "no tener el dinero congelado en el banco.",
    "los chemtrails.",
    "la nube.",
    "las crypto."
];

// Define las selecciones iniciales y valida las opciones recibidas.
$inicioPredeterminado = $inicios[0];
$medioPredeterminado = $medios[0];
$finalPredeterminado = $finales[0];
$inicio = in_array($_GET["inicio"] ?? null, $inicios, true) ? $_GET["inicio"] : $inicioPredeterminado;
$medio = in_array($_GET["medio"] ?? null, $medios, true) ? $_GET["medio"] : $medioPredeterminado;
$final = in_array($_GET["final"] ?? null, $finales, true) ? $_GET["final"] : $finalPredeterminado;
$frase = null;

// Reinicia el formulario, genera una combinación aleatoria o usa las opciones.
if (isset($_GET["reset"])) {
    $inicio = $inicioPredeterminado;
    $medio = $medioPredeterminado;
    $final = $finalPredeterminado;
    $frase = null;
} elseif (isset($_GET["aleatoria"])) {
    $inicio = $inicios[array_rand($inicios)];
    $medio = $medios[array_rand($medios)];
    $final = $finales[array_rand($finales)];
    $frase = $inicio . " " . $medio . " " . $final;
} elseif (isset($_GET["generar"])) {
    $frase = $inicio . " " . $medio . " " . $final;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Generador de frases cuñadas</title>
    <style>
        .fila {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .fila label {
            min-width: 140px;
            display: inline-block;
        }

        .frase-final {
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <h1>Generador de frases cuñadas</h1>

    <form action="Parte4.php" method="GET">

        <div class="fila">
            <label>Elige el inicio:</label>
            <select name="inicio">
                <?php foreach ($inicios as $opcion): ?>
                    <option value="<?php echo htmlspecialchars($opcion, ENT_QUOTES, "UTF-8"); ?>" <?php echo $inicio === $opcion ? "selected" : ""; ?>>
                        <?php echo htmlspecialchars($opcion, ENT_QUOTES, "UTF-8"); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="fila">
            <label>Elige el comentario:</label>
            <select name="medio">
                <?php foreach ($medios as $opcion): ?>
                    <option value="<?php echo htmlspecialchars($opcion, ENT_QUOTES, "UTF-8"); ?>" <?php echo $medio === $opcion ? "selected" : ""; ?>>
                        <?php echo htmlspecialchars(ucfirst($opcion), ENT_QUOTES, "UTF-8"); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="fila">
            <label>Elige el final:</label>
            <select name="final">
                <?php foreach ($finales as $opcion): ?>
                    <option value="<?php echo htmlspecialchars($opcion, ENT_QUOTES, "UTF-8"); ?>" <?php echo $final === $opcion ? "selected" : ""; ?>>
                        <?php echo htmlspecialchars(ucfirst($opcion), ENT_QUOTES, "UTF-8"); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" name="generar" value="1">
            Generar frase
        </button>

        <button type="submit" name="aleatoria" value="1">
            Generar frase aleatoria
        </button>

        <button type="submit" name="reset" value="1">
            Reiniciar formulario
        </button>

    </form>

    <?php

    // Escapa el texto antes de mostrar la frase dentro del HTML.
    if (isset($frase)) {
        echo "<p class='frase-final'><strong>Tu frase cuñada:</strong> " . htmlspecialchars($frase, ENT_QUOTES, "UTF-8") . "</p>";
    }

    ?>

</body>

</html>