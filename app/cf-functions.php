<?php

/* Autoriser les fichiers SVG */
function wpc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');

//Get Posts By Meta Field Is Not Available By Default
// This filter would allow queries through meta-fields
// source: https://1fix.io/blog/2015/07/20/query-vars-wp-api/
function my_allow_meta_query( $valid_vars ) {
	$valid_vars = array_merge( $valid_vars, array( 'meta_key', 'meta_value' ) );
	return $valid_vars;
}
add_filter( 'rest_query_vars', 'my_allow_meta_query' );

// https://css-tricks.com/snippets/wordpress/remove-the-28px-push-down-from-the-admin-bar/
add_action('get_header', 'my_filter_head');
function my_filter_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
