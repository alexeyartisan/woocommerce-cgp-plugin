<?php

function woocommerce_cgp_opts_page() {

	$discounts_opt = get_option( 'woocgp_discounts_opts' );

	if ( empty( $discounts_opt ) ) {
		$discounts_opt = array(
			'registered_discount' => '',
			'returning_discount' => '',
			'leaving_discount' => ''
		);
	}
?>
<div class="wrap">
	<h1><?php _e( 'Настройки WooCommerce CGP', 'woocommerce-cgp' ); ?></h1>

	<?php if ( isset( $_GET['status'] ) && $_GET['status'] == '1' ): ?>
		<div class="updated">
    		<p><?php _e( 'Настройки успешно сохранены.', '' ); ?></p>
  		</div>
	<?php endif; ?>

	<form action="admin-post.php" method="post">
		<input type="hidden" name="action" value="woocgp_save_options">
		<?php wp_nonce_field( 'woocgp_options_verify' ); ?>

		<h2 class="title"><?php _e( 'Скидки на товары', 'woocommerce-cgp' ); ?></h2>
		<table class="form-table">
		    <tr>
			    <th scope="row">
			        <label for="woocgp_inputLoggedInDiscount"><?php _e( 'Скидка для зарегистрированного пользователя (в %):', 'woocommerce-cgp' ); ?></label>
			    </th>			 
			    <td>
			        <input type="text" value="<?php echo $discounts_opt['registered_discount']; ?>" id="woocgp_inputLoggedInDiscount" name="woocgp_inputLoggedInDiscount" class="regular-text">
			        <br>
			        <span class="description"><?php _e( 'Скидка для пользователя, котрый уже зарегистрирован на сайте', 'woocommerce-cgp' ); ?></span>
			    </td>
			</tr>
			<tr>
			    <th scope="row">
			        <label for="woocgp_inputReturningDiscount"><?php _e( 'Скидка для вернувшегося пользователя (в %):', 'woocommerce-cgp' ); ?></label>
			    </th>			 
			    <td>
			        <input type="text" value="<?php echo $discounts_opt['returning_discount']; ?>" id="woocgp_inputReturningDiscount" name="woocgp_inputReturningDiscount" class="regular-text">
			        <br>
			        <span class="description"><?php _e( 'Скидка для пользователя, котрый не зарегистрирован на сайте, но уже посещал его сегодня', 'woocommerce-cgp' ); ?></span>
			    </td>
			</tr>
			<tr>
			    <th scope="row">
			        <label for="woocgp_inputLeavingDiscount"><?php _e( 'Скидка при закрытии сайта (в %):', 'woocommerce-cgp' ); ?></label>
			    </th>			 
			    <td>
			        <input type="text" value="<?php echo $discounts_opt['leaving_discount']; ?>" id="woocgp_inputLeavingDiscount" name="woocgp_inputLeavingDiscount" class="regular-text">
			        <br>
			        <span class="description"><?php _e( 'Скидка для пользователя, котрый собирается покинуть сайт', 'woocommerce-cgp' ); ?></span>
			    </td>
			</tr>
		</table>

		<p class="submit">
			<input type="submit" value="Сохранить" class="button-primary" name="Submit">
		</p>
	</form>
</div>
<?php
}