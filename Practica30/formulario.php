<?php
$servidor = "localhost";
$puerto = "3308";
$usuario = "root";
$clave = "";
$bd = "registrocontactos";

$conexion = mysqli_connect($servidor . ":" . $puerto, $usuario, $clave, $bd);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro contactos</title>
</head>

<body>
    <form action="#" name="registrocontactos" method="post">
        <input type="text" name="Nombre" placeholder="Nombre">
        <input type="text" name="Apellidos" placeholder="Apellidos">
        <input type="text" name="Telefono" placeholder="Teléfono">
        <input type="email" name="Correo" placeholder="Correo electrónico">
        <input type="text" name="TallaCamisa" placeholder="Talla de camisa">
        <input type="text" name="Comentarios" placeholder="Comentarios">

        <input type="submit" name="registro" value="Registro">
    </form>
</body>

</html>

<?php
if (isset($_POST['registro'])) {
    $nombre = $_POST['Nombre'];
    $apellidos = $_POST['Apellidos'];
    $telefono = $_POST['Telefono'];
    $correo = $_POST['Correo'];
    $talla_camisa = $_POST['TallaCamisa'];
    $comentarios = $_POST['Comentarios'];

    $guardar = "INSERT INTO contactos (nombre, apellidos, telefono, correo, talla_camisa, comentarios) VALUES ('$nombre', '$apellidos', '$telefono', '$correo', '$talla_camisa', '$comentarios')";

    $ejecutar = mysqli_query($conexion, $guardar);

    if ($ejecutar) {
        echo "Registro exitoso";
    } else {
        echo "Error al registrar: " . mysqli_error($conexion);
    }
}
?>
