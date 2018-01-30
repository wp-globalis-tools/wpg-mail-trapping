<?php
/**
 * Plugin Name:         WPG Mail Trapping
 * Plugin URI:          https://github.com/wp-globalis-tools/wpg-mail-trapping
 * Description:         Prevent sending emails from non-production environments
 * Author:              Pierre Dargham, Globalis Media Systems
 * Author URI:          https://www.globalis-ms.com/
 * License:             GPL2
 *
 * Version:             1.0.1
 * Requires at least:   4.0.0
 * Tested up to:        4.8.2
 */

namespace Globalis\WP\MailTrapping;

if (WP_ENV === 'production') {
    return;
}

if (!defined('WPG_MAIL_TRAPPING') || false === WPG_MAIL_TRAPPING) {
    return;
}

add_filter('wp_mail', function ($args) {
    if (is_array($args['to'])) {
        $original_recipients = implode(', ', $args['to']);
    } else {
        $original_recipients = $args['to'];
    }

    if (is_serialized(WPG_MAIL_TRAPPING)) {
        $args['to'] = unserialize(WPG_MAIL_TRAPPING);
    } elseif (is_string(WPG_MAIL_TRAPPING)) {
        $args['to'] = WPG_MAIL_TRAPPING;
    } else {
        $args['to'] = '';
    }

    if (defined('WP_HOME')) {
        $home_url = trailingslashit(WP_HOME);
    } else {
        $home_url = home_url('/');
    }
    $home_url = str_replace(['http://', 'https://'], ['', ''], $home_url);

    $args['subject'] = '[' . $home_url . ' : Mail to ' . $original_recipients . '] ' . $args['subject'];

    return $args;
});
