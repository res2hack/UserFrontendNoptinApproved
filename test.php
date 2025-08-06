<?php
/**
 * Test file for Noptin WPUF User Status Trigger
 * 
 * This file can be used to test the plugin functionality.
 * Remove this file in production.
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Test function to simulate wpuf_user_status update
 * 
 * Usage: Call this function to test the trigger
 */
function test_wpuf_user_status_trigger($user_id = 1) {
    // Update the user meta to trigger our plugin
    update_user_meta($user_id, 'wpuf_user_status', 'approved');
    
    echo "Test completed. Check if the Noptin trigger was fired for user ID: " . $user_id;
}

// Uncomment the line below to run the test (only in development)
// add_action('init', function() { test_wpuf_user_status_trigger(); }); 