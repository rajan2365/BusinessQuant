<?php
function my_plugin_handle_ajax() {
    check_ajax_referer('my_plugin_nonce', 'nonce');

    $name = sanitize_text_field($_POST['name']);
    $message = "Hello, " . $name . "!";

    wp_send_json_success(['message' => $message]);
}
add_action('wp_ajax_submit_user_name', 'my_plugin_handle_ajax');
add_action('wp_ajax_nopriv_submit_user_name', 'my_plugin_handle_ajax');
