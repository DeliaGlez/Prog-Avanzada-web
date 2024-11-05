<?php 
if (!isset($_SESSION)) {
	session_start();
}

class BrandController
{


	public function get()
	{
		$token = isset($_SESSION['token']) ? $_SESSION['token'] : '';
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
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

        $result = json_decode($response, true);

        if (isset($result['data'])) {
            return $result['data'];
        }

        return [];
	}

}

?>