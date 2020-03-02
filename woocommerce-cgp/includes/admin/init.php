<?php

function woocgp_admin_init() {
	add_action( 'admin_post_woocgp_save_options', 'woocgp_save_options' );
}