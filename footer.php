<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ipitledger-theme
 */
?>

		</div>
		<footer class="footer _footer">
			<div class="container footer__container">
				<div class="row">
					<div class="col-12 col-sm-6 col-lg-2 footer__copyright order-5 order-sm-2 order-lg-0">
						© 2022 IP Ledger.<br>All rights Reserved
					</div>
					<div class="col-12 col-6 col-lg-2 offset-lg-1 footer__nav order-1 order-lg-1 mb-5 mb-lg-0">
						<strong class="footer__list-title">Navigation</strong>
						<?php
							wp_nav_menu( [
								'theme_location'  => 'mainmenu',
								'container'       => false,
								'menu_class'      => 'list footer__list',
								'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
							] );
						?>
					</div>
					<div class="col-12 col-6 col-lg-2 footer__nav order-1 order-lg-2 mb-5 mb-lg-0">
						<strong class="footer__list-title">Documents</strong>
						<ul class="list footer__list">
							<li class="list__item"><a href="" class="list__link">Privacy Policy</a></li>
							<li class="list__item"><a href="" class="list__link">Cookie Policy</a></li>
						</ul>
					</div>
					<div class="col-12 col-sm-6 col-lg-auto footer__contact d-flex flex-column align-items-start align-items-sm-end mb-5 mb-sm-0 ms-sm-auto order-3 order-lg-3">
						<?php
							$ipledger_phone = carbon_get_theme_option('ipledger_phone');
							$ipledger_email = carbon_get_theme_option('ipledger_email');
						?>
						<span>tel: <a href="tel:<?php echo $ipledger_phone; ?>"><b><?php echo $ipledger_phone; ?></b></a></span>
						<span>e-mail: <a href="mailto:<?php echo $ipledger_email; ?>"><b><?php echo $ipledger_email; ?></b></a></span>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<div id="spoke-root"></div>
	<script>(function(d, s, id) {
	var js, sjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//www.spoke.com/assets/widget.js";
	sjs.parentNode.insertBefore(js, sjs);
	}(document, 'script', 'spoke-widget-js'));</script>
			<div class="spoke-widget" data-host="//www.spoke.com" data-type="company" data-id="6273e72804532cf5de03353f" data-width="404" data-height="230" data-scroll="no" data-frame-border="none"></div>
			<div style="font-size: 9pt;"><a href="http://www.spoke.com/companies/ip-ledger-ltd-6273e72804532cf5de03353f">IP Ledger LTD</a> widget provided by <a href="http://www.spoke.com">Spoke</a></div>
	<?php get_template_part('template/micromodal') ?>
	</body>

	<?php wp_footer();?>

</html>
