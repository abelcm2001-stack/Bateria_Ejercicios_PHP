<?php
// Procesa la operación cuando se han recibido los dos valores y el operador.
if (isset($_GET["valor1"]) && isset($_GET["valor2"]) && isset($_GET["operador"])) {
    $valor1 = $_GET["valor1"];
    $valor2 = $_GET["valor2"];
    $operador = $_GET["operador"];

    // Aplica la operación lógica o aritmética seleccionada.
    if ($operador == "and") {
        $resultado = ($valor1 && $valor2);
    } elseif ($operador == "or") {
        $resultado = ($valor1 || $valor2);
    } elseif ($operador == "xor") {
        $resultado = ($valor1 xor $valor2);
    } elseif ($operador == "+") {
        $resultado = $valor1 + $valor2;
    } elseif ($operador == "-") {
        $resultado = $valor1 - $valor2;
    } else {
        $resultado = "Operador no válido";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comparator</title>
</head>
<body>

    <h1>Comparator</h1>

    <form action="parte5.php" method="GET">

        <p>
            <label for="valor1">Primer valor:</label>
            <input type="text" name="valor1" id="valor1" required>
        </p>

        <p>
            <label for="operador">Operador:</label>
            <select name="operador" id="operador">
                <option value="and">and</option>
                <option value="or">or</option>
                <option value="xor">xor</option>
                <option value="+">+</option>
                <option value="-">-</option>
            </select>
        </p>

        <p>
            <label for="valor2">Segundo valor:</label>
            <input type="text" name="valor2" id="valor2" required>
        </p>

        <p>
            <input type="submit" value="Calcular">
        </p>

    </form>

    <?php
    // Muestra la operación; convierte los resultados booleanos en texto.
    if (isset($resultado)) {
        echo "<h2>Resultado:</h2>";
        echo $valor1 . " " . $operador . " " . $valor2 . " = ";

        if (is_bool($resultado)) {
            echo $resultado ? "true" : "false";
        } else {
            echo $resultado;
        }
    }
    ?>

</body>
</html>
