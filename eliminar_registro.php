<?php
$conexion = mysqli_connect('sql109.epizy.com', 'epiz_34224033', 'Dh0OEQojVMsA', 'epiz_34224033_escuela');

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
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($conexion);
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
                <td><?php echo $mostrar['n_cuenta'] ?></td>
                <td><?php echo $mostrar['nombre'] ?></td>
                <td><?php echo $mostrar['Carrera'] ?></td>
                <td><?php echo $mostrar['semestre'] ?></td>
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
<button type="submit" name="actualizar">Actualizar</button>
</form>
</td>
</tr>
<?php
     }
     ?>
</table>

</body>
</html>

