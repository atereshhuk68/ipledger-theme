<?php get_header(); ?>
<main id="single-page" class="single-page">
	<div class="container">
		<?php the_content(); ?>
	</div>
	<?php get_template_part('template/blog'); ?>
	<?php get_template_part('template/order')?>
</main>
<?php get_footer(); ?>
