<?php
/**
 * Plugin Name: User Preferences API Fetch
 * Description: A plugin to manage user preferences and fetch data from an API.
 * Version: 1.0
 * Author: Qasid Saleh
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Flush rewrite rules on activation and deactivation
register_activation_hook(__FILE__, 'upaf_activate_plugin');
register_deactivation_hook(__FILE__, 'upaf_deactivate_plugin');

function upaf_activate_plugin() {
    flush_rewrite_rules();
}

function upaf_deactivate_plugin() {
    flush_rewrite_rules();
}
