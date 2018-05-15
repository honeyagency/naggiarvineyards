<?php get_header(); ?>
		
		<main>
			<?php get_sidebar(); ?>
			<!-- section -->
			<section class="wleftsidebar">

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				
				
				<?php if(has_post_thumbnail()) { the_post_thumbnail('page-header', array('class' => 'flex')); } ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1><?php the_title(); ?></h1>
					<h4>Featured Press</h4>
						<div class="press-links row">
						<?php if( have_rows('press_links') ) :
							$i = 0;
							while ( have_rows('press_links') ) : the_row(); 
							$image = wp_get_attachment_image_src(get_sub_field('field_5317a1501a139'), 'press');	
							
							$i++;
							?>
							<?php if ($i % 4 == 0) {?><div class="press-links row"><?php } ?>
						<div class="cell">
							<h5><?php the_sub_field('press_title'); ?></h5>
							<img src="<?php echo $image[0]; ?>" class="flex">
							<p><?php the_sub_field('press_text'); ?></p>
							<a class="more-link" href="<?php the_sub_field('press_link'); ?>">Read More ></a>
						</div>
			
						<?php if ($i % 3 == 0) { $i = 0; ?></div><div class="press-links row"><?php } ?>
						<?php endwhile; endif; ?>
						<?php if ($i == 1) {?>
						<div class="cell">
						</div>
						<div class="cell">
						</div>
						<?php } elseif ($i == 2) ?>
							<div class="cell">
							</div>
						</div>
					<?php //AWARDS ?>	
					<h4>Awards</h4>
					<?php if( get_field('awards') ): 
						while( has_sub_field('awards') ):?>
					<div class="awards row">
					<h5><?php the_sub_field('award_category_name'); ?></h5>
						<?php if( get_sub_field('award_category') ):
							while( has_sub_field('award_category') ):?>
							<div class="the-venue">
							<div class="one-third outer column">
								<?php the_sub_field('venue_name'); ?>
							</div>
							<div class="two-thirds outer column">
								<?php if(get_sub_field('awards_won')):
									while(has_sub_field('awards_won')): ?>
									<div class="one-half column">
										<?php the_sub_field('item'); ?>
									</div>	
									<div class="one-half column">
										<?php the_sub_field('award_value'); ?>
									</div>
								<!--inner row-->
								<?php endwhile; endif; //end awards won ?>		
							</div>	
						</div>
						<?php endwhile; endif; ?>
					</div><?php //end awards row ?>
					<?php endwhile; endif; //end awards ?>

					<?php edit_post_link(); ?>

				</article>
				<!-- /article -->

			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

				</article>
				<!-- /article -->

			<?php endif; ?>

			</section>
			<!-- /section -->
		</main>

<?php get_footer(); ?>
