<?php

namespace Testing;

use \WP_REST_Request;

class ContactForm
{
    public function __construct()
    {
        add_action('rest_api_init', [$this, 'registerRoutes']);
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

    public function submitContactForm(WP_REST_Request $request)
    {
        $name = $request->get_param('name') != '' ? $request->get_param('name') : null;
        $email = $request->get_param('email') !== '' ? $request->get_param('email') : null;

        $error = $this->validate($name, $email);

        if ($error) {
            return $error;
        }

        $id = wp_insert_post($defaults);

        foreach ($request->get_params() as $key => $value) {
            if ($key !== 'name') {
                update_post_meta($id, $key, $value);
            }
        }

        ////////////////////////////
        /* TODO: Send email here */
        //////////////////////////

        return rest_ensure_response(json_encode(['message' => 'Success']));
    }

    public function validate($name, $email)
    {
        if ($name === null) {
            return new \WP_Error('name_required', 'The name field is required', ['status' => 422]);
        }
        if ($email === null) {
            return new \WP_Error('email_required', 'The email field is required', ['status' => 422]);
        }
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return new \WP_Error('invalid_email', 'The email address you entered is invalid', ['status' => 422]);
        }

        return false;
    }
}
