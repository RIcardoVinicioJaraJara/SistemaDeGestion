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
    <title>Modificar datos de persona</title>
    <link rel='stylesheet' type='text/css' href='css/estilo.css'>
</head>

<body>
    <?php
    $codigo = $_GET["codigo"];
    $rol = $_GET["rol"];
    $cod = $_GET["cod"];
    if ($rol == 'USER') {
        $dir = "index_usuario.php?codigo=$codigo";
    } else {
        $dir = "index.php?codigo=$cod";
    }
    ?>
    <form id="formulario01" method="POST" action="../../controladores/usuario/cambiar_contrasena.php?rol=<?php echo "$rol"; ?>">

        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
        <label for="cedula">Contraseña Actual (*)</label>
        <input type="password" id="contrasena1" name="contrasena1" value="" required placeholder="Ingrese su contraseña actual ..." />
        <br>
        <label for="cedula">Contraseña Nueva (*)</label>
        <input type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingrese su contraseña nueva ..." />
        <br>

        <input type="submit" id="modificar" name="modificar" value="Modificar" />
        <input type="reset" id="cancelar" name="cancelar" value="Cancelar" onclick='location.href=" <?php echo "$dir";  ?>"' />
    </form>
</body>

</html>