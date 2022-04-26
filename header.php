<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta name="ahrefs-site-verification" content="b86f36ceb43babe84e5d7f2901459abcd13b5a29d8345e70607f55761895f35c">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="_wrapper">
		<div class="_content">
			<?php
				if ( is_front_page() ) {
					$class = 'header--mainpage';
				} else if (is_archive()) {
					$class = 'header--archive';
				} else if ( is_single() ) {
					$class = 'header--single';
				} else if ( is_page() ) {
					$class = 'header--page';
				}
			?>
			<header class="header <?php echo $class?>">
				<div class="header__wave"><img src="<?php bloginfo('template_url')?>/assets/img/wave.png" alt=""></div>
				<div class="container header__container">
					<div class="row justify-content-between align-items-center">
						<div class="col-6 col-sm-3 col-lg-2">
							<?php if(get_custom_logo()) {
								the_custom_logo();
							} else {?>
								<a href="/" class="logo header__logo">
									<img src="<?php bloginfo('template_url')?>/assets/img/logo.svg" alt="IPITLedger company logo" class="logo__picture">
								</a>
							<?php }?>
						</div>
						<div class="col-auto d-flex align-items-center">
							<div class="header__contacts d-none d-sm-flex flex-column align-items-end">
								<?php
									$ipledger_phone = carbon_get_theme_option('ipledger_phone');
									$ipledger_email = carbon_get_theme_option('ipledger_email');
								?>
								<span>tel: <a href="tel:<?php echo $ipledger_phone?>"><b><?php echo $ipledger_phone?></b></a></span>
								<span>e-mail: <a href="mailto:<?php echo $ipledger_email;?>"><b><?php echo $ipledger_email; ?></b></a></span>
							</div>
							<button class="header__button" data-openmobilemenu>
								<svg class="icon icon-burger">
									<use xlink:href="<?php bloginfo('template_url')?>/assets/img/sprite.svg#icon-burger"></use>
								</svg>
								menu
							</button>
							<div class="mobile-menu">
								<div class="mobile-menu__overlay" data-closemobilemenu></div>
								<div class="mobile-menu__wrap">
									<?php
										wp_nav_menu( [
											'theme_location'  => 'mainmenu',
											'container'       => false,
											'menu_class'      => 'list mobile-menu__list',
											'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
										] );
									?>
									<div class="mobile-menu__contacts">
										<?php
											$ipledger_phone = carbon_get_theme_option('ipledger_phone');
											$ipledger_email = carbon_get_theme_option('ipledger_email');
										?>
										<span>tel: <a href="tel:<?php echo $ipledger_phone ?>"><b><?php echo $ipledger_phone ?></b></a></span>
										<span>e-mail: <a href="mailto:<?php echo $ipledger_email?>"><b><?php echo $ipledger_email; ?></b></a></span>
									</div>
									<button class="mobile-menu__close" data-closemobilemenu>
										<svg class="icon icon-close">
											<use xlink:href="<?php bloginfo('template_url')?>/assets/img/sprite.svg#icon-close"></use>
										</svg>
									</button>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="hero header__hero d-flex flex-column">
								<?php if ( is_front_page() ) { ?>
									<h1 class="hero__title is--mainpage">The virtual world is <br> <span>CHANGING OUR LIVES</span></h1>
									<button class="button button--primary hero__button" data-openmodalform="simple">Get a consultation</button>
								<? } else if ( is_archive() ) { ?>
									<h1 class="hero__title"><?php the_archive_title(); ?></h1>
								<? } else if ( is_single() ) { ?>
									<h1 class="hero__title"><?php the_title();?></h1>
									<time class="hero__publish-date"><?php echo get_the_date('m.d.Y'); ?></time>
								<? } else if ( is_page() ) { ?>
									<h1 class="hero__title"><?php the_title();?></h1>
								<? } ?>
							</div>
						</div>
					</div>
					<?php
						if (is_front_page()) {
							?>
								<div class="statistic">
									<div class="statistic-card statistic-tm fade-in-bottom">
										<strong>4981+</strong>
										<span>trademark registered</span>
									</div>
									<div class="statistic-card statistic-bch fade-in-bottom">
										<strong>199+</strong>
										<span>blockchain projects implemented</span>
									</div>
									<div class="statistic-card statistic-nft fade-in-bottom">
										<strong>39 NFT</strong>
										<span>collections released</span>
									</div>
									<div class="statistic-card statistic-dm fade-in-bottom">
										<strong>81</strong>
										<span>domain dispute won</span>
									</div>
									<div class="statistic-card statistic-pat fade-in-bottom"">
										<strong>3792</strong>
										<span>patents obtained</span>
									</div>
								</div>
							<?
						}
					?>
				</div>
			</header>
