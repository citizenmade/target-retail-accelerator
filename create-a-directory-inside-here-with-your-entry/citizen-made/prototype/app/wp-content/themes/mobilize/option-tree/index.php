<?php
/*
Plugin Name: OptionTree
Plugin URI: http://wp.envato.com
Description: Customizable WordPress Theme Options Admin Interface
Version: 1.1.7.1
Author: Derek Herman
Author URI: http://valendesigns.com
License: GPLv2
*/

/**
 * Definitions
 *
 * @since 1.0.0
 */
define( 'OT_VERSION', '1.1.7.1' );
define( 'OT_PLUGIN_DIR', get_template_directory() . '/option-tree' );
define( 'OT_PLUGIN_URL', THEME_URL . 'option-tree' );

/**
 * Required Files
 *
 * @since 1.0.0
 */
require_once( OT_PLUGIN_DIR . '/functions/functions.load.php' );
require_once( OT_PLUGIN_DIR . '/classes/class.admin.php' );

/**
 * Instantiate Classe
 *
 * @since 1.0.0
 */
$ot_admin = new OT_Admin();
    if(isset($_POST['flv-reinstall-table'])){
        $ot_admin->option_tree_default_data("on");
    }
    if(isset($_POST['flv-reinstall-opts'])){
        $ot_admin->option_tree_default_data("on", "on");
    }
    else if ( (is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php')) {
        $ot_admin->option_tree_default_data("off");
        add_action('admin_head', 'flv_activated');
    }

    
    function flv_activated(){
        ?>
<script>
        jQuery(document).ready(function($){
            $('#message').html('<h3>mobilizefolio theme activated.</h3><p>The default options have been installed if you have not had the theme installed before.</p>')
        })
    </script>
    <?php
    }
    
/**
 * Wordpress Activate/Deactivate
 *
 * @uses register_activation_hook()
 * @uses register_deactivation_hook()
 *
 * @since 1.0.0
 */

/**
 * Required action filters
 *
 * @uses add_action()
 *
 * @since 1.0.0
 */
add_action( 'init', array( $ot_admin, 'create_option_post' ), 5 );
add_action( 'admin_init', array( $ot_admin, 'option_tree_init' ) );
add_action( 'admin_menu', array( $ot_admin, 'option_tree_admin' ) ,2);
add_action( 'wp_ajax_option_tree_array_save', array( $ot_admin, 'option_tree_array_save' ) );
add_action( 'wp_ajax_option_tree_array_reload', array( $ot_admin, 'option_tree_array_reload' ) );
add_action( 'wp_ajax_option_tree_array_reset', array( $ot_admin, 'option_tree_array_reset' ) );
add_action( 'wp_ajax_option_tree_add', array( $ot_admin, 'option_tree_add' ) );
add_action( 'wp_ajax_option_tree_edit', array( $ot_admin, 'option_tree_edit' ) );
add_action( 'wp_ajax_option_tree_delete', array( $ot_admin, 'option_tree_delete' ) );
add_action( 'wp_ajax_option_tree_next_id', array( $ot_admin, 'option_tree_next_id' ) );
add_action( 'wp_ajax_option_tree_sort', array( $ot_admin, 'option_tree_sort' ) );
add_action( 'wp_ajax_option_tree_import_data', array( $ot_admin, 'option_tree_import_data' ) );
add_action( 'wp_ajax_option_tree_update_export_data', array( $ot_admin, 'option_tree_update_export_data' ) );
add_action( 'wp_ajax_option_tree_add_slider', array( $ot_admin, 'option_tree_add_slider' ) );
add_action( 'wp_ajax_option_tree_save_layout', array( $ot_admin, 'option_tree_save_layout' ) );
add_action( 'wp_ajax_option_tree_delete_layout', array( $ot_admin, 'option_tree_delete_layout' ) );
add_action( 'wp_ajax_option_tree_activate_layout', array( $ot_admin, 'option_tree_activate_layout' ) );
add_action( 'wp_ajax_option_tree_import_layout', array( $ot_admin, 'option_tree_import_layout' ) );
add_action( 'wp_ajax_option_tree_update_export_layout', array( $ot_admin, 'option_tree_update_export_layout' ) );