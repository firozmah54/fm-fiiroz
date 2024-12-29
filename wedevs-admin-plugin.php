<?php 
/**
 * Plugin Name:Admin Plugin For WordPress
 * Plugin URI: https://wedevs.academy
 * Description:  how to admin plugin in  WordPress.
 * Version: 0.1.0
 * Author: Firoz mahmud
 * Author URI: https://firoz.co
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: ajax
 */

 if(!defined('ABSPATH')) {
    exit;
 }

 class Wedevs_Admin_plugin_settings{
    private static $instance;
    public static function get_instance(){
        if(!self::$instance){
            self::$instance=new self();
        }
        return self::$instance;
    }

    private function __construct(){
        $this->register_constants();
        $this->require_classes();
    }

    public function require_classes(){
        require_once __DIR__.'/includes/admin-plugins.php';

        new Wedevs_Fm_admin_plugin_settings();
    }
    /**
     * Registers constants for the plugin.
     *
     * @since 0.1.0
     */
    public function register_constants() {
        /**
         * The URL of the plugin directory.
         *
         * @since 0.1.0 
         */
        define('PLUGIN_DIR_URL', plugin_dir_url(__FILE__));
        /**
         * The path of the plugin directory.
         *
         * @since 0.1.0
         */
        define('PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
    }

 }

 Wedevs_Admin_plugin_settings ::get_instance();