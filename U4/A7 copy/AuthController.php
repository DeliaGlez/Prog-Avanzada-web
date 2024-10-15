<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'])) {
        $action = $_POST['accion'];

        $authController = new AuthController();

        switch ($action) {
            case 'login':
                $email = $_POST['correo'];
                $password = $_POST['contrasenia'];
                $authController->login($email, $password);
                break;

            case 'logout':
                $authController->logout();
                break;

            default:
                echo "Acción no válida.";
                break;
        }
    } else {
        echo "No se ha especificado ninguna acción.";
    }
}

class AuthController
{
    public function login($email = null, $password = null)
    {
        // Inicializa cURL
        $curl = curl_init();

        // Configura las opciones de cURL
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'email' => $email,       // El email que ingresó el usuario
                'password' => $password  // La contraseña ingresada por el usuario
            ),
            CURLOPT_HTTPHEADER => array(
                'Cookie: XSRF-TOKEN=eyJpdiI6IklHOVVXZVJqdFlxYTM3TkZlYmpHUmc9PSIsInZhbHVlIjoiTGZvV0V1c1h1K2Z3QUI1WDE3QTJvVzdwN0UrWjdFR2pEUUVLZGVNRFY2aWdMMFptVzdCSTBVcUl2ZGxZcUVROTM4cFVHVFNlZlVONUZsRXl2YTBJNWxLeDluWUFIZ0JrL0s5RU4xMSs5NmhJbkRXTmt3OHlnUFV0RjlqZXBqTmUiLCJtYWMiOiIzMDllYmFmMDY5MjdlN2ZmOGY1YmI5YjhhOGFjM2Q3ZDE2ZmE3MGMzNGE3NzdmNmY5ZTZjNDhkNjcwOWFmZTAzIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IllwVndIWXFMUXlDSXcyYXhkcVcrdXc9PSIsInZhbHVlIjoiZWQwOC9zMThwaFE3REF4TW1FeHA4WVZXSHhUS0J2YmxpRmpUa2V3VW90SzA0ZytiUlpKdUV0NlIxNHNrOWVZazYwYjVUblZhUngrNktEMlUvSUUvMi85M0hwWTFJVzhFM1Z6bGlGY3RDUG1xRm9vZHpmVG4yaERhUkZScWVWblQiLCJtYWMiOiJkM2RmYmFiMTc5NmFjYzgyY2QxNWQzZTlhY2EwZTg4MjNkMWU5ZGE2ZjVmZTgxYzkyNTA1ZTk4ZTg0Y2FjOTc1IiwidGFnIjoiIn0%3D'
            ),
        ));

        // Ejecuta la solicitud cURL
        $response = curl_exec($curl);

        // Cierra la sesión de cURL
        curl_close($curl);

        // Muestra la respuesta (esto es para propósitos de depuración)
        echo $response;

        // Podrías procesar la respuesta aquí, por ejemplo, decodificar el JSON si la respuesta es JSON
        $data = json_decode($response, true);

        if ($data && isset($data['success']) && $data['success']) {
            // Inicio de sesión exitoso
            //  echo "Inicio de sesión exitoso. Bienvenido, $email";
            header('Location: index.php');
            exit();
        } else {
            // Error en el inicio de sesión
            echo "Error: " . ($data['message'] ?? 'No se pudo iniciar sesión.');
        }
    }

    public function logout()
    {
        echo "Cerrando sesión";
    }
}
?>
