<?php
/**
 * CMCookiePlugin
 */


defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');


class SettingsApi
{
    private static $instance = null;

    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'addAdminMenu' ) );
    }

    public function addAdminMenu() {

        add_menu_page(__('CM Cookie', 'cmcookie'), __('CM Cookie Plugin', 'cmcookie'), 'manage_options', 'cm-cookie-plugin', [$this, 'cm_setting_page']);

    }

    public function cm_setting_page(){
        echo '<div class="wrap"><div id="cmmeta-admin-app"></div></div>';
    }

    public static function instance()
    {
        if (null === self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }
}

SettingsApi::instance();