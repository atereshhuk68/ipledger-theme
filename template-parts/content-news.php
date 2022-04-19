<div class="col-12 col-lg-4 mb-5 mb-lg-0">
	<article id="post-<?php the_ID(); ?>" class="article news__article">
		<div class="article__cover">
			<img src="<?php bloginfo('template_url')?>/assets/img/blog_cover2.jpg" alt="Article cover">
		</div>
		<div class="article__inner">
			<div class="article__date">
				<time datetime="<?php echo get_the_date('m-d-Y'); ?>">
					<?php echo get_the_date('m.d.Y'); ?>
				</time>
			</div>
			<h3 class="article__title">
				<a href="<?php the_permalink();?>">
					<?php the_title();?>
				</a>
			</h3>
		</div>
	</article>
</div>
