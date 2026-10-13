
<?php
// Prepara el texto del resultado y los símbolos posibles del dado.
$salida = "";
$dados = ["⚀", "⚁", "⚂", "⚃", "⚄", "⚅"];

// Si se ha enviado el formulario, genera y muestra una tirada aleatoria.
if (isset($_GET["lanzar"])) {
    $resultado = rand(1, 6);
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

    <form action="Parte1.php" method="GET">
        <button type="submit" name="lanzar" value="1">
            Lanzar dado
        </button>
    </form>

    <p class="resultado"><?php echo $salida; ?></p>

</body>

</html>
