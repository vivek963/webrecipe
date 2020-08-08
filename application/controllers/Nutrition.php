<?php

class Nutrition extends CI_Controller {

    function calulateFood() {
        $message = $this->input->post('message');
        $data = array();
        $post_fields = 'query=' . $message;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://trackapi.nutritionix.com/v2/natural/nutrients",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $post_fields,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded",
                "x-app-id: 347a1c31",
                "x-app-key: ecc3052533ca227b9e3f977626a2e3ed"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

}

?>
