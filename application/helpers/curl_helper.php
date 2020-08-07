<?php

function _call_curl($curl_array, $curl_type, $request_type) { //$curl_array['url','header','postdata'],$curl_type('get/post')
    //validate parameter
    $response['success'] = FALSE;
    if (is_array($curl_array) && (count($curl_array) == 0)) {
        $response['message'] = 'fail';
        $response['error_type'] = '1';
        echo json_encode($response);
        exit;
    }

    if (!is_array($curl_array)) {
        $response['message'] = 'fail';
        $response['error_type'] = '2';
        echo json_encode($response);
        exit;
    }

    // curl header

    $curl_url = $curl_array['url'];
    $ci = &get_instance();
    //    echo "<pre>";
    //    print_r($ci->session->userdata());
    //    exit;
    if (!empty($ci->session->userdata('logged_in'))) {
        $user_id = $ci->session->userdata('user_id');
        $authorization = $ci->session->userdata('authorization');
    } else {
        $user_id = 0;
        $authorization = "";
    }

    $curl_array['header'] = [
        'Client-Service: ' . CLIENT_SERVICE,
        'Auth-key: ' . AUTH_KEY,
        'ID: ' . $user_id,
        'Authorization: ' . $authorization,
    ];
    //     echo '<pre>';
    //    print_r($curl_array);
    //    exit;
    // curl submit
    $request_headers = $curl_array['header'];

    $ch = curl_init();
    if ($curl_type == 'post') {
        $postdata = $curl_array['postdata'];
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    }

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($ch, CURLOPT_URL, $curl_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    $data = curl_exec($ch);
    // echo '<pre>';
    // print_r($data);
    // exit;
    //  validate response
    if (curl_errno($ch)) {
        $response['message'] = curl_error($ch);
        $response['error_type'] = '1';
        return json_encode($response);
        exit;
    } else { //success
        $transaction = json_decode($data, TRUE);
        // print_r($transaction);
        // exit;
        curl_close($ch);
        if ($request_type == 'ajax') {
            if (json_encode($transaction) == 'null') {
                $transaction['success'] = false;
                $transaction['message'] = 'Unable to reach what you are looking for. We are working on it. Please try again later.';
                $transaction['error_type'] = '5';
                //$transaction['error_type'] = '7'; //temp
            }
        } else {
            if (json_encode($transaction) == 'null') {
                //                set flash data for load view curl requests handle global
                $flash_data = array('curl_error' => 'ERROR', 'message' => 'Unable to reach what you are looking for. We are working on it. Please try again later.');
                $ci->session->set_flashdata($flash_data);
                //                redirect('league_mode');
            } else if ($transaction['success'] == false && $transaction['error_type'] == 2) {
                redirect('login/logout');
            }
        }
        return json_encode($transaction);
        exit;
    }
}
