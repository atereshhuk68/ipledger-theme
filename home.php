<?php
/*
Template Name: Main page
Template Post Type: page
*/
?>
<?php get_header();?>
<main class="main">
	<section class="service">
		<div class="container service__container">
			<div class="row">
				<?php
					$posts = get_posts(array(
						"numberposts" => -1,
						"post_type" => "services",
						"order" => "ASC",
						"orderby" => "menu_order"
					));

					foreach ($posts as $post) :
						setup_postdata($post);
					?>
						<div class="col-6 col-sm-4 col-lg-2 mb-4 mb-lg-0">
							<div class="card service__card">
								<div class="card__icon" data-iconpath="<?php bloginfo('template_url')?>/assets/json/<?php echo carbon_get_the_post_meta("services_animated_icon");?>.json"></div>
								<a href="<?php the_permalink();?>" class="card__link"><?php echo carbon_get_the_post_meta("services_short_name")?></a>
							</div>
						</div>
					<?
						endforeach;
						wp_reset_postdata();
					?>
			</div>
		</div>
	</section>
	<section class="about">
		<div class="container about__container">
			<div class="row">
				<div class="col-12 col-lg-6 order-2 order-lg-1">
					<h2 class="section-title about__title">About us</h2>
					<p class="text--default about__text">Every day, business receives new challenges and it needs some top IT solutions that will provide promotion (advertising), protection of intellectual property, and increase in sales. We are modern and we offer comprehensive solutions for businesses and private customers.</p>
				</div>
				<div class="col-12 col-lg-6 order-1 order-lg-2 mb-4 mb-lg-0">
					<img class="about__img" src="<?php bloginfo('template_url')?>/assets/img/about.jpg" alt="IPITLedger About us">
				</div>
			</div>
		</div>
	</section>
	<!-- Advantages -->
	<?php get_template_part('template/focuseon')?>
	<!-- Advantages -->
	<section class="nft">
		<div class="container">
			<div class="row">
				<div class="col-12 col-xl-6">
					<div id="ntfslider" class="swiper nft__slider">
						<div class="swiper-wrapper">
							<?php
								$sliders = carbon_get_the_post_meta('nft_slides');

								foreach ($sliders as $slide) : setup_postdata($slide); ?>
									<div class="swiper-slide">
										<?php
											$LQ = wp_get_attachment_image_src($slide, 'thumbnail')[0];
											$HQ = wp_get_attachment_image_src($slide, 'full')[0];
										?>
										<img class="lazy" src="<?php echo $LQ;?>" data-src="<?php echo $HQ;?>" alt="NFT Slide">
									</div>
								<? endforeach; wp_reset_postdata();
							?>
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
				<div class="col-12 col-xl-6">
					<h2 class="section-title nft__title">NFT collection <a href="https://opensea.io/collection/ip-itdoggiesnft" target="_blank" class="link--primary">@ipitdoggies</a></h2>
					<p class="text--default nft__text">We already have something to be proud of, the @ipitdoggies NFT collection released by us and it contains unique smart contracts developed by us. These provide strong copyright protection and allow you to receive royalties from each NFT card sale (non-exclusive license).</p>
					<a href="https://ipdoggie.com/" target="_blank" class="link--primary el-with-icon nft__link">
						Visit website
						<svg class="icon icon-arrow-right">
							<use xlink:href="<?php bloginfo('template_url')?>/assets/img/sprite.svg#icon-arrow-right"></use>
						</svg>
					</a>
				</div>
			</div>
		</div>
	</section>
	<section class="info">
		<div class="container info__container">
			<div class="row">
				<div class="col-12">
					<h2 class="section-title info__title">
						Why are we focusing on digital?
					</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-6">
					<p class="text--default info__text">
						The digital world requires a different mindset. Virtual stores, digital money, crypto platforms, social networks, NFT cards - these are all integral attributes of modernity. We are a team of successful IP lawyers, IT developers, designers, marketers, we will create any project from scratch and provide comprehensive protection for online projects with maximum benefit for you at an affordable cost.
					</p>
				</div>
				<div class="col-12 col-md-6">
					<p class="text--default info__text mt-0 mt-md-4">
						You will receive high-class expertise, high-quality and responsive service. We offer a fixed price, not an estimate, and we strive to never ask you to pay a bill you didn't expect. Welcome to the world of digital technology and IP. Web 3 marketing is already our reality.
					</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Order -->
	<?php get_template_part('template/order')?>
	<!-- Order -->
	<?php get_template_part('template/blog'); ?>
</main>
<?php get_footer();?>
