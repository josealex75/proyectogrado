<?php
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibió el campo obligatorio "nombre"
    if (isset($_POST["nombre"]) && !empty($_POST["nombre"])) {
        // Conectar a la base de datos (suponiendo que ya tienes un archivo de conexión)
        require '../conexion.php';
       
        // Recuperar el campo obligatorio "nombre"
        $nombre = $_POST["nombre"];

        // Recuperar los campos opcionales si están presentes
        $id_periodo=""
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
        $ano = isset($_POST["ano"]) ? $_POST["ano"] : '';
        $estado=1
        // Insertar los datos en la base de datos
        
        $sql = "INSERT INTO periodos ('id_periodo','n_periodo', 'ano','estado') VALUES ('$nombre','$ano','$estado')";
       
        if ($conn->query($sql) === TRUE) {
            // Redirigir al usuario al index con un mensaje de éxito
            header("location: index.php");
            exit();
        } else {
            echo "Error al insertar los datos: " . $conn->error;
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    } else {
        echo "El campo 'nombre' es obligatorio";
    }
} else {
    echo "Acceso denegado";
}
?>
