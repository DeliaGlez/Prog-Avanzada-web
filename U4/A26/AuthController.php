<?php
session_start();  

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
                echo "Accion desconocida";
                break;
        }
    }
}

class AuthController
{
    public function login($email = null, $password = null)
    {
        $curl = curl_init();
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
                'email' => $email,       
                'password' => $password  
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response, true);

        if (isset($data['data']['token'])) {
            $_SESSION['token'] = $data['data']['token'];
            $_SESSION['user_id'] = $data['data']['id']; 
            $_SESSION['user_name'] = $data['data']['name']; 
            $_SESSION['user_email'] = $data['data']['email']; 
            header('Location: home');
        } else {
            header('Location: login');
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: login');
    }
}
 

?>
