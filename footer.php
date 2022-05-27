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
					<div class="col-12 col-6 col-lg-3 footer__nav order-1 order-lg-2 mb-5 mb-lg-0">
						<strong class="footer__list-title">Documents</strong>
						<ul class="list footer__list">
							<li class="list__item"><a href="<?php echo home_url('privacy-policy/')?>" class="list__link">Privacy Policy</a></li>
							<li class="list__item"><a href="<?php echo home_url('terms-and-conditions/')?>" class="list__link">Terms and conditions</a></li>
							<li class="list__item"><a href="https://github.com/ipledger" target="_blank" class="list__link">Github</a></li>
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
	<?php
		if (is_front_page() || is_single()) {
			get_template_part('template/micromodal');
		}
	?>
	</body>
	<!-- Start of LiveChat (www.livechatinc.com) code -->
	<script type="text/javascript">
		window.__lc = window.__lc || {};
		window.__lc.license = 14170584;
		;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)};
		var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){
		i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},
		get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");
		return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){
		var n=t.createElement("script");
		n.async=!0,n.type="text/javascript",
		n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};
		!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
	</script>
	<noscript>
	<a href="https://www.livechatinc.com/chat-with/14170584/" rel="nofollow">Chat with us</a>,
	powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a>
	</noscript>
	<!-- End of LiveChat code -->

	<?php wp_footer();?>

</html>
