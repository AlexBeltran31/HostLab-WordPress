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

	$smooth_scroll_path = get_theme_file_path( '/js/smooth-scroll.js' );
	wp_enqueue_script(
		'hostlab-smooth-scroll',
		get_template_directory_uri() . '/js/smooth-scroll.js',
		array(),
		file_exists( $smooth_scroll_path ) ? filemtime( $smooth_scroll_path ) : '1.0',
		true
	);

	add_action( 'wpcf7_mail_sent', function ( $contact_form ) {
	if ( ! defined( 'HOSTLAB_CALLMEBOT_PHONE' ) || ! defined( 'HOSTLAB_CALLMEBOT_APIKEY' ) ) {
		return;
	}

	$submission = WPCF7_Submission::get_instance();
	if ( ! $submission ) {
		return;
	}

	$data = $submission->get_posted_data();

	$message  = "Nuevo lead en hostlab.cl\n";
	$message .= "Nombre: " . ( $data['your-name'] ?? '-' ) . "\n";
	$message .= "Email: " . ( $data['your-email'] ?? '-' ) . "\n";
	$message .= "Teléfono: " . ( $data['your-phone'] ?? '-' ) . "\n";
	$message .= "Región: " . ( $data['region'] ?? '-' ) . "\n";
	$message .= "Comuna: " . ( $data['comuna'] ?? '-' );

	wp_remote_get( add_query_arg(
		array(
			'source' => 'php',
			'phone'  => HOSTLAB_CALLMEBOT_PHONE,
			'text'   => rawurlencode( $message ),
			'apikey' => HOSTLAB_CALLMEBOT_APIKEY,
		),
		'https://api.callmebot.com/whatsapp.php'
	) );
} );
} );