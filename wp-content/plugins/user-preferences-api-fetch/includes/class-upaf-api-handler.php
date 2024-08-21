<?php

class UPAF_API_Handler {

    private $api_url = 'https://httpbin.org/post';

    public function fetch_data($preferences) {
        $url = $this->api_url;

        // Prepare data to send to the API
        $data = array('preferences' => $preferences);
        
        // Initialize cURL
        $ch = curl_init($url);
        
        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        
        // Execute request and fetch response
        $response = curl_exec($ch);
        
        // Check for errors
        if (curl_errno($ch)) {
            $error_message = curl_error($ch);
            curl_close($ch);
            return new WP_Error('api_error', $error_message);
        }
        
        // Close cURL
        curl_close($ch);
        
        // Decode JSON response
        return json_decode($response, true);
    }
}
