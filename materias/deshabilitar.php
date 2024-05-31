<?php
// Verificar si se recibió el ID del Maretia a deshabilitar
if(isset($_GET['id'])) {
    // Conectar a la base de datos (suponiendo que ya tienes un archivo de conexión)
    require '../conexion.php';

    // Obtener el ID del Maretia a deshabilitar
    $id = $_GET['id'];

    // Consultar la base de datos para deshabilitar al Maretia
    $sql = "UPDATE materias SET estado=0 WHERE id_materia=$id";
    if ($conn->query($sql) === TRUE) {
        // Redirigir a materia al index con un mensaje de éxito
        header("Location: index.php?mensaje=deshabilitado");
        exit();
    } else {
        echo "Error al deshabilitar la Materia: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "Error: No se recibió el ID de la Materia a deshabilitar";
}
?>
