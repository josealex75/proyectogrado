<?php
// Verificar si se recibió el ID del profesor a deshabilitar
if(isset($_GET['id'])) {
    // Conectar a la base de datos (suponiendo que ya tienes un archivo de conexión)
    require '../conexion.php';

    // Obtener el ID del profesor a deshabilitar
    $id = $_GET['id'];

    // Consultar la base de datos para deshabilitar al profesor
    $sql = "UPDATE usuarios SET estado=1 WHERE id_usuario=$id";
    $conn->query($sql);

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "Error: No se recibió el ID del profesor a deshabilitar";
}
?>
