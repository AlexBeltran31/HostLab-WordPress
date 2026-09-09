<?php
/**
 * Prueba manual del aviso de WhatsApp vía CallMeBot.
 * Ejecutar con:
 * npx wp-env run cli wp eval-file wp-content/themes/hostlab/bin/test-whatsapp-notification.php
 */

$response = hostlab_notify_whatsapp_lead( array(
	'your-name'  => 'Prueba Alex',
	'your-email' => 'prueba@example.com',
	'your-phone' => '+56911111111',
	'region'     => 'Región Metropolitana',
	'comuna'     => 'Providencia',
) );

if ( is_null( $response ) ) {
	echo "No se envió: faltan las constantes HOSTLAB_CALLMEBOT_PHONE / HOSTLAB_CALLMEBOT_APIKEY.\n";
} elseif ( is_wp_error( $response ) ) {
	echo "ERROR: " . $response->get_error_message() . "\n";
} else {
	echo "Código de respuesta: " . wp_remote_retrieve_response_code( $response ) . "\n";
	echo "Cuerpo de la respuesta: " . wp_remote_retrieve_body( $response ) . "\n";
}