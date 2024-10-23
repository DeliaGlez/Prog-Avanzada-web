<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'])) {
        $action = $_POST['accion'];

        $productController = new ProductController();

        switch ($action) {
            case 'store':
                $name = $_POST['name'];
                $slug = $_POST['slug'];
                $description = $_POST['description'];
                $features = $_POST['features'];
                $brand_id = $_POST['brand_id'];
                $categories = $_POST['categories'];
                $tags = $_POST['tags'];
                $cover = $_FILES['cover']['tmp_name'];

                $response = $productController->store($name, $slug, $description, $features, $brand_id, $categories, $tags,$cover);
                
                break;

            default:
                echo "Acción desconocida";
                break;
        }
    }
}


class ProductController {
    private $apiUrl = 'https://crud.jonathansoto.mx/api/products';

    public function getProducts() {
        $token = isset($_SESSION['token']) ? $_SESSION['token'] : '';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $token
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response, true); 
    }

    public function getProduct($slug){
        $token = isset($_SESSION['token']) ? $_SESSION['token'] : '';
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/'.$slug,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $token
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
    
        if ($response) {
            $data = json_decode($response, true);
            if (isset($data['data'])) {
                return $data['data'];
            }
        }else {
            return [];
        }       

       

    }
    public function store($name, $slug, $description, $features, $brand_id, $categories, $tags,$cover) {
        if (!isset($_SESSION['token'])) {
            echo "Token no encontrado. Debes iniciar sesión.";
            exit();
        }
        $token = isset($_SESSION['token']) ? $_SESSION['token'] : '';
    
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->apiUrl,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array(
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'features' => $features,
            'brand_id' => $brand_id,
            'cover'=> new CURLFILE($cover),
            'categories[0]' => $categories,  
            'tags[0]' => $tags,
          ),
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $token
          ),
        ));
    
        $response = curl_exec($curl);
        
        curl_close($curl);

        $responseData = json_decode($response, true);
        if (isset($responseData['data'])) {
            header("Location: index.php?success=ok");
        } else {
            header("Location: index.php?error=error");
        }

        return $response;
    }
    
}


?>
