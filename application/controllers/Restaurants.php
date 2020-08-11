<?php

class Restaurants extends CI_Controller {

    function restaurantsFood() {
        $headerValue = array(
            "X-API-Token: wiWqcp0ZcHXw",
            "Authorization: Basic cnlhbmRzejIzNDdAZ21haWwuY29tOjEyM0RyYWdvbiQ="
        );
        $url = 'http://restro-service.us-east-2.elasticbeanstalk.com/restrosearch/services/api/place/search?name=restaurants&lat=53.3472641&long=-6.226591099999999';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerValue);

        $res = curl_exec($ch);
        curl_close($ch);

        print_r($res);
    }

}
