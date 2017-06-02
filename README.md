# Prevent sending emails from non-production environments

## Example :

- Add `define('WPG_MAIL_TRAPPING', serialize(['you@example.com']));` in your wp-config.php file.

- Add `wpg-mail-trapping.php` to your `mu-plugins` directory
