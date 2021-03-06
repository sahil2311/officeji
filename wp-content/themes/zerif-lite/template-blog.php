<?php
/**
 * Template Name: Blog
 */
get_header(); ?>
<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->
<?php zerif_after_header_trigger(); ?>
<div id="content" class="site-content">

	<div class="container">

		<div class="content-left-wrap col-md-9">

			<div id="primary" class="content-area">

				<main id="main" class="site-main" itemscope itemtype="http://schema.org/Blog">
					<?php
					$wp_query = new WP_Query( apply_filters( 'zerif_template_blog_parameters', array('post_type' => 'post', 'posts_per_page' => '8', 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ) ) ) );

					if( $wp_query->have_posts() ):
					 
						while ($wp_query->have_posts()) : 
						
							$wp_query->the_post();
							get_template_part( 'content', get_post_format() );

						endwhile;

					endif;

					zerif_paging_nav();

					wp_reset_postdata();
					?>
				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .content-left-wrap -->

		<?php zerif_sidebar_trigger(); ?>

	</div><!-- .container -->
<?php get_footer(); ?>