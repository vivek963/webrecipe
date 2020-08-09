<?php

class Restaurants extends CI_Controller {

    function restaurantsFood() {
        $message = $this->input->get('message');
        $data = array();
        $get_fields = 'query=' . $message;
         $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://restro-service.us-east-2.elasticbeanstalk.com/restrosearch/services/api/place/search?name=bar%20italia%20ristorante&lat=53.3472641&long=-6.226591099999999",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "X-API-Token: wiWqcp0ZcHXw",
        "Authorization: Basic cnlhbmRzejIzNDdAZ21haWwuY29tOjEyM0RyYWdvbiQ="
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    echo $response;

}

}