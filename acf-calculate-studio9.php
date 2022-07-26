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
require_once(ABSPATH . '/wp-admin/includes/plugin.php');
function acf_calculate_studio9_script()
{
    wp_enqueue_script('wordifyfa' , plugins_url('acf-calculate-studio9') . '/asset/wordifyfa.js' , ['jquery']);
    wp_enqueue_script('acf-calculate-studio' , plugins_url('acf-calculate-studio9') . '/asset/script.js' , ['jquery']);
}

add_action('wp_enqueue_scripts' , 'acf_calculate_studio9_script');
add_action('admin_enqueue_scripts' , 'acf_calculate_studio9_script');
add_action('acf_frontend/after_form' , function($post)
{
    ?>
    <button type="button" class=" button" data-state="publish" onclick="window.print()">Print</button>
    <?php
});
