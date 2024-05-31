<?php
// Verificar si se recibió el ID del Grado a deshabilitar
if(isset($_GET['id'])) {
    // Conectar a la base de datos (suponiendo que ya tienes un archivo de conexión)
    require '../conexion.php';

    // Obtener el ID del Grado a deshabilitar
    $id = $_GET['id'];

    // Consultar la base de datos para deshabilitar al Grado
    $sql = "UPDATE grados SET estado=1 WHERE id_grado=$id";
    $conn->query($sql);

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "Error: No se recibió el ID del Grado a deshabilitar";
}
?>
