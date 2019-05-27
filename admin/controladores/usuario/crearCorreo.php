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
    <title>CORREO</title>
    <link rel='stylesheet' type='text/css' href='css/estilo.css'>
</head>

<body>
    <?php
    include '../../../config/conexionBD.php';
    $resptor = trim($_GET["destinatario"]);
    $asunto = trim($_GET["asunto"]);
    $mensaje =  trim($_GET["mensaje"]);
    $emisor = trim($_GET["emisor"]);;
    echo "<p>$resptor la vaca losa </p>";
    echo "<p>$asunto</p>";
    echo "<p>$mensaje</p>";
    echo "<p>$emisor</p>";
    $cod = $_GET['cod'];
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());

    $sql = "INSERT INTO correo VALUES (0, '$fecha', '$emisor', '$resptor', '$asunto', '$mensaje', 'N', null)";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha enviado  correctamemte!!!</p>";
    }

    //cerrar la base de datos
    $conn->close();
    echo "<a href='../../vista/usuario/index_usuario.php?codigo=$cod'>Regresar</a>";
    ?>
</body>

</html>