<?php
/**
 * Uninstall file for Noptin WPUF User Status Trigger
 *
 * This file is executed when the plugin is uninstalled.
 */

// If uninstall not called from WordPress, exit
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Clean up any plugin-specific options or data here
// For this plugin, we don't need to clean up anything specific
// as we don't create any database tables or options 