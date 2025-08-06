# Noptin WPUF User Status Trigger

A WordPress plugin that adds a custom trigger to the Noptin newsletter plugin for when a user's `wpuf_user_status` meta is updated to "approved".

## Description

This plugin extends the Noptin newsletter plugin by adding a new automation trigger that fires when a user's `wpuf_user_status` user meta is updated to "approved". This is particularly useful for WordPress User Frontend Pro (WPUF) users who want to send automated emails when a user's status is approved.

## Requirements

- WordPress 6.6 or higher
- Noptin newsletter plugin (free or pro version)
- PHP 7.4 or higher

## Installation

1. Upload the plugin folder to your `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. The new trigger will be available in Noptin automation rules

## Usage

After activating the plugin, you can create automation rules in Noptin that trigger when a user's status is approved:

1. Go to **Noptin > Automation Rules** in your WordPress admin
2. Click **Add New** to create a new automation rule
3. In the trigger section, you'll see a new option: **"User > WPUF Status Approved"**
4. Select this trigger and configure your automation actions
5. Save the automation rule

## Available Merge Tags

When using this trigger, you have access to the following merge tags:

- `{{user.email}}` - User's email address
- `{{user.first_name}}` - User's first name
- `{{user.last_name}}` - User's last name
- `{{user.display_name}}` - User's display name
- `{{user.wpuf_user_status}}` - The approved status value

## How It Works

The plugin hooks into WordPress's `updated_user_meta` action to monitor when user meta is updated. When the `wpuf_user_status` meta key is updated to "approved", it triggers the Noptin automation system.

## Changelog

### Version 1.0.0
- Initial release
- Adds custom trigger for wpuf_user_status approval
- Integrates with Noptin automation system

## Support

For support or feature requests, please contact the plugin author (restu.gandhi@gmail.com).

## License

This plugin is licensed under the GPL v3 or later. 

# Business Inquiries
We are open to business contracts and collaborations.

Please reach out via email: restu.gandhi@gmail.com
