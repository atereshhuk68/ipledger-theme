<section class="blog">
	<div class="container blog__container">
		<div class="row justify-content-center">
			<div class="col-auto">
				<?php
					if (is_front_page() || is_singular('services')) {
						$title = 'Latest posts:';
					} else {
						$title = 'Other posts:';
					}
				?>
				<h2 class="section-title blog__title"><?php echo $title;?></h2>
			</div>
		</div>
		<div class="row">
			<?php
				// Виключити поточний пост, якщо це посту у блозі
				$posts = get_posts(array(
					'posts_per_page'   => 3,
					'exclude'					 => !is_singular('services') ? get_the_ID() : null,
					'category_name'    => 'blog',
					'orderby'          => 'date',
					'order'            => 'DESC'
				));

				foreach ( $posts as $post ) :
					setup_postdata( $post );
					get_template_part( "template-parts/content", "blog" );
				endforeach;
				wp_reset_postdata();
			?>
		</div>
	</div>
</section>
