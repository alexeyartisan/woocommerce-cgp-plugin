<?php

function woocgp_admin_menu() {
	add_menu_page(
		'WooCGP Options',
		'WooCGP Options',
		'manage_options',
		'woocommerce_cgp_opts',
		'woocommerce_cgp_opts_page'
	);

	add_menu_page(
		'WooCGP Statistic',
		'WooCGP Statistic',
		'manage_options',
		'woocommerce_cgp_stats',
		'woocommerce_cgp_stats_page'
	);
}