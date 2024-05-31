<?php
// Verificar si se recibieron datos del formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verificar si se recibió el ID del Materia a editar
    if (isset($_POST["id"])) {
        // Conectar a la base de datos (suponiendo que ya tienes un archivo de conexión)
        require '../conexion.php';

        // Obtener el ID del Materia a editar
        $id = $_POST["id"];
        // Recuperar los datos del formulario
        $nombre = $_POST["nombre"];
        $contenido = $_POST["contenido"];

       
        // Actualizar los datos del Materia en la base de datos
        $sql = "UPDATE materias SET n_materia = '$nombre', contenido ='$contenido_materia' WHERE id_materia =$id";
        if ($conn->query($sql) === TRUE) {
            // Redirigir al usuario al index con un mensaje de éxito
            header("Location: index.php?mensaje=exito");
            exit();
        } else {
            echo "Error al actualizar los datos del Materia: " . $conn->error;
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    } else {
        echo "Error: No se recibió el ID del Materia a editar";
    }
} else {
    echo "Acceso denegado";
}
?>
