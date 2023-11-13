<?php

if (count($args) == 0) {
	echo 'Error: Provide migration name.' . PHP_EOL;

	return;
}

$plugin = "skeleton-wp-plugin-migrations";

$file_name = WP_PLUGIN_DIR . "/$plugin/database/" . date('Y_m_d_His_') . $args[0] . '.php';

shell_exec("touch " . $file_name);

$stub = file_get_contents(WP_PLUGIN_DIR . "/$plugin/stub.php");

file_put_contents($file_name, $stub);

echo 'Migration file ' . $file_name . ' has created.' . PHP_EOL;
