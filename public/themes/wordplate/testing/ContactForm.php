<?php

namespace Testing;

use \WP_REST_Request;
use KeriganSolutions\KMAMail\KMAMail;
use KeriganSolutions\KMAMail\Message;

class ContactForm
{
    public $name;
    public $email;
    public $request;
    public $success;
    public $comments;
    public $errorCode;
    public $errorMessage;

    const VALIDATION_ERROR = ['status' => 422];

    public function __construct()
    {
        add_action('rest_api_init', [$this, 'registerRoutes']);
    }

    public function submitContactForm(WP_REST_Request $request)
    {
        $this->request = $request;
        if ($this->hasErrors()) {
            return new \WP_Error($this->errorCode, $this->errorMessage, self::VALIDATION_ERROR);
        }
        $this->persistToDashboard();
        $this->sendEmail();

        return rest_ensure_response(json_encode(['message' => 'Success']));
    }

    public function sendEmail()
    {
        $headers  = 'MIME-Version: 1.0' . PHP_EOL;
        $headers .= 'Content-type: text/html; charset=utf-8' . PHP_EOL;

        $message = new Message();
        $message->setHeadline('New Contact Request')
                ->setBody($this->messageBody())
                ->setHeaders($headers)
                ->setSubject('New Contact Request')
                ->setPrimaryColor('#b73838')
                ->setSecondaryColor('#d74f0b')
                ->to($this->email);

        $mail = new KMAMail($message);
        $mail->send();
    }

    public function messageBody()
    {
        return '
        <p>You\'ve received a new contact request.</p>
        <table cellspacing="0" cellpadding="0" border="0" class="datatable">
            <tr><td>Name</td><td>' . $this->name . '</td></tr>
            <tr><td>Email</td><td>' . $this->email . '</td></tr>
            <tr><td>AdditionalInformation</td><td>' . $this->comments  . '</td></tr>
        </table>
        ';
    }

    /**
     * Add REST API routes
     */
    public function registerRoutes()
    {
        register_rest_route(
            'kerigansolutions/v1',
            '/submit-contact-form',
            [
                'methods' => 'POST',
                'callback' => [$this, 'submitContactForm']
            ]
        );
    }

    public function persistToDashboard()
    {
        $defaults = [
            'post_title'  => $this->name,
            'post_type'   => 'contact_request',
            'menu_order'  => 0,
            'post_status' => 'publish'
        ];

        $id = wp_insert_post($defaults);
        foreach ($this->request->get_params() as $key => $value) {
            if ($key !== 'name') {
                update_post_meta($id, $key, $value);
            }
        }
    }

    public function hasErrors()
    {
        $name =  $this->request->get_param('name') !== '' ? $this->request->get_param('name') : null;
        $email = $this->request->get_param('email') !== '' ? $this->request->get_param('email') : null;

        if ($name === null) {
            $this->errorCode = 'name_required';
            $this->errorMessage = 'The name field is required';

            return true;
        }
        if ($email === null) {
            $this->errorCode = 'email_required';
            $this->errorMessage = 'The email field is required';

            return true;
        }
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errorCode = 'invalid_email';
            $this->errorMessage = 'The email address you entered is invalid';

            return true;
        }

        $this->name = $name;
        $this->email = $email;

        return false;
    }
}
