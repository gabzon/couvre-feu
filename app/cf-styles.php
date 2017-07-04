<?php

function display_styles($id){
    $width  = '';
    $height = '';
    $mr     = ''; $ml     = ''; $mt     = ''; $mb     = '';
    $pt     = ''; $pr     = ''; $pb     = ''; $pl     = '';
    $bg_color = '';
    $bg_img = '';
    $ff     = '';
		$block	= 'display: inline-block;';
		$border = '';
		$bcolor = '';

    /* *************************************************************************
    ** Width & Heigh Section
    ************************************************************************* */
    if (get_post_meta($id,'width', true)) {
        $width = 'width: ' . get_post_meta($id,'width', true)  . '; ';
    }
    if (get_post_meta($id,'height', true)) {
        $height = 'height: ' . get_post_meta($id,'height', true)  . '; ';
    }
		if (get_post_meta($id,'cf_fullwidth', true) === 'true') {
				$block = 'display: block;';
		}

    /* *************************************************************************
    ** Font Section
    ************************************************************************* */
    if (get_post_meta($id,'cf_font_family', true)) {
        $ff = 'font-family: ' . get_post_meta($id,'cf_font_family', true)  . '; ';
    }

    /* *************************************************************************
    ** Margin Section
    ************************************************************************* */

    if (get_post_meta($id,'margin_top', true)) {
        $mt = 'margin-top: ' . get_post_meta($id,'margin_top', true) . 'px; ';
    }
    if (get_post_meta($id,'margin_right', true)) {
        $mr = 'margin-right: ' . get_post_meta($id,'margin_right', true) . 'px; ';
    }
    if (get_post_meta($id,'margin_bottom', true)) {
        $mb = 'margin-bottom: ' . get_post_meta($id,'margin_bottom', true) . 'px; ';
    }
    if (get_post_meta($id,'margin_left', true)) {
        $ml = 'margin-left: ' . get_post_meta($id,'margin_left', true) . 'px; ';
    }

    /* *************************************************************************
    ** Padding Section
    ************************************************************************* */

    if (get_post_meta($id,'cf_padding_top', true)) {
        $pt = 'padding-top: ' . get_post_meta($id,'cf_padding_top', true) . 'px !important; ';
    }
    if (get_post_meta($id,'cf_padding_right', true)) {
        $pr = 'padding-right: ' . get_post_meta($id,'cf_padding_right', true) . 'px !important; ';
    }
    if (get_post_meta($id,'cf_padding_bottom', true)) {
        $pb = 'padding-bottom: ' . get_post_meta($id,'cf_padding_bottom', true) . 'px !important; ';
    }
    if (get_post_meta($id,'cf_padding_left', true)) {
        $pl = 'padding-left: ' . get_post_meta($id,'cf_padding_left', true) . 'px !important; ';
    }

		/* *************************************************************************
		** Border Section
		************************************************************************* */

    if (get_post_meta($id,'cf_border', true)) {
        $border = 'border: ' . get_post_meta($id,'cf_border', true) . 'px solid; ';
    }
		if (get_post_meta($id,'cf_border_color', true)) {
				$bcolor = 'border-color: ' . get_post_meta($id,'cf_border_color', true) . '; ';
		}

    /* *************************************************************************
    ** Media File Section
    ** This section is for the background image
    ************************************************************************* */
    if (get_post_meta($id,'cf_colorpicker', true)) {
        $bg_color = 'background-color: ' . get_post_meta($id,'cf_colorpicker', true) . ';';
    }
    if (get_post_meta($id,'cf_upload_media', true)) {
        $bg_img = 'background-image: url("' . wp_get_attachment_url( get_post_meta($id,'cf_upload_media', true) ) . '");';
    }



    $style = $ff. $width . $height . $mt . $mr . $mb . $ml . $pt . $pr . $pb . $pl . $bg_color . $bg_img . $border . $bcolor . $block;
    return $style;
}
