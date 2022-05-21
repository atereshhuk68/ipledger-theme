<section class="order">
	<div class="order__wave">
		<?php
				$video_webm = wp_get_attachment_url(carbon_get_theme_option('ipledger_video_webm'));
				$video_poster = wp_get_attachment_url(carbon_get_theme_option('ipledger_video_poster'));
			?>
		<video loading="lazy" class="lazy" loop autoplay muted playsinline style="width:100%; height: 100%; object-fit: cover;" src="<?php echo $video_webm; ?>" poster="<?php echo $video_poster; ?>" type="video/webm"></video>
	</div>
	<div class="container order__container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-6">
				<h2 class="section-title order__title">To order a service</h2>
				<p class="text--default order__text">You will be in safe hands and will be able to count on quality advice. Don't take our word for it? We have many satisfied customers who have left positive reviews on Google.</p>
				<?php echo do_shortcode('[trustindex no-registration=google]')?>
				<button class="button button--primary order__button" data-openmodalform="simple" data-formtitle="Get a consultation">Get a consultation</button>
			</div>
		</div>
	</div>
</section>
