<?php
/**
 * The Telomere Project Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package telomere-project
 */

add_action( 'wp_enqueue_scripts', 'econature_parent_theme_enqueue_styles' );

/**
 * Enqueue scripts and styles.
 */
function econature_parent_theme_enqueue_styles() {
	wp_enqueue_style( 'econature-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'telomere-project-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'econature-style' )
	);

}
