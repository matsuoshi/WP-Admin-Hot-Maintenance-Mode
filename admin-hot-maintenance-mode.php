<?php
/*
Plugin Name: Admin Hot Maintenance Mode
Description: Maintenance Mode for Non-administrator login users (editor, writer etc.)
Version: 1.0
Author: h.matsuo
Author URI: https://github.com/matsuoshi/WP-Admin-Hot-Maintenance-Mode
License: GPLv2
*/

add_action('admin_menu', 'admin_hot_maintenance_mode');

function admin_hot_maintenance_mode()
{
    if (current_user_can('administrator')) {
        return;
    }

    $title = esc_html(__('Maintenance'));
    $message = esc_html(__('Briefly unavailable for scheduled maintenance. Check back in a minute.'));
    $css_file = plugins_url('admin-hot-maintenance-mode.css', __FILE__);

    echo <<< _HTML_
<title>{$title}</title>
<link rel="stylesheet" href="{$css_file}">
<div class="container">
  <h1 class="message">{$message}</h1>
</div>
_HTML_;

    die();
}
