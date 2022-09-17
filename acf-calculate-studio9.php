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
require_once('vendor/autoload.php');
function acf_calculate_studio9_script()
{
    wp_enqueue_script('wordifyfa' , plugins_url('acf-calculate-studio9') . '/asset/wordifyfa.js' , ['jquery']);
    wp_enqueue_script('acf-calculate-studio' ,
        plugins_url('acf-calculate-studio9') . '/asset/script.js' ,
        ['jquery']);
}

add_action('wp_enqueue_scripts' , 'acf_calculate_studio9_script');
add_action('admin_enqueue_scripts' , 'acf_calculate_studio9_script');
add_filter('page_template' , function($page_template)
{
    if(isset($_REQUEST['action']) and $_REQUEST['action'] == 'acf-print' and isset($_REQUEST['submission']))
    {
        require_once dirname(__FILE__) . '/page-template-print.php';
        exit();
    }

    return $page_template;
});
add_filter('theme_page_templates' , function($post_templates , $wp_theme , $post , $post_type)
{
    $post_templates[dirname(__FILE__) . '/page-template-print.php'] = __('page-template-print');

    return $post_templates;
} , 10 , 4);
add_action('acf_frontend/after_form' , function($post)
{
    if(isset($post['submission']))
    {
        ?>
        <a class="button"
           href="<?=site_url()?>/print?action=acf-print&submission=<?=$post['submission']?>">Print</a>
        <?php
    }
});
require_once 'admin-setting.php';
