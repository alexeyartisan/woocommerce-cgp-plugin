<?php

function get_coupon_code( $percents ) {
	return "woocgp{$percents}";
}

function coupon_exists( $coupon_code ) {
	global $wpdb;

    $sql = $wpdb->prepare( 
    	"SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type = 'shop_coupon' LIMIT 1;", 
    	$coupon_code
    );

    $coupon_id = $wpdb->get_var( $sql );

    if ( empty( $coupon_id ) ) {
    	return false;
    }

    return true;
}

function generate_discount_for_percents_and_get_code( $percents ) {
	$coupon_code = get_coupon_code( $percents );

	if ( !coupon_exists( $coupon_code ) ) {
		$coupon = array(
			'post_title' => $coupon_code,
			'post_content' => '',
			'post_status' => 'publish',
			'post_author' => 1,
			'post_type'		=> 'shop_coupon'
		);
							
		$new_coupon_id = wp_insert_post( $coupon );
							
		// Add meta
		update_post_meta( $new_coupon_id, 'discount_type', 'percent' );
		update_post_meta( $new_coupon_id, 'coupon_amount', $percents );
		update_post_meta( $new_coupon_id, 'individual_use', 'no' );
		update_post_meta( $new_coupon_id, 'product_ids', '' );
		update_post_meta( $new_coupon_id, 'exclude_product_ids', '' );
		update_post_meta( $new_coupon_id, 'usage_limit', '' );
		update_post_meta( $new_coupon_id, 'expiry_date', '' );
		update_post_meta( $new_coupon_id, 'apply_before_tax', 'yes' );
		update_post_meta( $new_coupon_id, 'free_shipping', 'no' );
	}

	return $coupon_code;
}