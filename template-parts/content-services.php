<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
	<article class="card services-card">
		<div class="card__icon" data-iconpath="<?php bloginfo('template_url')?>/assets/json/<?php echo carbon_get_the_post_meta("services_animated_icon");?>.json"></div>
		<a href="<?php the_permalink();?>" class="card__link"><?php echo carbon_get_the_post_meta("services_short_name")?></a>
	</article>
</div>
