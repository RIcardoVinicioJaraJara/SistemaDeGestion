<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    include '../../../../config/conexionBD.php';
    $codigo = $_GET['cod'];

    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "UPDATE correo SET cor_eliminado = 'S', corr_fecha_modificacion = '$fecha' WHERE
    cor_codigo = $codigo";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha eliminado los datos correctamemte!!!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
    $conn->close();
    ?>
</body>

</html>