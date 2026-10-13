<?php

// Obtiene las opciones enviadas o usa los valores iniciales del formulario.
$inicio = $_GET["inicio"] ?? "Yo en tu lugar";
$medio = $_GET["medio"] ?? "siempre hay que invertir en";
$final = $_GET["final"] ?? "la bolsa de valores.";
$frase = null;

// Reinicia las opciones o combina las elegidas para formar una frase.
if (isset($_GET["reset"])) {
    $inicio = "Yo en tu lugar";
    $medio = "siempre hay que invertir en";
    $final = "la bolsa de valores.";
    $frase = null;
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
            font-size: 1.1em;
            font-weight: bold;
        }

        .frase-final {
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <h1>Generador de frases cuñadas</h1>

    <form action="parte3.php" method="GET">

        <div class="fila">
            <label for="inicio">Elige el inicio:</label>
            <select id="inicio" name="inicio">
                <option value="Yo en tu lugar">Yo en tu lugar</option>
                <option value="La verdad es que">La verdad es que</option>
                <option value="Tú sabes que">Tú sabes que</option>
                <option value="No hay duda de que">No hay duda de que</option>
                <option value="Al final">Al final</option>
            </select>
        </div>

        <div class="fila">
            <label for="medio">Elige el comentario:</label>
            <select id="medio" name="medio">
                <option value="siempre hay que invertir en">Siempre hay que invertir en</option>
                <option value="lo importante es">Lo importante es</option>
                <option value="nunca subestimes">Nunca subestimes</option>
                <option value="yo siempre digo que">Yo siempre digo que</option>
                <option value="el secreto está en">El secreto está en</option>
            </select>
        </div>

        <div class="fila">
            <label for="final">Elige el final:</label>
            <select id="final" name="final">
                <option value="la bolsa de valores.">La bolsa de valores.</option>
                <option value="no tener el dinero congelado en el banco.">No tener el dinero congelado en el banco.</option>
                <option value="los chemtrails.">Los chemtrails.</option>
                <option value="la nube.">La nube.</option>
                <option value="las crypto.">Las crypto.</option>
            </select>
        </div>

        <button type="submit" name="generar" value="1">
            Generar frase
        </button>

        <button type="submit" name="reset" value="1">
            Reiniciar formulario
        </button>

    </form>

    <?php

    // Muestra la frase solo después de que el usuario la haya generado.
    if (isset($frase)) {
        echo "<p class='frase-final'><strong>Tu frase cuñada:</strong> " . $frase . "</p>";
    }

    ?>

</body>

</html>
