<?php

class Recipe extends CI_Controller {

    function getRecipes() {
        $curl_array['url'] = API_BASEURL . 'Recipe/getRecipes';
        $curl_type = 'get';
        $decod_json = json_decode(_call_curl($curl_array, $curl_type, 'ajax'), true);
        // echo '<pre>';
        //print_r($decod_json);
        // exit;
        echo json_encode($decod_json);
    }

    function signup() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $name = $this->input->post('name');
        $data = array();
        $data['email'] = $email;
        $data['password'] = $password;
        $data['name'] = $name;
        $curl_array['url'] = API_BASEURL . 'Oauth/signup';
        $curl_array['postdata'] = $data;
        $curl_type = 'post';
        $decod_json = json_decode(_call_curl($curl_array, $curl_type, 'ajax'), true);
        // echo '<pre>';
        //print_r($decod_json);
        // exit;
        if ($decod_json['success'] == true) {
            //if (!empty($decod_json['user_data'])) {
            $session_data = array(
                'user_id' => $decod_json['userData']['user_id'],
                'authorization' => $decod_json['token'],
                'logged_in' => TRUE,
            );
            $this->session->set_userdata($session_data);
            // print_r($_SESSION);
            // exit;
            //}
        }
        // exit;
        echo json_encode($decod_json);
    }

    function logout() {
        session_destroy();
        redirect('Home');
    }

}

?>