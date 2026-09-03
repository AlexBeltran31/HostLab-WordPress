<?php
/**
 * HostLab theme functions.
 */

add_action( 'init', function () {
	register_block_pattern_category(
		'hostlab',
		array( 'label' => __( 'HostLab', 'hostlab' ) )
	);
} );

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'hostlab-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);

	$script_path = get_theme_file_path( '/js/regiones-comunas.js' );
	wp_enqueue_script(
		'hostlab-regiones-comunas',
		get_template_directory_uri() . '/js/regiones-comunas.js',
		array(),
		file_exists( $script_path ) ? filemtime( $script_path ) : '1.0',
		true
	);
} );