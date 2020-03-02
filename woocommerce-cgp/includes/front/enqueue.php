<?php

function woocgp_enqueue_scripts() {
	wp_register_style( 'woocgp_styles', plugins_url( 'assets/woocgp-styles.css', WOOCGP_PLUGIN_URL ), array(), '1.0', false );
	wp_enqueue_style( 'woocgp_styles' );

	wp_register_script( 'woocgp_scripts', plugins_url( 'assets/woocgp-scripts.js', WOOCGP_PLUGIN_URL ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'woocgp_scripts' );
}