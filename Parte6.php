<?php
// Define la frase original y la separa en palabras.
$frase = "Hace frío mucho frío tiempo frío que frío me frío estoy frío quedando frío contigo frío";

$palabras = explode(" ", $frase);

// Conserva las palabras en posiciones impares (índices pares del array).
$impares = array();

for ($i = 0; $i < count($palabras); $i++) {
    if ($i % 2 == 0) {
        $impares[] = $palabras[$i];
    }
}

// Une las palabras seleccionadas para formar la frase final.
$resultado = implode(" ", $impares);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Palabras impares</title>
</head>
<body>

    <h1>Frase original</h1>

    <?php
    // Muestra la frase original.
    echo $frase;
    ?>

    <h1>Frase con palabras en posición impar</h1>

    <?php
    // Muestra la frase formada por las palabras seleccionadas.
    echo $resultado;
    ?>

</body>
</html>
