<?php
/**
 * CMCookiePlugin
 */

/*
 * Plugin Name:       Plugin With React JS My
 * Plugin URI:
 * Description:       This is a Corporatemeta Cookie Plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Jakir
 * Author URI:        http://wpwebdevs.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:
 * Text Domain:       cmcookie
 * Domain Path:       /languages
*/

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

//  Define constand
define('CM_COOKIE_VERSION', '1.0.0');
define('CM_COOKIE_FILE', __FILE__);
define('CM_COOKIE_PATH', dirname(CM_COOKIE_FILE));
define('CM_COOKIE_INC', CM_COOKIE_PATH . '/inc');
define('CM_COOKIE_URL', plugins_url('/', CM_COOKIE_FILE));
define('CM_COOKIE_ASSETS', CM_COOKIE_PATH . '/assets');

register_activation_hook(__FILE__, 'cm_cookie_activation');
function cm_cookie_activation(){
    flush_rewrite_rules();
}

register_deactivation_hook(__FILE__, 'cm_cookie_deactivation');
function cm_cookie_deactivation(){
    flush_rewrite_rules();
}

include_once CM_COOKIE_INC . '/cm-base.php';

