<?php
$conexion = mysqli_connect('localhost', 'root', '', 'proyecto');

if (isset($_POST['agregar'])) {
    $n_cuenta = $_POST['n_cuenta'];
    $nombre = $_POST['nombre'];
    $carrera = $_POST['carrera'];
    $semestre = $_POST['semestre'];

    $sql = "INSERT INTO alumno (n_cuenta, nombre, Carrera, semestre) VALUES ('$n_cuenta', '$nombre', '$carrera', '$semestre')";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "Registro agregado exitosamente.";
    } else {
        echo "Error al agregar el registro: " . mysqli_error($conexion);
    }
}
?>

<?php
$conexion = mysqli_connect('localhost', 'root', '', 'escuela');

if (isset($_POST['agregar'])) {
    $n_cuenta = $_POST['n_cuenta'];
    $nombre = $_POST['nombre'];
    $carrera = $_POST['carrera'];
    $semestre = $_POST['semestre'];

    $sql = "INSERT INTO alumno (n_cuenta, nombre, Carrera, semestre) VALUES ('$n_cuenta', '$nombre', '$carrera', '$semestre')";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "Registro agregado exitosamente.";
    } else {
        echo "Error al agregar el registro: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Registro</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<a href="index.html">regresar al inicio</a>
    <div class="formulario">
        <h1>Agregar Registro</h1>
        <form method="post" action="">
            <div class="username">
                <input type="text" name="n_cuenta" required>
                <label>Número de cuenta</label>
            </div>
            <div class="username">
                <input type="text" name="nombre" required>
                <label>Nombre</label>
            </div>
            <div class="username">
                <input type="text" name="carrera" required>
                <label>Carrera</label>
            </div>
            <div class="username">
                <input type="text" name="semestre" required>
                <label>Semestre</label>
            </div>
            <input type="submit" name="agregar" value="Agregar">
        </form>
    </div>
</body>
</html>
</html>
