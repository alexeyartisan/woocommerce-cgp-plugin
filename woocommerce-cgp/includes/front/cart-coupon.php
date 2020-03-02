<?php

function woocgp_apply_matched_coupons() {
	$discount_options = select_dicount_and_code();

	if ( $discount_options['discount_type'] == 'leaving_discount' ) 
		return;

	$generated_discounts_opt = get_option( 'woocgp_generated_discounts_opts' );
  
    if ( WC()->cart->has_discount( $discount_options['coupon_code'] ) ) 
    	return;

    foreach ( $generated_discounts_opt as $generated_coupon ) {
    	if ( WC()->cart->has_discount( $generated_coupon ) ) {
    		WC()->cart->remove_coupon( $generated_coupon );
    	}		
    }
  
    WC()->cart->add_discount( $discount_options['coupon_code'] );
    wc_print_notices();
}