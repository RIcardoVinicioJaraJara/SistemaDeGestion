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
    <title>Gestión de usuario USER</title>
    <link rel='stylesheet' type='text/css' href='css/estilo.css'>
    <script type="text/javascript" src="js/metodos.js"></script>

</head>

<body onload="cambiar('1')">

    <ul class="menu">
        <li><a href="#" onclick="cambiar('1')" title="Enlace genérico">CORREOS</a></li>
        <li><a href="#" onclick="cambiar('2')" title="Enlace genérico">NUEVO CORREO</a></li>
        <li><a href="#" onclick="cambiar('3')" title="Enlace genérico">MI CUENTA</a></li>
    </ul>
    <div id=1>
        <?php
        $codigo = $_GET["codigo"];
        $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
        include '../../../config/conexionBD.php';
        $row = $conn->query($sql)->fetch_assoc();

        ?>
        <form id="formulario01" method="POST">
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
            <label for="cedula">Cedula (*)</label>
            <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" disabled />
            <br>
            <label for="nombres">Nombres (*)</label>
            <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"];
                                                                    ?>" disabled />
            <br>
            <label for="apellidos">Apelidos (*)</label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"];
                                                                        ?>" disabled />
            <br>
            <label for="direccion">Dirección (*)</label>
            <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"];
                                                                        ?>" disabled />
            <br>
            <label for="telefono">Teléfono (*)</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"];
                                                                    ?>" disabled />
            <br>
            <label for="fecha">Fecha Nacimiento (*)</label>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo
                                                                                        $row["usu_fecha_nacimiento"]; ?>" disabled />
            <br>
            <label for="correo">Correo electrónico (*)</label>
            <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" disabled />
            <br>
            <label for="ROL">Rol de Usuario (*)</label>
            <input type="text" id="rol" name="rol" value="<?php echo $row["usu_rol"]; ?>" disabled />
            <br>

            <a href="../../controladores/usuario/eliminar.php?codigo=<?php echo $row["usu_codigo"]; ?>&rol=USER&cod=<?php echo $row["usu_codigo"]; ?>"><input type="button" id=" eliminar " name=" eliminar " value=" Eliminar "></a>
            <a href="modificar.php?codigo=<?php echo $row["usu_codigo"]; ?>&rol=USER&cod=<?php echo $row["usu_codigo"]; ?>"><input type="button" id="modifcar" name="modifcar" value="Modificar"></a>
            <a href="cambiar_contrasena.php?codigo=<?php echo $row["usu_codigo"]; ?>&rol=USER&cod=<?php echo $row["usu_codigo"]; ?>"><input type="button" id="cambiar" name="cambiar" value="Cambiar Contraseña"></a>
            <a href="../../../public/vista/login.html"><input type="button" id="cancelar" name="cancelar" value="Salir"></a>
            <br>
            </form>
    </div>
    
    <div id="3">
        <?php
        include '../../../config/conexionBD.php';
        $sqlu = "SELECT * FROM usuario WHERE usu_codigo='$codigo';";
        $resultu = $conn->query($sqlu);
        $row = $resultu->fetch_assoc();
        ?>
        <header class="cabis">
            <p>NUEVO Mensaje</p>
        </header>
        <form id="formulario02" method="POST">
            <label for="destinatario">Correo Destinatario (*)</label>
            <input type="text" id="destinatario" name="destinatario" value="" placeholder="Ingrese el correo del destinatario
                                                        ..." required />
            <br>
            <label for="asunto"> Asunto (*)</label>
            <input type="text" id="asunto" name="asunto" value="" placeholder="Ingrese el asunto
                                                            ..." required />
            <br>
            <label for="mensaje">Mensaje (*)</label>
            <textarea id="mensaje" name="mensaje" placeholder="Ingrese el mensaje..." required></textarea>
            
            <br>
            <input type="hidden" id="emisor" name="asunto" value="<?php echo $row["usu_correo"]; ?>" >
             <input onclick="correo('<?php echo $row['usu_codigo']; ?>')" type="button" id="crearC" name="crearC" value="crearC">
            <input type="button" id="cancelar" name="cancelar" value="Cancelar" />
        </form>
    </div>

    <div id="2">
        <?php
        $codigo = $_GET["codigo"];
        include '../../../config/conexionBD.php';

        
        $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
        $row = $conn->query($sql)->fetch_assoc();

        ?>
        <form id="formulario01" method="POST">
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
            <label for="cedula">Cedula (*)</label>
            <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" disabled />
            <br>
            <label for="nombres">Nombres (*)</label>
            <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"];
                                                                    ?>" disabled />
            <br>
            <label for="apellidos">Apelidos (*)</label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"];
                                                                        ?>" disabled />
            <br>
            <label for="direccion">Dirección (*)</label>
            <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"];
                                                                        ?>" disabled />
            <br>
            <label for="telefono">Teléfono (*)</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"];
                                                                    ?>" disabled />
            <br>
            <label for="fecha">Fecha Nacimiento (*)</label>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo
                                                                                        $row["usu_fecha_nacimiento"]; ?>" disabled />
            <br>
            <label for="correo">Correo electrónico (*)</label>
            <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" disabled />
            <br>
            <label for="ROL">Rol de Usuario (*)</label>
            <input type="text" id="rol" name="rol" value="<?php echo $row["usu_rol"]; ?>" disabled />
            <br>

            <a href="../../controladores/usuario/eliminar.php?codigo=<?php echo $row["usu_codigo"]; ?>&rol=USER&cod=<?php echo $row["usu_codigo"]; ?>"><input type="button" id=" eliminar " name=" eliminar " value=" Eliminar "></a>
            <a href="modificar.php?codigo=<?php echo $row["usu_codigo"]; ?>&rol=USER&cod=<?php echo $row["usu_codigo"]; ?>"><input type="button" id="modifcar" name="modifcar" value="Modificar"></a>
            <a href="cambiar_contrasena.php?codigo=<?php echo $row["usu_codigo"]; ?>&rol=USER&cod=<?php echo $row["usu_codigo"]; ?>"><input type="button" id="cambiar" name="cambiar" value="Cambiar Contraseña"></a>
            <a href="../../../public/vista/login.html"><input type="button" id="cancelar" name="cancelar" value="Salir"></a>
            <br>
            </form>
    </div>
    </div>



    
</body>