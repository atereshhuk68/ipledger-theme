<?php
// Modal form Get a constultation
?>
<div class="modal consultation micromodal-slide" id="modal-consultation" aria-hidden="true">
	<div class="modal__overlay" tabindex="-1" data-micromodal-close>
		<div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-consultation-title">
			<header class="modal__header">
				<h2 class="modal__title">Get a consultation</h2>
				<button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
			</header>
			<main class="modal__content">
				<?php echo do_shortcode('[contact-form-7 id="101" title="Get a consultation"]')?>
			</main>
		</div>
	</div>
</div>
