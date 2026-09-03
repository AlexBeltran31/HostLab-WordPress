<?php
/**
 * Title: Contacto
 * Slug: hostlab/contacto
 * Categories: hostlab
 */
?>
<!-- wp:cover {"url":"/wp-content/themes/hostlab/assets/images/interior-2.webp","dimRatio":50,"overlayColor":"purple-dark","minHeight":100,"minHeightUnit":"vh","align":"full","anchor":"contacto","style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"20px","right":"20px"}}}} -->
<div class="wp-block-cover alignfull" id="contacto" style="padding-top:80px;padding-right:20px;padding-bottom:80px;padding-left:20px;min-height:100vh">
	<span aria-hidden="true" class="wp-block-cover__background has-purple-dark-background-color has-background-dim-50 has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="" src="/wp-content/themes/hostlab/assets/images/interior-2.webp" data-object-fit="cover"/>
	<div class="wp-block-cover__inner-container">

		<!-- wp:group {"backgroundColor":"white","style":{"spacing":{"padding":{"top":"48px","bottom":"48px","left":"48px","right":"48px"}},"border":{"radius":"28px"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-white-background-color has-background" style="border-radius:28px;padding-top:48px;padding-right:48px;padding-bottom:48px;padding-left:48px;max-width:460px;margin-left:auto;margin-right:auto">

			<!-- wp:heading {"textAlign":"center","level":2,"textColor":"ink","fontSize":"large"} -->
            <h2 class="wp-block-heading has-text-align-center has-ink-color has-text-color has-large-font-size">Evalúa tu propiedad</h2>
            <!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"gray"} -->
			<p class="has-text-align-center has-gray-color has-text-color">Completa el formulario y te contactamos en breve.</p>
			<!-- /wp:paragraph -->

			<?php echo do_shortcode( '[contact-form-7 id="d3be08c" title="Evalúa tu propiedad"]' ); ?>

		</div>
		<!-- /wp:group -->

	</div>
</div>
<!-- /wp:cover -->