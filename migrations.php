<?php

/**
 * Plugin Name:     Database Migrations Plugin
 * Plugin URI:      https://stonefam.me
 * Description:     This is a database migrations plugin.
 * Author:          stonefam
 * Author URI:      https://stonefam.me
 * Text Domain:     migrations
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Migrations
 */

// Your code starts here.

function install()
{
	$migrations = scandir(WP_PLUGIN_DIR . "/migrations/database");

	sort($migrations);

	foreach ($migrations as $migration) {
		if ($migration != "." && $migration != "..") {
			(require WP_PLUGIN_DIR . '/migrations/database/' . $migration)->up();
		}
	}
}

function uninstall()
{
	$migrations = scandir(WP_PLUGIN_DIR . "/migrations/database");

	rsort($migrations);

	foreach ($migrations as $migration) {
		if ($migration != "." && $migration != "..") {
			(require WP_PLUGIN_DIR . '/migrations/database/' . $migration)->down();
		}
	}
}

register_activation_hook(__FILE__, 'install');
register_deactivation_hook(__FILE__, 'uninstall');
