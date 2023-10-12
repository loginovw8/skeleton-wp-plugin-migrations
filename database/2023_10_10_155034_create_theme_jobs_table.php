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

		$sql = "CREATE TABLE IF NOT EXISTS theme_jobs (
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			name VARCHAR(255) NOT NULL,
			params TEXT NULL DEFAULT NULL,
			attempts INT DEFAULT 0,
			created_at TIMESTAMP NOT NULL,
			updated_at TIMESTAMP NOT NULL,
			finished_at TIMESTAMP NULL DEFAULT NULL
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

		$sql = "DROP TABLE theme_jobs";

		$wpdb->query($sql);
	}
};
