<div class="col-12 col-lg-4 mb-5 mb-lg-0">
	<article id="post-<?php the_ID(); ?>" class="article news__article">
		<div class="article__cover">
			<?php the_post_thumbnail('thumbnail', array(
				"class" => "lazy",
				"data-src" => get_the_post_thumbnail_url(get_the_ID(), 'full'),
				"alt" => get_the_title()
			)); ?>
		</div>
		<div class="article__inner">
			<div class="article__date">
				<time datetime="<?php echo get_the_date('d.m.Y'); ?>">
					<?php echo get_the_date('d.m.Y'); ?>
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
