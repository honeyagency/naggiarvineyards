<?php get_header(); //Template Name: Wines Page ?>
		<?php 
			$pagename = get_query_var('pagename');
		    $post = $wp_query->get_queried_object();
		    $pagename = $post->post_name;
		?>
		<main>
			<?php get_sidebar(); ?>
			<!-- section -->
			<section class="wines wleftsidebar thirteen columns">
			<?php if(has_post_thumbnail()) { the_post_thumbnail('page-header', array('class' => 'flex')); } ?>
			<?php
				if ($pagename != 'view-all-wines') {
				$args = array(
				  'post_type' => 'wines',
				  'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'wine-type',
							'field' => 'slug',
							'terms' => $pagename
						)
					)
				);
			} else { //Show All Wine Posts
								$args = array(
				  'post_type' => 'wines',
				  'posts_per_page' => -1,
					
				);
			}
				query_posts($args); if ( have_posts() ) : while ( have_posts() ) : the_post();?>
				
 			<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="wine-image six columns">
						<?php if(has_post_thumbnail()) { the_post_thumbnail('wine', array('class' => 'flex')); } else {?><img class="flex" src="<?php bloginfo('template_directory');?>/img/wine-no-image.jpg"><?php } ?>
					</div>
					<div class="wine-desc ten columns"  >
						<h4><?php the_title(); ?></h4><?php if(get_field('our_of_stock') == 'yes') {echo 'out-of-stock';}?>
						<div class="ten columns inner-desc">
						
						<?php the_content(); ?>

						<?php if(get_field('tasting_sheet')) {echo '<a class="tasting-sheet-link" href="' . get_field('tasting_sheet') . '">Download Tasting Sheet ></a>';} ?>
						

						</div>
						<div class="six columns price">
						<?php if(get_field('out_of_stock') === 'no') {?>	
						<?php if(get_field('wine_price') && !get_field('wine_sale_price')) {echo '<b>Price</b><p>$' . get_field('wine_price') . '</p>';} ?>
						<?php if(get_field('wine_price') && get_field('wine_sale_price')) {echo '<b>ON SALE</b><p><span>$' . get_field('wine_price') . '</span> <b>' . get_field('wine_sale_price') . '</b></p>';} ?>
						<?php if(get_field('wine_club_price')) {echo '<b>Root 49 Member Price</b><p>$' . get_field('wine_club_price') . '</p>';} ?>
						<?php if(get_field('wine_case_price')) {echo '<b>Root 49 Member Case Price</b><p>$' . get_field('wine_case_price') . '</p>';} ?>	
						<?php } else { echo "<b>OUT OF STOCK</b>"; }?>
						</div>	

					</div>
					<?php edit_post_link(); ?>

				</article>
				<!-- /article -->

				<?php endwhile; ?>

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