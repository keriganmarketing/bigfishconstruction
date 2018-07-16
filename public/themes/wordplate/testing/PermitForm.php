<?php

namespace Testing;

use \WP_REST_Request;

class PermitForm
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
            '/submit-permit-form',
            [
                'methods' => 'POST',
                'callback' => [$this, 'submitPermitForm']
            ]
        );
    }

    public function submitPermitForm(WP_REST_Request $request)
    {
        $name = $request->get_param('name') != '' ? $request->get_param('name') : null;
        $email = $request->get_param('email') !== '' ? $request->get_param('email') : null;
        if ($name === null) {
            return new \WP_Error('name_required', 'The name field is required', array('status' => 422));
        }
        if ($email === null) {
            return new \WP_Error('email_required', 'The email field is required', array('status' => 422));
        }
        $defaults = array(
            'post_title' => $name,
            'post_type' => 'planning_request',
            'menu_order' => 0,
            'post_status' => 'publish'
        );

        $id = wp_insert_post($defaults);

        foreach ($request->get_params() as $param => $value) {
            if ($param !== 'name') {
                update_post_meta($id, $param, $value);
            }
        }

        ////////////////////////////
        /* TODO: Send email here */
        //////////////////////////

        return rest_ensure_response(json_encode(['message' => 'Success']));
    }
}
