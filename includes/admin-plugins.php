
<?php 

class Wedevs_Fm_admin_plugin_settings{


    /**
     * Construct the class.
     *
     * @since 1.0.0
     */
    public function __construct(){
        /**
         * Register the main settings page for the Admin Plugin.
         *
         * @since 1.0.0
         */
        add_action('admin_menu', [$this, 'admin_menu_register_page']);
        add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_scripts']);
    }

    /**
     * Register the main settings page for the Admin Plugin.
     */
    public function admin_menu_register_page(){
        add_menu_page(
            /* page title */
            'Admin Plugin Settings',
            /* menu title */
            'Admin Plugin Settings',
            /* capability */
            'manage_options',
            /* menu slug */
            'fm_admin_plugin_settings',
            /* callback function */
            [$this, 'admin_plugin_settings_page_fm'],
            /* icon */
            'dashicons-admin-generic',
            /* position */
            64
        );
        add_submenu_page(
			/* parent menu slug */
			'fm_admin_plugin_settings',
			/* page title */
			'QR Code Settings',
			/* menu title */
			'QR Code Settings',
			/* capability */
			'manage_options',
			/* menu slug */
			'academy_qr_code_settings',
			/* callback function */
			array( $this, 'admin_plugin_settings_page_fm' )
		);
    }

    /**
     * Display the main settings page for the Admin Plugin.
     */
    public function admin_plugin_settings_page_fm() {
        // Output the title for the settings page
        echo '<div id="admin-plugin-settings"></div>';
    }


    
    /**
     * Enqueue the JS script for the settings page.
     *
     * @param string $hook The current admin page hook.
     *
     * @since 1.0.0
     */
    public function admin_enqueue_scripts( $hook ) {

        if( 'toplevel_page_fm_admin_plugin_settings' !== $hook ) {
            return;
        }
        /**
         * Get the asset data from the main.asset.php file.
         *
         * @see https://developer.wordpress.org/block-editor/how-to-guides/javascript/asset-manifest-file/
         *
         * @var array $assets_data
         */
        $assets_data = require PLUGIN_DIR_PATH . 'assets/js/settings/main.asset.php';

        /**
         * Enqueue the main.js script with its dependencies and version
         *
         * @uses wp_enqueue_script()
         */
        wp_enqueue_script(
            'admin-settings',
            PLUGIN_DIR_URL . 'assets/js/settings/main.js',
            $assets_data['dependencies'],
            $assets_data['version'],
            array(
                'in_footer'=>true
            )
        );
    }
}