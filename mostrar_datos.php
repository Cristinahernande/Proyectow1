<?php
$conexion = mysqli_connect('localhost', 'root', '', 'proyecto');

if (isset($_POST['actualizar'])) {
    $n_cuenta = $_POST['n_cuenta'];
    $nombre = $_POST['nombre'];
    $carrera = $_POST['carrera'];
    $semestre = $_POST['semestre'];

    $sql = "UPDATE alumno SET nombre = '$nombre', Carrera = '$carrera', semestre = '$semestre' WHERE n_cuenta = '$n_cuenta'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "Registros actualizados exitosamente.";
    } else {
        echo "Error al actualizar los registros: " . mysqli_error($conexion);
    }
}

if (isset($_GET['n_cuenta'])) {
    $n_cuenta_eliminar = $_GET['n_cuenta'];

    $sql = "DELETE FROM alumno WHERE n_cuenta = '$n_cuenta_eliminar'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "Registro eliminado exitosamente.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mostrar datos</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script>
        function toggleUpdateTable(index) {
            var table = document.getElementById('updateTable-' + index);
            table.style.display = table.style.display === 'none' ? 'table-row' : 'none';
        }
    </script>
</head>
<body>
    <br>
    <a href="index.html">regresar al inicio</a>
    <table border="1">
        <tr>
            <th>Número de cuenta</th>
            <th>Nombre</th>
            <th>Carrera</th>
            <th>Semestre</th>
            <th>Acciones</th>
        </tr>

        <?php
        $sql = "SELECT * FROM alumno";
        $result = mysqli_query($conexion, $sql);
        $index = 0;

        while ($mostrar = mysqli_fetch_array($result)) {
            $index++;
            ?>
            <tr>
                <td><?php if(isset($mostrar['n_cuenta'])) { echo $mostrar['n_cuenta']; } ?></td>
                <td><?php if(isset($mostrar['nombre'])) { echo $mostrar['nombre']; } ?></td>
                <td><?php if(isset($mostrar['Carrera'])) { echo $mostrar['Carrera']; } ?></td>
                <td><?php if(isset($mostrar['semestre'])) { echo $mostrar['semestre']; } ?></td>
                <td>
                    <button onclick="toggleUpdateTable(<?php echo $index ?>)">Actualizar</button>
                    <button onclick="eliminarRegistro(<?php echo $mostrar['n_cuenta'] ?>)">Eliminar</button>
                </td>
            </tr>
            <tr id="updateTable-<?php echo $index ?>" style="display: none;">

            <td colspan="4">
                <form method="post" action="">
                    <input type="hidden" name="n_cuenta" value="<?php echo $mostrar['n_cuenta'] ?>">
                    <input type="text" name="nombre" value="<?php echo $mostrar['nombre'] ?>">
                    <input type="text" name="carrera" value="<?php echo $mostrar['Carrera'] ?>">
                    <input type="text" name="semestre" value="<?php echo $mostrar['semestre'] ?>">
                    <input type="submit" name="actualizar" value="Actualizar">
                </form>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

</body>
</html>
<script>
    function eliminarRegistro(n_cuenta) {
        if (confirm("¿Estás seguro(a) de eliminar este registro?")) {
            window.location.href = "eliminar_registro.php?n_cuenta=" + n_cuenta;
        }
    }
</script>