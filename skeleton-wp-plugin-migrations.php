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

require_once('install.php');
require_once('uninstall.php');

register_activation_hook(__FILE__, 'install');
register_deactivation_hook(__FILE__, 'uninstall');
