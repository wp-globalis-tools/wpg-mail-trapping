<?php
/**
 * Plugin Name:         WPG Mail Trapping
 * Plugin URI:          https://github.com/wp-globalis-tools/wpg-mail-trapping
 * Description:         Prevent sending emails from non-production stages
 * Author:              Pierre Dargham, Matthieu Guerry, Globalis Media Systems
 * Author URI:          https://github.com/wp-globalis-tools/
 *
 * Version:             0.2.0
 * Requires at least:   4.0.0
 * Tested up to:        4.7.1
 */

namespace Globalis\MailTrapping;

if (WP_ENV !== 'production' && defined('WPG_MAIL_TRAPPING') && false != WPG_MAIL_TRAPPING) {
	add_filter('wp_mail', function($args) {
		$recipients = @unserialize(WPG_MAIL_TRAPPING);
		if(is_array($args['to'])) {
			$original_recipients = implode(', ', $args['to']);
		}
		else {
			$original_recipients = $args['to'];
		}
		if(is_array($recipients)) {
			if(defined('WP_HOME')) {
				$env = str_replace(['http://', 'https://'], ['', ''], WP_HOME);
			} else {
				$env = WP_ENV;
			}
			$args['to'] = $recipients;
			$args['subject'] = '[' . $env . ' : Mail to '.$original_recipients.'] '.$args['subject'];
		}
		return $args;
	});
}
