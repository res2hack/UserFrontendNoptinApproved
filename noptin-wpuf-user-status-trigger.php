<?php
/**
 * Plugin Name: Noptin WPUF User Status Trigger
 * Plugin URI: https://annalotanusa.com
 * Description: Adds a custom trigger to Noptin for when wpuf_user_status meta is updated to "approved"
 * Version: 1.0.0
 * Author: Developer
 * License: GPL v2 or later
 * Text Domain: annalotanusa.com
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Main plugin class
 */
class Noptin_WPUF_User_Status_Trigger {

    /**
     * Constructor
     */
    public function __construct() {
        add_action('plugins_loaded', array($this, 'init'));
    }

    /**
     * Initialize the plugin
     */
    public function init() {
        // Check if Noptin is active
        if (!class_exists('Hizzle\Noptin\Objects\Store')) {
            add_action('admin_notices', array($this, 'noptin_missing_notice'));
            return;
        }

        // Add our custom trigger
        add_filter('noptin_user_collection_triggers', array($this, 'add_wpuf_user_status_trigger'));
        add_action('updated_user_meta', array($this, 'check_wpuf_user_status_update'), 10, 4);
    }

    /**
     * Display notice if Noptin is not active
     */
    public function noptin_missing_notice() {
        echo '<div class="notice notice-error"><p>';
        echo __('Noptin WPUF User Status Trigger requires the Noptin plugin to be installed and activated.', 'noptin-wpuf-user-status-trigger');
        echo '</p></div>';
    }

    /**
     * Add our custom trigger to Noptin
     *
     * @param array $triggers
     * @return array
     */
    public function add_wpuf_user_status_trigger($triggers) {
        $triggers['wpuf_user_status_approved'] = array(
            'id'          => 'wpuf_user_status_approved',
            'label'       => __('User > WPUF Status Approved', 'noptin-wpuf-user-status-trigger'),
            'description' => __('When a user\'s WPUF Status is updated to "approved"', 'noptin-wpuf-user-status-trigger'),
            'subject'     => 'user',
        );

        return $triggers;
    }

    /**
     * Check if wpuf_user_status meta was updated to "approved"
     *
     * @param int    $meta_id
     * @param int    $user_id
     * @param string $meta_key
     * @param mixed  $meta_value
     */
    public function check_wpuf_user_status_update($meta_id, $user_id, $meta_key, $meta_value) {
        // Only proceed if this is the wpuf_user_status meta key
        if ($meta_key !== 'wpuf_user_status') {
            return;
        }

        // Only trigger if the value is "approved"
        if ($meta_value !== 'approved') {
            return;
        }

        // Get the user object
        $user = get_userdata($user_id);
        if (!$user) {
            return;
        }

        // Get the Noptin user collection
        $collection = \Hizzle\Noptin\Objects\Store::get('user');
        if (!$collection) {
            return;
        }

        // Trigger the automation
        $args = array(
            'email'      => $user->user_email,
            'object_id'  => $user->ID,
            'subject_id' => $user->ID,
            'extra_args' => array(
                'user.wpuf_user_status' => $meta_value,
            ),
        );

        $collection->trigger('wpuf_user_status_approved', $args);
    }
}

// Initialize the plugin
new Noptin_WPUF_User_Status_Trigger(); 