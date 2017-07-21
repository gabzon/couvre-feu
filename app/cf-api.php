<?php
function slug_register_fields() {
	register_rest_field( 'post', 'article_year', [ 'get_callback' => 'slug_get_cf_article_year' ] );

	// Size
	register_rest_field( 'post', 'width', [ 'get_callback' => 'slug_get_cf_width' ] );
	register_rest_field( 'post', 'height', [ 'get_callback' => 'slug_get_cf_height' ] );
	register_rest_field( 'post', 'fullwidth', [ 'get_callback' => 'slug_get_cf_fullwidth' ] );

	// Styles
	register_rest_field( 'post', 'font_family', [ 'get_callback' => 'slug_get_cf_font_family' ] );

	// Margins
	register_rest_field( 'post', 'margin_top', [ 'get_callback' => 'slug_get_cf_margin_top' ] );
	register_rest_field( 'post', 'margin_right', [ 'get_callback' => 'slug_get_cf_margin_right' ] );
	register_rest_field( 'post', 'margin_bottom', [ 'get_callback' => 'slug_get_cf_margin_bottom' ] );
	register_rest_field( 'post', 'margin_left', [ 'get_callback' => 'slug_get_cf_margin_left' ] );

	// Paddings
	register_rest_field( 'post', 'padding_top', [ 'get_callback' => 'slug_get_cf_padding_top' ] );
	register_rest_field( 'post', 'padding_right', [ 'get_callback' => 'slug_get_cf_padding_right' ] );
	register_rest_field( 'post', 'padding_bottom', [ 'get_callback' => 'slug_get_cf_padding_bottom' ] );
	register_rest_field( 'post', 'padding_bottom', [ 'get_callback' => 'slug_get_cf_padding_left' ] );
}


function slug_get_cf_article_year($post, $field_name, $request) { return get_post_meta($post['id'], 'article_year', true); }
function slug_get_cf_width($post, $field_name, $request) { return get_post_meta($post['id'], 'width', true);}
function slug_get_cf_height($post, $field_name, $request) {return get_post_meta($post['id'], 'height', true);}
function slug_get_cf_fullwidth($post, $field_name, $request) {return get_post_meta($post['id'], 'cf_fullwidth', true);}
function slug_get_cf_font_family($post, $field_name, $request) {return get_post_meta($post['id'], 'cf_font_family', true);}

// Margins
function slug_get_cf_margin_top($post, $field_name, $request) { 	return get_post_meta($post['id'], 'margin_top', true); }
function slug_get_cf_margin_right($post, $field_name, $request) { 	return get_post_meta($post['id'], 'margin_right', true); }
function slug_get_cf_margin_bottom($post, $field_name, $request) { 	return get_post_meta($post['id'], 'margin_bottom', true); }
function slug_get_cf_margin_left($post, $field_name, $request) { 	return get_post_meta($post['id'], 'margin_left', true); }

// Paddings
function slug_get_cf_padding_top($post, $field_name, $request) { return get_post_meta($post['id'], 'cf_padding_top', true); }
function slug_get_cf_padding_right($post, $field_name, $request) { return get_post_meta($post['id'], 'cf_padding_right', true); }
function slug_get_cf_padding_bottom($post, $field_name, $request) { return get_post_meta($post['id'], 'cf_padding_bottom', true); }
function slug_get_cf_padding_left($post, $field_name, $request) { return get_post_meta($post['id'], 'cf_padding_left', true); }

add_action( 'rest_api_init', 'slug_register_fields' );


	//
	//
    // if (get_post_meta($id,'cf_border', true)) {
    //     $border = 'border: ' . get_post_meta($id,'cf_border', true) . 'px solid; ';
    // }
	// 	if (get_post_meta($id,'cf_border_color', true)) {
	// 			$bcolor = 'border-color: ' . get_post_meta($id,'cf_border_color', true) . '; ';
	// 	}
	//
    // if (get_post_meta($id,'cf_colorpicker', true)) {
    //     $bg_color = 'background-color: ' . get_post_meta($id,'cf_colorpicker', true) . ';';
    // }
    // if (get_post_meta($id,'cf_upload_media', true)) {
    //     $bg_img = 'background-image: url("' . wp_get_attachment_url( get_post_meta($id,'cf_upload_media', true) ) . '");';
