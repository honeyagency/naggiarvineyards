<?php get_header(); ?>
		<?php 
			$pagename = get_query_var('pagename');
		    $post = $wp_query->get_queried_object();
		    $pagename = $post->post_name;
		?>
		<main>
			<?php get_sidebar(); ?>
			<!-- section -->
			<section class="wines wleftsidebar">
			<?php if(has_post_thumbnail()) { the_post_thumbnail('page-header', array('class' => 'flex')); } ?>
			<?php 
				$args = array(
				  'post_type' => 'wines',
					'tax_query' => array(
						array(
							'taxonomy' => 'wine-type',
							'field' => 'slug',
							'terms' => $pagename
						)
					)
				);
				query_posts($args); if ( have_posts() ) : while ( have_posts() ) : the_post();	
				
				//bring in the the wines loop
				include('wines-loop.php');

				endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h2><?php _e( 'Sorry, no wines currently in this category.', 'html5blank' ); ?></h2>

				</article>
				<!-- /article -->

			<?php endif; ?>

			</section>
			<!-- /section -->
		</main>

<?php get_footer(); ?>