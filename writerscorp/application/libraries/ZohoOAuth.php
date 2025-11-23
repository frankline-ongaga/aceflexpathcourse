<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ZohoOAuth {

    private $client_id;
    private $client_secret;
    private $refresh_token;
    private $token_url;

    public function __construct() {
        // Load the configuration file
        $this->load->config('zoho_oauth');

        // Assign configuration values to properties
        $this->client_id = $this->config->item('zoho_client_id');
        $this->client_secret = $this->config->item('zoho_client_secret');
        $this->refresh_token = $this->config->item('zoho_refresh_token');
        $this->token_url = $this->config->item('zoho_token_url');
    }

    /**
     * Get a new access token using the refresh token.
     *
     * @return string|bool The new access token or false on failure.
     */
    private function get_new_access_token() {
        $postData = [
            'refresh_token' => $this->refresh_token,
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'grant_type' => 'refresh_token'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->token_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            log_message('error', "Error fetching access token: $error");
            return false;
        }

        $responseData = json_decode($response, true);

        if (isset($responseData['access_token'])) {
            return $responseData['access_token'];
        } else {
            log_message('error', 'Failed to retrieve access token: ' . $response);
            return false;
        }
    }

    /**
     * Public method to get a new access token.
     *
     * @return string|bool The new access token or false on failure.
     */
    public function getAccessToken() {
        return $this->get_new_access_token();
    }

    /**
     * Send an email using Zoho Mail API.
     *
     * @param string $to The recipient email address.
     * @param string $subject The email subject.
     * @param string $message The email message.
     * @return bool|string The API response or false on failure.
     */
    public function send_mail($to, $subject, $message) {
        // Get a new access token
        $access_token = $this->get_new_access_token();

        if (!$access_token) {
            log_message('error', 'Failed to retrieve access token for sending email.');
            return false;
        }

        // Load the HTML email template
        $html_mail = file_get_contents(base_url() . "assets/templates/contact-us.html");

        if (!$html_mail) {
            log_message('error', 'Failed to load email template.');
            return false;
        }

        // Replace placeholders in the template
        $data = array(
            "message" => $message,
        );

        $placeholders = array(
            "%MESSAGE%"
        );

        $final_mail = str_replace($placeholders, $data, $html_mail);

        // Zoho Mail API endpoint
        $url = "https://mail.zoho.com/api/accounts/1082206000000008004/messages";

        // Prepare the email data
        $email_data = [
            "fromAddress" => "support@aceflexpathcourse.com",
            "toAddress" => $to,
            "bccAddress" => "henrykuto@gmail.com",
            "subject" => $subject,
            "content" => $final_mail,
            "askReceipt" => "yes"
        ];

        // Set the headers
        $headers = [
            "Accept: application/json",
            "Content-Type: application/json",
            "Authorization: Zoho-oauthtoken $access_token"
        ];

        // Send the email using cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($email_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            log_message('error', "cURL Error while sending email: $error");
            return false;
        }

        // Log the response for debugging
        log_message('debug', "Zoho Mail API Response: $response");

        return $response;
    }

    // Load CodeIgniter's core classes
    public function __get($property) {
        return get_instance()->$property;
    }
}