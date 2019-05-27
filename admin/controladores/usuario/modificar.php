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
    <title>Modificar datos de persona </title>
    <link rel='stylesheet' type='text/css' href='css/estilo.css'>
</head>

<body>
    <?php
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    $cod = $_GET["cod"];
    $tipo = $_GET["rol"];

    $codigo = $_POST["codigo"];

    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
    $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]) : null;
    $rol = isset($_POST["rol"]) ? trim($_POST["rol"]) : null;

    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());

    $sql = "UPDATE usuario " .
        "SET usu_cedula = '$cedula', " .
        "usu_nombres = '$nombres', " .
        "usu_apellidos = '$apellidos', " .
        "usu_direccion = '$direccion', " .
        "usu_telefono = '$telefono', " .
        "usu_correo = '$correo', " .
        "usu_fecha_nacimiento = '$fechaNacimiento', " .
        "usu_fecha_modificacion = '$fecha', " .
        "usu_rol = '$rol' " .
        "WHERE usu_codigo = $codigo";

    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado los datos personales correctamemte!!!<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }
    if ($tipo == 'ADMIN') {
        echo "<a href=\"../../vista/usuario/index.php?codigo=$cod\"> <input type=\"button\" id=\"cancelar\" name=\"cancelar\" value=\"REGRESAR\"></a>";
    } else {
        echo "<a href=\"../../vista/usuario/index_usuario.php?codigo=$codigo\"> <input type=\"button\" id=\"cancelar\" name=\"cancelar\" value=\"REGRESAR\"></a>";
    }

    $conn->close();
    ?>
</body>

</html>