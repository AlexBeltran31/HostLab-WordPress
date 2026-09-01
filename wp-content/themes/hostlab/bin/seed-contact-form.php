<?php
/**
 * Seeds the "Evalúa tu propiedad" Contact Form 7 form.
 * Run: npx wp-env run cli wp eval-file wp-content/themes/hostlab/bin/seed-contact-form.php
 */

if ( ! class_exists( 'WPCF7_ContactForm' ) ) {
	WP_CLI::error( 'Contact Form 7 no está activo.' );
}

$existing = WPCF7_ContactForm::find( array( 'posts_per_page' => 1, 's' => 'Evalúa tu propiedad' ) );

if ( ! empty( $existing ) ) {
	WP_CLI::success( 'El formulario ya existe (ID ' . $existing[0]->id() . '). No se crea de nuevo.' );
	return;
}

$form = WPCF7_ContactForm::get_template( array( 'title' => 'Evalúa tu propiedad' ) );
$properties = $form->get_properties();

$properties['form'] = <<<'FORM'
<label>Nombre completo
    [text* your-name] </label>

<label>Correo electrónico
    [email* your-email] </label>

<label>Teléfono (opcional)
    [tel your-phone] </label>

<label>Región
    [select* region id:region "Selecciona tu región" "Arica y Parinacota" "Tarapacá" "Antofagasta" "Atacama" "Coquimbo" "Valparaíso" "Metropolitana de Santiago" "O'Higgins" "Maule" "Ñuble" "Biobío" "La Araucanía" "Los Ríos" "Los Lagos" "Aysén" "Magallanes"] </label>

<label>Comuna
    <select id="comuna-visible"><option>Selecciona primero tu región</option></select>
</label>
[text* comuna id:comuna class:hostlab-hidden-field]

<label>Tipo de propiedad
    [radio tipo-propiedad default:1 "Departamento" "Casa" "Otro"] </label>

<label>¿Ya está publicada en alguna plataforma?
    [radio ya-publicada default:1 "Sí" "No"] </label>

<label>Comentarios adicionales (opcional)
    [textarea comentarios] </label>

[submit "Evaluar mi propiedad"]
FORM;

$properties['mail']['subject']            = 'Nueva evaluación de propiedad de [your-name]';
$properties['mail']['sender']             = '[your-name] <wordpress@hostlab.cl>';
$properties['mail']['recipient']          = get_option( 'admin_email' );
$properties['mail']['additional_headers'] = 'Reply-To: [your-email]';
$properties['mail']['body']               = <<<'BODY'
Nueva solicitud de evaluación de propiedad:

Nombre: [your-name]
Email: [your-email]
Teléfono: [your-phone]
Región: [region]
Comuna: [comuna]
Tipo de propiedad: [tipo-propiedad]
¿Publicada en plataforma?: [ya-publicada]
Comentarios: [comentarios]
BODY;

$form->set_properties( $properties );
$form_id = $form->save();

WP_CLI::success( 'Formulario "Evalúa tu propiedad" creado con ID ' . $form_id );