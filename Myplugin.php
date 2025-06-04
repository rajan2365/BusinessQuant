<?php


define('MY_PLUGIN_URL', plugin_dir_url(__FILE__));

// Enqueue scripts and styles
function my_plugin_enqueue_assets() {
    wp_enqueue_style('my-plugin-style', MY_PLUGIN_URL . 'css/style.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('my-plugin-script', MY_PLUGIN_URL . 'js/script.js', array('jquery'), null, true);

    wp_localize_script('my-plugin-script', 'myPluginAjax', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('my_plugin_nonce')
    ]);
}
add_action('wp_enqueue_scripts', 'my_plugin_enqueue_assets');

// Shortcode to load form
function my_plugin_shortcode() {
    ob_start();
    include plugin_dir_path(__FILE__) . 'templates/form-template.php';
    return ob_get_clean();
}
add_shortcode('my_plugin_form', 'my_plugin_shortcode');

// AJAX handler
require_once plugin_dir_path(__FILE__) . 'includes/ajax-handler.php';
