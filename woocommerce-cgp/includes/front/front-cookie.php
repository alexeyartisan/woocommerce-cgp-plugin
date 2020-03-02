<?php

function woocgp_set_visit_cookie() {
	if( !is_user_logged_in() ) {
		if ( !isset( $_COOKIE['woocgp_today_visit'] ) ) {
			setcookie( 'woocgp_today_visit',  1, mktime(24, 0, 0) );
		}
	}
}