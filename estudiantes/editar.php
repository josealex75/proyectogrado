<?php
// Verificar si se recibieron datos del formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verificar si se recibió el ID del Estudiante a editar
    if (isset($_POST["id"])) {
        // Conectar a la base de datos (suponiendo que ya tienes un archivo de conexión)
        require '../conexion.php';

        // Obtener el ID del Estudiante a editar
        $id = $_POST["id"];
        // Recuperar los datos del formulario

        $usuario = $_POST["usuario"];
        $nombre = $_POST["nombre"];
        $apellidos= $_POST["apellidos"];
        $email = $_POST["email"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        
       
        // Actualizar los datos del Estudiante en la base de datos
        $sql = "UPDATE usuarios SET usuario = '$usuario', n_usuario='$nombre', a_usuario = '$apellidos', correo_usuario='$email',direccion = '$direccion' , telefono='$telefono' WHERE id_usuario=$id";
        if ($conn->query($sql) === TRUE) {
            // Redirigir al usuario al index con un mensaje de éxito
            header("Location: index.php?mensaje=exito");
            exit();
        } else {
            echo "Error al actualizar los datos del Estudiante: " . $conn->error;
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    } else {
        echo "Error: No se recibió el ID del Estudiante a editar";
    }
} else {
    echo "Acceso denegado";
}
?>
