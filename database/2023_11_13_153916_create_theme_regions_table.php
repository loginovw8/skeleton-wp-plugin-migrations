<?php

return new class
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE IF NOT EXISTS theme_regions (
			id VARCHAR(255) NOT NULL PRIMARY KEY,
			name TEXT NOT NULL,
			created_at TIMESTAMP NOT NULL
		) $charset_collate;";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		dbDelta($sql);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		global $wpdb;

		$sql = "DROP TABLE theme_regions";

		$wpdb->query($sql);
	}
};
