<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Eliminar datos de persona </title>
    <link rel='stylesheet' type='text/css' href='css/estilo.css'>
</head>

<body>
    <?php
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    $cod = $_GET["cod"];
    $rol = $_GET["rol"];

    $codigo = isset($_POST["codigo"]) ? trim($_POST["codigo"]) : trim($_GET["codigo"]);

    //Si voy a eliminar físicamente el registro de la tabla
    //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());

    $sql = "UPDATE usuario SET usu_eliminado = 'N', usu_fecha_modificacion = '$fecha' WHERE
    usu_codigo = $codigo";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha eliminado los datos correctamemte!!!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }

    if ($rol == 'ADMIN') {
        echo "<a href=\"../../vista/usuario/index.php?codigo=$cod\"> <input type=\"button\" id=\"cancelar\" name=\"cancelar\" value=\"REGRESAR\"></a>";
    } else {
        echo '<a href="../../../public/vista/login.php"> <input type="button" id="cancelar" name="cancelar" value="Salir"></a>';
    }
    $conn->close();

    ?>
</body>

</html>