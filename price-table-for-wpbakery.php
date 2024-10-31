<?php
/*
Plugin Name: Price Table For WPBakery
Plugin URI: http://themelayer.net/
Description: Price Table Addons Pack for WPBakery
Author: Themelayer
Author URI: https://themelayer.net/
Text Domain: themelayer
Domain Path: /languages/
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
Version: 1.0
*/

/**
 * don't load directly
 * @return [null] [Load File]
 */
if (!defined('ABSPATH')) die('-1');
/**
 * Creating a class for loading all file
 */
class PTFWB_PriceTableForWPBakery {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'vc_before_init', array( $this, 'ptfwb_PicingTable' ), 99 );
    }
    protected static $instance = null;
    public static function instance() {
        if ( null == self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function ptfwb_PicingTable() {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'ptfwb_showVcVersionNotice' ));
            return;
        }
        include 'inc/tl-helper-function.php';
        include 'render/table/tl_table.php';
    }
    public function ptfwb_price_table_hextorgba($hex, $opacity = '1'){
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        return "rgba($r,$g,$b,$opacity)";
    }

    // Show notice if your plugin is activated but Visual Composer is not
    public function ptfwb_showVcVersionNotice() {
        $plugin_data = get_plugin_data(__FILE__);
        echo '
        <div class="updated">
          <p>'.sprintf(__('<strong>%s</strong> requires <strong><a href="http://bit.ly/vcomposer" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'vc_extend'), $plugin_data['Name']).'</p>
        </div>';
    }
}
// Finally initialize code
PTFWB_PriceTableForWPBakery::instance();
/**
 * Get template.
 */
function ptfwb_get_template( $template_name, $args = array(), $tempate_path = '', $default_path = '' ) {
    if ( is_array( $args ) && isset( $args ) ) :
        extract( $args );
    endif;
    $template_name = $template_name . '.php';
    $posts         = isset( $args['posts'] ) ? $args['posts'] : array();
    $params        = isset( $args['params'] ) ? $args['params'] : array();
    $template_file = ptfwb_locate_template( $template_name, $tempate_path, $default_path );
    if ( ! file_exists( $template_file ) ) :
        _doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $template_file ), '1.0.0' );
        return;
    endif;
    include $template_file;
}
/**
 * Locate template.
 * @return [null] [Load template file]
 */
function ptfwb_locate_template( $template_name, $template_path = '', $default_path = '' ) {
    // Set variable to search in woocommerce-plugin-templates folder of theme.
    if ( ! $template_path ) :
        $template_path = 'templates/';
    endif;
    // Set default plugin templates path.
    if ( ! $default_path ) :
        $default_path =  plugin_dir_path( __FILE__ ) . $template_path; // Path to the template folder
    endif;
    // Search template file in theme folder.
    $template = locate_template( array(
        'tl-course-builder/' . $template_path . $template_name,
        $template_name
    ));
    // Get plugins template file.
    if ( ! $template ) :
        $template = $default_path . $template_name;
    endif;
    return apply_filters( 'ptfwb_locate_template', $template, $template_name, $template_path, $default_path );
}

