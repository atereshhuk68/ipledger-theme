<?php
/**
 * The template for displaying archive services pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ipitledger-theme
 */

get_header();
?>

<main id="main" class="main">
	<div class="container">
		<div class="row my-5">
			<?php
				$args = array(
					"numberposts" => -1,
					"post_type" => "services",
					"order" => "ASC",
					"orderby" => "menu_order"
				);

				$posts = get_posts($args);

				if ( $posts ) {
					foreach ( $posts as $post ) :
						setup_postdata( $post );
						get_template_part("template-parts/content", "services");
					endforeach;
				wp_reset_postdata();
			}
			?>
		</div>
	</div>
</main>

<?php get_footer();
