<?php

function select_dicount_and_code() {

	$discount_type = 'leaving_discount';

	if ( is_user_logged_in() ) {
		$discount_type = 'registered_discount';
	} elseif ( isset( $_COOKIE['woocgp_today_visit'] ) ) {
		$discount_type = 'returning_discount';
	}

	$coupons_opt = get_option( 'woocgp_coupons_opts' );

	$coupon_code = $coupons_opt[$discount_type];

	return array(
		'discount_type' => $discount_type,
		'coupon_code' => $coupon_code
	);
}