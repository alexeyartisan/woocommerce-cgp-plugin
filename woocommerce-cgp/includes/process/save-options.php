<?php

function woocgp_save_options() {
	if ( !current_user_can( 'manage_options' ) ) {
		wp_die( __( 'You are not allowed to be on this page!', 'woocommerce-cgp' ) );
	}

	check_admin_referer( 'woocgp_options_verify' );


	// Храним размеры скидок для каждого типа пользователя
	$discounts_opt = get_option( 'woocgp_discounts_opts' );

	$discounts_opt['registered_discount'] = absint( sanitize_text_field( trim( $_POST['woocgp_inputLoggedInDiscount'] ) ) );
	$discounts_opt['returning_discount'] = absint( sanitize_text_field( trim( $_POST['woocgp_inputReturningDiscount'] ) ) );
	$discounts_opt['leaving_discount'] = absint( sanitize_text_field( trim( $_POST['woocgp_inputLeavingDiscount'] ) ) );

	update_option( 'woocgp_discounts_opts', $discounts_opt );


	// Храним коды купонов для каждого типа скидки
	$coupons_opt = get_option( 'woocgp_coupons_opts' );

	$coupons_opt['registered_discount'] = generate_discount_for_percents_and_get_code( $discounts_opt['registered_discount'] );
	$coupons_opt['returning_discount'] = generate_discount_for_percents_and_get_code( $discounts_opt['returning_discount'] );
	$coupons_opt['leaving_discount'] = generate_discount_for_percents_and_get_code( $discounts_opt['leaving_discount'] );

	update_option( 'woocgp_coupons_opts', $coupons_opt );


	// Храним сгенерированные коды всех купонов
	$generated_discounts_opt = get_option( 'woocgp_generated_discounts_opts' );

	foreach( $coupons_opt as $type => $coupon_code ) {
		if ( !in_array( $coupon_code, $generated_discounts_opt ) ) {
			array_push( $generated_discounts_opt, $coupon_code );
		}
	}

	update_option( 'woocgp_generated_discounts_opts', $generated_discounts_opt );


	// Перенаправляем на страницу опций
	wp_redirect( admin_url( 'admin.php?page=woocommerce_cgp_opts&status=1' ) );
}