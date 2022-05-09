<?php get_header(); ?>
<main id="single-page" class="single-page">
	<div class="container">
		<?php the_content(); ?>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="section-title news__title">Latest news:</h2>
			</div>
		</div>
		<div class="row mb-5">
			<?php
				$posts = get_posts([
					'posts_per_page'   => 3,
					'category_name'    => 'news',
					'orderby'          => 'date',
					'order'            => 'DESC'
				]);

				foreach ( $posts as $post ) :
					setup_postdata( $post );
					get_template_part( "template-parts/content", "news" );
				endforeach;
				wp_reset_postdata();
			?>
		</div>
	</div>
	<?php get_template_part('template/order')?>
</main>
<?php get_footer(); ?>
