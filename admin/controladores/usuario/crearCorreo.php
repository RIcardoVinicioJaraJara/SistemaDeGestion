<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>CREAR CORREO</title>
</head>

<body>

</body>
<?php
include '../../../config/conexionBD.php';
$resptor = $_GET["destinatario"];
$asunto = $_GET["asunto"];
$mensaje = $_GET["mensaje"];
$emisor = $_GET['emisor'];
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

</html>