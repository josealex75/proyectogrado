<?php
// Verificar si se recibieron datos del formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verificar si se recibió el ID del profesor a editar
    if (isset($_POST["id"])) {
        // Conectar a la base de datos (suponiendo que ya tienes un archivo de conexión)
        require '../conexion.php';

        // Obtener el ID del profesor a editar
        $id = $_POST["id"];
        // Recuperar los datos del formulario
        $materia = $_POST["n_materia"];
        $documento = $_POST["id_usuario"];
        $grado = $_POST["n_grado"];
        $nota= $_POST["nota"];

        
       
        // Actualizar los datos del profesor en la base de datos
        $sql = "UPDATE notas SET id_nota='',nota = $nota,id_materia = $materia ,id_usuario = $documento,id_periodo= $periodo WHERE id_usuario = $documento;";
        if ($conn->query($sql) === TRUE) {
            // Redirigir al usuario al index con un mensaje de éxito
            header("Location: index.php?mensaje=exito");
            exit();
        } else {
            echo "Error al actualizar los datos del Profesor: " . $conn->error;
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    } else {
        echo "Error: No se recibió el ID del profesor a editar";
    }
} else {
    echo "Acceso denegado";
}
?>
