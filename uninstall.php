<?php

function uninstall()
{
	$migrations = scandir(WP_PLUGIN_DIR . "/skeleton-wp-plugin-migrations/database");

	rsort($migrations);

	foreach ($migrations as $migration) {
		if ($migration != "." && $migration != "..") {
			(require WP_PLUGIN_DIR . '/skeleton-wp-plugin-migrations/database/' . $migration)->down();
		}
	}
}

