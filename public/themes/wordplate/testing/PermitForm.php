<?php

namespace Testing;

use \WP_REST_Request;

class PermitForm
{
    public function __construct()
    {
        $this->registerRoutes();
    }
    /**
     * Add REST API routes
     */
    public function registerRoutes()
    {
        add_action('rest_api_init', [$this, 'registerRoutes']);
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
        return rest_ensure_response(json_encode($request->get_params()));
    }
}
