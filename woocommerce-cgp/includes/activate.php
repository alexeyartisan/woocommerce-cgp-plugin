<?php

function woocgp_activate_plugin() {
	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		wp_die( __( 'You must have a WooCommerce plugin installed!', 'woocommerce-cgp' ) );
	}

	// Храним размеры скидок для каждого типа пользователя
	$discounts_opt = get_option( 'woocgp_discounts_opts' );

	if ( !$discounts_opt ) {
		$discounts_opt = array(
			'registered_discount' => 10,
			'returning_discount' => 5,
			'leaving_discount' => 3
		);

		add_option( 'woocgp_discounts_opts', $discounts_opt );
	}

	// Храним коды купонов для каждого типа скидки
	$coupons_opt = get_option( 'woocgp_coupons_opts' );

	if ( !$coupons_opt ) {
		$coupons_opt = array(
			'registered_discount' => generate_discount_for_percents_and_get_code( $discounts_opt['registered_discount'] ),
			'returning_discount' => generate_discount_for_percents_and_get_code( $discounts_opt['returning_discount'] ),
			'leaving_discount' => generate_discount_for_percents_and_get_code( $discounts_opt['leaving_discount'] )
		);

		add_option( 'woocgp_coupons_opts', $coupons_opt );
	}

	// Храним сгенерированные коды всех купонов
	$generated_discounts_opt = get_option( 'woocgp_generated_discounts_opts' );

	if ( empty( $generated_discounts_opt ) ) {

		$generated_discounts_opt = array();

		foreach( $coupons_opt as $type => $code ) {
			array_push($generated_discounts_opt, $code);
		}

		add_option( 'woocgp_generated_discounts_opts', $generated_discounts_opt );
	}
}