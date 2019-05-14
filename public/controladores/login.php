<?php
session_start();

include '../../config/conexionBD.php';
$usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
$contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
$sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password =
 MD5('$contrasena')";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$rol = $row["usu_rol"];
$cod = $row["usu_codigo"];
if ($result->num_rows > 0) {
    $_SESSION['isLogged'] = TRUE;
    if ($rol == 'ADMIN') {
        header("Location: ../../admin/vista/usuario/index.php?codigo=" . urlencode($cod));
    } else {
        header("Location: ../../admin/vista/usuario/index_usuario.php?codigo=" . urlencode($cod));
    }
} else {
    header("Location: ../vista/login.html");
}

$conn->close();
