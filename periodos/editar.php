<?php
// Verificar si se recibieron datos del formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibió el ID del Periodo a editar
    if (isset($_POST["id"])) {
        // Conectar a la base de datos (suponiendo que ya tienes un archivo de conexión)
        require '../conexion.php';

        // Obtener el ID del Periodo a editar
        $id = $_POST["id"];

        // Recuperar los datos del formulario
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
        $ano = isset($_POST["ano"]) ? $_POST["ano"] : '';        

        // Actualizar los datos del periodo en la base de datos
        $sql = "UPDATE periodos SET n_periodo ='$nombre', ano = '$ano' WHERE id_periodo"=id;
        if ($conn->query($sql) === TRUE) {
            // Redirigir al usuario al index con un mensaje de éxito
            header("Location: index.php?mensaje=exito");
            exit();
        } else {
            echo "Error al actualizar los datos del periodo: " . $conn->error;
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    } else {
        echo "Error: No se recibió el ID del periodo a editar";
    }
} else {
    echo "Acceso denegado";
}
?>
