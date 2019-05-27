<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    include '../../../../config/conexionBD.php';
    $correo = $_GET['correo'];
    $sql = "SELECT * FROM usuario WHERE `usu_correo` = '$correo' and `usu_rol` = 'USER';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            echo "<input  id='cores' value='CORREO CORRECTO'>";
        }
    } else {
        echo "<input  id='cores' value='CORREO INCORRECTO'>";
    }
    $conn->close();
    ?>
</body>

</html>