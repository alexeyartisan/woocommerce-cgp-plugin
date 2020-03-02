<?php

function woocommerce_cgp_stats_page() {
	global $woocommerce;

	$generated_discounts_opt = get_option( 'woocgp_generated_discounts_opts' );

	if ( empty( $generated_discounts_opt ) ) {
		$generated_discounts_opt = array();
	}

	$coupons_statistics = array();

	foreach( $generated_discounts_opt as $coupon_code ) {
		$coupon = new WC_Coupon( $coupon_code );
		array_push( $coupons_statistics, $coupon );
	}
?>
<div class="wrap">
	<h1><?php _e( 'Статистика использования скидочных купонов WooCommerce CGP', 'woocommerce-cgp' ); ?></h1>

	<table class="form-table">
		<?php foreach( $coupons_statistics as $coupon ): ?>
	    <tr>
		    <th scope="row">
		        <?php  echo __( 'Купон', 'woocommerce-cgp' ) . ' &laquo;<i>' . $coupon->get_code() . '</i>&raquo;:'; ?>
		    </th>			 
		    <td>
		        <span class="description"><?php echo __( 'использован', 'woocommerce-cgp' ) . ' <b>' . $coupon->get_usage_count() . '</b> ' . __( 'раз', 'woocommerce-cgp' ); ?></span>
		    </td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php
}