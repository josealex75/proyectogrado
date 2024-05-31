<?php
// Verificar si se recibió el ID del periodo a deshabilitar
if(isset($_GET['id'])) {
    // Conectar a la base de datos (suponiendo que ya tienes un archivo de conexión)
    require '../conexion.php';

    // Obtener el ID del periodo a deshabilitar
    $id = $_GET['id'];

    // Consultar la base de datos para deshabilitar a la periodo
    $sql = "UPDATE periodos SET estado=1 WHERE id_periodo =$id";
    if ($conn->query($sql) === TRUE) {
        // Redirigir al usuario al index con un mensaje de éxito
        header("Location: index.php?mensaje=deshabilitado");
        exit();
    } else {
        echo "Error al deshabilitar al periodo: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "Error: No se recibió el ID del periodo a deshabilitar";
}
?>