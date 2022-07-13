<?php
/**
 * Plugin Name:      محاسبه مجموع هزینه در افزونه acf
 * Plugin URI:        https://webslash.ir/portfolio/acf-calculate
 * Description:      محاسبه هزینه در افزونه acf
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.3
 * Author:            Amir Abbas Mahvari
 * Author URI:        https://webslash.ir/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wb-quiz
 */
function wpdocs_scripts_method() {
    wp_enqueue_script( 'custom-script', plugins_url('acf-calculate-studio9') . '/asset/script.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_scripts_method' );
?>

