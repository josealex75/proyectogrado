document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    var correo = document.getElementById('correo').value;
    var contrasena = document.getElementById('contrasena').value;
    
    // Realizar solicitud al servidor para verificar las credenciales
    fetch('/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        
        body: JSON.stringify({
            correo: correo,
            contrasena: contrasena
        })
    })

    
    .then(response => {
        if (!response.ok) {
            throw new Error('Error en la solicitud.');
        }
        return response.json();
    })
    .then(data => {
        // Manejar la respuesta del servidor
        if (data.success) {
            // Redireccionar al usuario a su página de inicio o dashboard
            window.location.href = 'index.php';
        } else {
            document.getElementById('error-message').textContent = data.message;
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
