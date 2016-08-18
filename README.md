# Prevent sending emails from non-production stages

## Installation

You can install this plugin via the command-line or the WordPress admin panel.

### via Command-line

1. Download the [latest zip](https://github.com/wp-globalis-tools/wpg-mail-trapping/archive/master.zip) of this repo.
2. Add the folder in your plugins directory (wp-content/plugins)
3. Activate the plugin via [wp-cli](http://wp-cli.org/commands/plugin/activate/).

```sh
wp plugin activate wpg-mail-trapping
```

### via WordPress Admin Panel

1. Download the [latest zip](https://github.com/wp-globalis-tools/wpg-mail-trapping/archive/master.zip) of this repo.
2. In your WordPress admin panel, navigate to Plugins->Add New
3. Click Upload Plugin
4. Upload the zip file that you downloaded.

## Configuration

Define WP_ENV in your config file :

```php
// Add Environment
define('WP_ENV', 'your-environment');
```

Define WPG_MAIL_INTERCEPTION in your config file, with the interception mail recipient

 ```php
// Add mail recipient
define('WPG_MAIL_INTERCEPTION', serialize(['admin@example.com','admin2@example.com']));
```
