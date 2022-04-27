<?php
/*
Template Name: Contacts
Template Post Type: page
*/
get_header()
?>
<main id="contacts" class="contacts">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<?php get_template_part('template/order')?>
</main>
<?php get_footer();?>
