<?php

function woocgp_footer_init() {
	global $woocommerce;

	$discount_options = select_dicount_and_code();

	$coupon = new WC_Coupon( $discount_options['coupon_code'] );

	$message = '';

	switch(  $discount_options['discount_type'] ) {
		case 'returning_discount':
			$message = "Спасибо, что снова заглянули к нам! Вам предоставлена скидка <b>" . 
			$coupon->get_amount() . 
			"%</b>. Код купона: <b>" .
			$discount_options['coupon_code'] . 
			"</b>";
			break;
		case 'leaving_discount':
			$message = "Подождите, не уходите! Вам предоставлена скидка <b>" . 
			$coupon->get_amount() . 
			"%</b>. Код купона: <b>" .
			$discount_options['coupon_code'] . 
			"</b>";
			break;
		default:
			$message = '';
	}

?>
<input type="hidden" id="discount_type" value="<?php echo $discount_options['discount_type']; ?>">
<input type="hidden" id="coupon_code" value="<?php echo $discount_options['coupon_code']; ?>">

<div id="woocgp-alert" class="woocgp-alert">
	<span><?php echo $message; ?></span>
	<img id="woocgp-alert-close" src="<?php echo plugins_url( 'assets/close.png', WOOCGP_PLUGIN_URL ); ?>">
<div>
<?php
}