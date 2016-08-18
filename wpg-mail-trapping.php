<?php
/**
 * Plugin Name:         WPG Mail Trapping
 * Plugin URI:          https://github.com/wp-globalis-tools/wpg-mail-trapping
 * Description:         Prevent sending emails from non-production stages
 * Author:              Pierre Dargham, Matthieu Guerry, Globalis Media Systems
 * Author URI:          https://github.com/wp-globalis-tools/
 *
 * Version:             1.0.0
 * Requires at least:   4.0.0
 * Tested up to:        4.6.0
 */

namespace WPG\MailTrapping;

if (WP_ENV !== 'production' && defined('WPG_MAIL_INTERCEPTION') && false != WPG_MAIL_INTERCEPTION) {
	add_filter('wp_mail', function($args) {
		$recipients = @unserialize(WPG_MAIL_INTERCEPTION);
		if(is_array($recipients)) {
			$args['to'] = $recipients;
		}
		return $args;
	});
}
