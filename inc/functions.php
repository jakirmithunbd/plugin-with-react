<?php

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');


class CM_Cookie_functions
{
    private static $instance = null;

    public function __construct() {
        add_action( 'admin_enqueue_scripts', [$this, 'CM_load_scripts'] );
    }

/**
 * Loading Necessary Scripts
 */
    public function CM_load_scripts() {
        wp_enqueue_style( 'wp-react-kickoffds-style', CM_COOKIE_URL . '/assets/admin/css/style.css', array(), wp_rand(), false );
        wp_enqueue_script( 'wp-react-kickoffds', CM_COOKIE_URL . '/build/bundle.js', [ 'jquery' ], wp_rand(), true );

        wp_localize_script( 'wp-react-kickoffds', 'appLocalizer', [
            'apiUrl' => home_url( '/wp-json' ),
            'cm_nonce' => wp_create_nonce( 'wp_rest' ),
        ] );
    }

    
    public static function instance() {
        if ( null === self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;
    }
}

CM_Cookie_functions::instance();