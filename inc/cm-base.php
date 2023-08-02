<?php
/**
 * CMCookiePlugin
 */
final class CM_Cookie_Plugin
{

    protected static $_instance = null;

    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function __construct() {
        $this->init_hooks();
        $this->init_includes();
    }

    public function init_hooks() {
        require_once( CM_COOKIE_INC . "/settingsApi.php" );
        require_once( CM_COOKIE_INC . "/cm-setting-router.php" );
        add_action('plugins_loaded', array($this, 'cmcookie_load_text_domain'));
    }

    public function cmcookie_load_text_domain() {
        load_plugin_textdomain('cmcookie', false, dirname( plugin_basename( CM_COOKIE_FILE ) ) . '/languages');
    }

    // Includes requried files
    public function init_includes() {
        include_once CM_COOKIE_INC . '/functions.php';
    }
}

if ( ! function_exists( 'cm_cookie' ) ) {
    function cm_cookie() {
        return CM_Cookie_Plugin::instance();
    }
}

cm_cookie();