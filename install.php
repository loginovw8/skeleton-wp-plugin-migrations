<?php

function install()
{
	$migrations = scandir(WP_PLUGIN_DIR . "/skeleton-wp-plugin-migrations/database");

	sort($migrations);

	foreach ($migrations as $migration) {
		if ($migration != "." && $migration != "..") {
			(require WP_PLUGIN_DIR . '/skeleton-wp-plugin-migrations/database/' . $migration)->up();
		}
	}
}

