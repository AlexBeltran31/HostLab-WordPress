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
