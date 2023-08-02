<?php

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');


class CM_Settings_Router
{
    private static $instance = null;

    public function __construct() {
        add_action( 'rest_api_init', [$this, 'CM_rest_init'] );
    }

    public function CM_rest_init() {
        register_rest_route( 'cmcookie/v1', '/settings', [
            'methods' => 'GET',
            'callback' => [$this, 'get_settings'],
            'permission_callback' => [$this, 'get_settings_permission'],
        ] );

        register_rest_route( 'cmcookie/v1', '/settings', [
            'methods' => 'POST',
            'callback' => [$this, 'save_settings'],
            'permission_callback' => [$this, 'save_settings_permission'],
        ] );
    }

    public function get_settings() {
        $cm_cookie = get_option('cm_cookie');
        $first = $cm_cookie['first'];
        $last = $cm_cookie['last'];
        $email = $cm_cookie['email'];
        $phone = $cm_cookie['phone'];
        $enable = $cm_cookie['enable_cookie'];
        $response = [
            'first' => $first,
            'last'  => $last,
            'email'     =>  $email,
            'phone'     =>  $phone,
            'enable_cookie' => $enable
        ];

        return rest_ensure_response($response);
    }

    public function get_settings_permission() {
        return true;
    }

    public function save_settings($req) {
        

        $cm_cookie = array(
            'first' => sanitize_text_field($req['firstname']),
            'last' => sanitize_text_field($req['lastname']),
            'email' => sanitize_text_field($req['email']),
            'phone' =>sanitize_text_field($req['phone']),
            'enable_cookie' => $req['enable_cookie']
        );

        update_option('cm_cookie', $cm_cookie);

        return rest_ensure_response($req);
    }

    public function save_settings_permission() {
        return true;
    }

    public static function instance() {
        if ( null === self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;
    }
}

CM_Settings_Router::instance();