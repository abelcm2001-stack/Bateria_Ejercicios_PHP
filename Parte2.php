<?php
// Asocia cada resultado numérico del dado con su símbolo.
$dados = ["⚀", "⚁", "⚂", "⚃", "⚄", "⚅"];

// Inicia la sesión para conservar el historial entre peticiones.
session_start();

// Crea el historial solo la primera vez que se visita la página.
if (!isset($_SESSION["resultados"])) {
    $_SESSION["resultados"] = [];
}

// Guarda aquí el resultado que se mostrará en esta petición.
$salida = "";

// Al pulsar el botón, genera una tirada y la añade al historial.
if (isset($_GET["lanzar"])) {
    $resultado = rand(1, 6);
    $_SESSION["resultados"][] = $resultado;
    $salida = "Resultado: " . $resultado . " " . $dados[$resultado - 1];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lanzamiento de dados</title>
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }
        .resultado { font-size: 3rem; }
    </style>
</head>

<body>

    <h1>Lanzamiento de dados</h1>
    <form action="Parte2.php" method="GET">
    <form action="Parte2.php" method="GET">
        <button type="submit" name="lanzar" value="1">
            Lanzar dado
        </button>
    </form>

    <p class="resultado"><?php echo $salida; ?></p>

    <h2>Histórico de lanzamientos</h2>
    <p>
        <?php
        // Recorre las tiradas guardadas y muestra su número y símbolo.
        foreach ($_SESSION["resultados"] as $resultado) {
            echo $resultado . " " . $dados[$resultado - 1] . "<br>";
        }
        ?>
    </p>

</body>

</html>