<?php

class Home extends CI_Controller {

    public function index() {
        $data['main'] = 'home_view';
        $this->load->view('layouts/main_view', $data);
    }

    public function about() {

        $data['main'] = 'about';
        $this->load->view('layouts/main_view', $data);
    }

    public function contact() {

        $data['main'] = 'contact';
        $this->load->view('layouts/main_view', $data);
    }

    public function skeyword() {

        $data['main'] = 'skeyword';
        $this->load->view('layouts/main_view', $data);
    }

    public function nutrition() {

        $data['main'] = 'nutrition';
        $this->load->view('layouts/main_view', $data);
    }

    public function restaurants() {

        $data['main'] = 'restaurants';
        $this->load->view('layouts/main_view', $data);
    }

    public function login() {
        if ($this->session->userdata('logged_in')) {
            redirect('Home');
            exit;
        } else {
            $this->load->view('login');
        }
    }

    public function forgot() {
        if ($this->session->userdata('logged_in')) {
            redirect('Home');
            exit;
        } else {
            $this->load->view('forgot');
        }
    }

    public function otp() {
        if ($this->session->userdata('logged_in')) {
            redirect('Home');
            exit;
        } else {
            $this->load->view('otp');
        }
    }

    public function newpassword() {
        if ($this->session->userdata('logged_in')) {
            redirect('Home');
            exit;
        } else {
            $this->load->view('newpassword');
        }
    }

    public function recipepage($recipe_id) {
        $data = array();
        $data['recipeId'] = $recipe_id;

        $curl_array['url'] = API_BASEURL . 'Recipe/getRecipeData';
        $curl_array['postdata'] = $data;
        $curl_type = 'post';
        $decod_json = json_decode(_call_curl($curl_array, $curl_type, 'ajax'), true);
        // echo '<pre>';
        //print_r($decod_json);
        // exit;
        if ($decod_json['success'] == true) {
            $data['recipeData'] = $decod_json['recipeData'];
        } else {
            $data['recipeData']['failure'] = "No Data Found";
        }
        $data['main'] = 'recipepage';
        $this->load->view('layouts/main_view', $data);
    }

    public function allrecipe() {
        if ($this->session->userdata('logged_in')) {
            $data['main'] = 'allrecipe';
            $this->load->view('layouts/main_view', $data);
        } else {
            $this->load->view('login');
        }
    }

}

?>