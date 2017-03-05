<?php
/*
Plugin Name: Cartonbox shortcode
Plugin URI:  https://github.com/constlab/wp-cartonbox-shortcode
Description: WordPress shortcode for Cartonbox http://cartonbox.constlab.ru/
Version:     1.0.0
Author:      Const Lab
Author URI:  https://constlab.ru/
License:     MIT
License URI: https://github.com/constlab/wp-cartonbox-shortcode/blob/master/LICENSE
Text Domain: cartonbox_shortcode
Domain Path: /languages
*/

add_shortcode( 'cartonbox', 'cartonbox_shortcode' );

/**
 * @param array $atts
 * @param string $content
 *
 * @return string
 */
function cartonbox_shortcode( $atts, $content = '' ) {
	if ( empty( $content ) ) {
		return '';
	}
	$atts = shortcode_atts( [
		'text'  => '',
		'class' => ''
	], $atts );

	$img          = esc_url( $content );
	$link_content = empty( $atts['text'] ) ? "<img src='{$img}' />" : $atts['text'];
	$classes      = trim( 'cartonbox ' . trim( $atts['class'] ) );

	return "<a href='{$img}' class='{$classes}' data-cb-type='img'>{$link_content}</a>";
}