<?php
// Verificar si se recibieron datos del formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verificar si se recibió el ID del profesor a editar
    if (isset($_POST["id"])) {
        // Incluir archivo de conexión a la base de datos
        require '../conexion.php';

        // Obtener los datos del formulario
        $id = $_POST["id"];
        $nota = $_POST["nota"];

        // Preparar la consulta SQL utilizando prepared statements para prevenir inyección SQL
        $sql = "UPDATE notas SET nota = ? WHERE id_nota = ?";
        
        // Preparar la declaración SQL
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Vincular los parámetros y ejecutar la consulta
            $stmt->bind_param("si", $nota, $id);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Redirigir al usuario al index con un mensaje de éxito
                header("Location: index.php?mensaje=exito");
                exit();
            } else {
                echo "Error al ejecutar la consulta: " . $stmt->error;
            }

            // Cerrar la declaración preparada
            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $conn->error;
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    } else {
        echo "Error: No se recibió el ID de la nota a editar";
    }
} else {
    echo "Acceso denegado";
}
?>