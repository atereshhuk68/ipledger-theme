<div class="modal consultation micromodal-slide" id="modal-form" aria-hidden="true">
	<div class="modal__overlay" tabindex="-1" data-micromodal-close>
		<div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-form-title">
			<header class="modal__header">
				<h2 class="modal__title">Get a consultation</h2>
				<button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
			</header>
			<div class="modal__content">
				<form action="#" class="js-form modal-form" id="js-form" enctype="multipart/form-data" method="post" data-publickey="<?php echo carbon_get_theme_option('ipledger_captcha_public_key')?>">
					<input type="hidden" name="page-name">
					<input type="hidden" name="form-name">
					<?php if (is_single("trademark-registration-in-any-country")) : ?>
						<input type="hidden" name="selected-class">
						<input type="hidden" name="selected-countries">
						<div class="modal-form__header" hidden>
							<div class="modal-form__header-wrap">
								<h4>You have chosen such classes:</h4>
								<div id="modal-header-classes"></div>
							</div>
							<div class="modal-form__header-wrap">
								<h4>You have chosen such countries:</h4>
								<div id="modal-header-countries"></div>
							</div>
						</div>
					<?php endif;?>
					<?php if (is_single("patenting-in-any-country")) : ?>
						<input type="hidden" name="selected-countries">
						<input type="hidden" name="selected-patents-numbers">
						<div class="modal-form__header" hidden>
							<div class="modal-form__header-wrap">
								<h4>You have chosen such countries:</h4>
								<div id="modal-header-countries"></div>
							</div>
						</div>
					<?php endif;?>
					<div class="modal-form__wrap">
						<label for="user_name" class="modal-form__label">Name</label>
						<input type="text" id="user_name" class="modal-form__field" name="user_name" data-validate-field="name" placeholder="Enter your name">
					</div>
					<div class="modal-form__wrap">
						<label for="user_email" class="modal-form__label">Email</label>
						<input type="email" id="user_email" class="modal-form__field" name="user_email" data-validate-field="email" placeholder="Enter your email">
					</div>
					<input type="hidden" id="token" name="token">
					<div class="modal-form__wrap">
						<button type="submit" class="button button--primary modal-form__submit">Submit</button>
					</div>
					<p class="modal-form__error"></p>
				</form>
			</div>
		</div>
	</div>
</div>
