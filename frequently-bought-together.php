<?php 
/*
 * Plugin Name:       Frequently Bought Together
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Used To Show the Frequently Brought Together Section.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Ajay Mathesh
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       automatic-delete-drafts
 * Domain Path:       /languages
 */

defined('ABSPATH') || exit;

defined('FBTP_PLUGIN_FILE') or define('FBTP_PLUGIN_FILE',__FILE__);
defined('FBTP_PLUGIN_PATH') or define('FBTP_PLUGIN_PATH',plugin_dir_path(__FILE__));
// print_r(FBTP_PLUGIN_PATH);
// autoload files
if(file_exists(FBTP_PLUGIN_PATH .'/vendor/autoload.php')){
   require FBTP_PLUGIN_PATH . '/vendor/autoload.php';
}else{
    wp_die('Error While Autoloading');
}

if(class_exists('FBTP\App\Route')){
    $route=new FBTP\App\Route();
    $route->hook();
}else{
    wp_die('Route Not Loaded');
}
