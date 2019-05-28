<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    include '../../../../config/conexionBD.php';
    $asunto = $_GET['asunto'];
    $codigo = $_GET['cod'];
    if (strlen($asunto) > 1) {
        $sql = "SELECT * FROM correo WHERE `cor_asunto` LIKE '%$asunto%';";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo  "<table border>
                <tr>
                    <th> Asunto </th>
                    <th> Mensaje </th>
                    <th> Emisor </th>
                    <th> Reseptor </th>
                 </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td>" . $row["cor_asunto"] . "</td>";
                echo " <td>" . $row['cor_mensaje'] . "</td>";
                echo " <td>" . $row['cor_emisor'] . "</td>";
                echo " <td>" . $row['cor_reseptor'] . "</td>";
            }
            echo "</table border>";
        } else {
            echo "<input value='NO EXISTEN CORREOS'>";
        }
    }
    $conn->close();
    ?>
</body>

</html>