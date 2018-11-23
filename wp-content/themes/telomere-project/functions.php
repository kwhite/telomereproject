<?php
/**
 * The Telomere Project Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package telomere-project
 */

add_action( 'wp_enqueue_scripts', 'econature_parent_theme_enqueue_styles');

/**
 * Enqueue scripts and styles.
 */
function econature_parent_theme_enqueue_styles() {
	wp_enqueue_style(
			'theme-overrides',
			get_stylesheet_directory_uri() . '/overrides.css',
			array( 'theme-fonts-schemes' )
		);
}
