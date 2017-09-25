# wpg-mail-trapping

Prevent sending emails from non-production environments

## Installation :

- Run `composer require globalis/wpg-mail-trapping` or add `wpg-mail-trapping.php` to your `mu-plugins` directory

## Configuration

- Add `define('WPG_MAIL_TRAPPING', serialize(['you@example.com']));` in your wp-config.php file.

- If you want to disable the mail trapping, set the constant to false: `define('WPG_MAIL_TRAPPING', false);`
