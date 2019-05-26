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
    <title>Gestión de usuarios</title>

</head>

<body>
    <table border>
        <a href='../../../config/cerrar_sesion.php'>Cerrar Sesión </a>
        <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha Nacimiento</th>
            <th>Tipo de usuario</th>
            <th>Estado</th>
            <th colspan="3">OPCIONES</th>
        </tr>

        <?php
        include '../../../config/conexionBD.php';
        $codigo = $_GET["codigo"];
        $sql = "SELECT * FROM usuario";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td>" . $row["usu_cedula"] . "</td>";
                echo " <td>" . $row['usu_nombres'] . "</td>";
                echo " <td>" . $row['usu_apellidos'] . "</td>";
                echo " <td>" . $row['usu_direccion'] . "</td>";
                echo " <td>" . $row['usu_telefono'] . "</td>";
                echo " <td>" . $row['usu_correo'] . "</td>";
                echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
                echo " <td>" . $row['usu_rol'] . "</td>";

                if ($row['usu_eliminado'] == 'S') {
                    echo " <td>" . 'Eliminado' . "</td>";
                    echo " <td> <a href='reactivar.php?codigo=" . $row['usu_codigo'] . "&rol=ADMIN&cod=" . $codigo . "' > Activar </a></td> ";
                } else {
                    echo " <td> " . 'Activo' . "</td> ";
                    echo " <td><a href  ='eliminar.php?codigo=" . $row['usu_codigo'] . "&rol=ADMIN&cod=" . $codigo . "' >Eliminar </a></td>";
                }
                echo "   <td><a href='modificar.php?codigo="  . $row['usu_codigo'] . "&rol=ADMIN&cod=" . $codigo . "' >Modificar </a></td>";
                echo "   <td><a href='cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "&rol=ADMIN&cod=" . $codigo . "' > Cambiar Contraseña</a> </td>";

                echo "</tr>";
            }
        } else {

            echo "<tr>";
            echo " <td colspan='7'> No existen usuarios    registradas en el sistema  </td> ";
            echo "</tr>";
        }
        $conn->close();
        ?>



        </table border>
        <a h re f=" . . /.. /../p ublic/vis t a/logi  n.html ">
            <input type="button" id="cancelar" name="cancelar" value="Salir">
        </a>
</body>

</html>