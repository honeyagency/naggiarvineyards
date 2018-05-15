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
					<?php the_content(); ?>
					<a href="mailto:info@naggiarvineyards.com" class="join"><span>Join Our Wine Club</span></a>
					<br class="clear">

					<?php edit_post_link(); ?>

				</article>
				<article class="linebreak">
					<h1>Benefits</h1>
					<div class="benefits">
						<div class="row">
							<div class="one-third column">
								<h4><a href="#3bottle">3 Bottles</a></h4>
								<a class="bottleshot" href="#3bottle"><img src="<?php bloginfo('template_directory');?>/img/wine-club-3-bottle.png"></a>
								<div class="details">
									<div class="price"><span>PRICE</span> - <?php echo get_field('club_price_one'); ?></div>
									<p><?php echo get_field('club_desc_one'); ?></p>
								</div>	
							</div>
							<div class="one-third column">
								<h4><a href="#4bottle">4 Bottles</a></h4>
								<a class="bottleshot" href="#4bottle"><img src="<?php bloginfo('template_directory');?>/img/wine-club-4-bottle.png"></a>
								<div class="details">
									<div class="price"><span>PRICE</span> - <?php echo get_field('club_price_two'); ?></div>
									<p><?php echo get_field('club_desc_two'); ?></p>
								</div>	
							</div>	
							<div class="one-third column">
								<h4><a href="#6bottle">6 Bottles</a></h4>
								<a class="bottleshot" href="#6bottle"><img src="<?php bloginfo('template_directory');?>/img/wine-club-6-bottle.png"></a>
								<div class="details">
									<div class="price"><span>PRICE</span> - <?php echo get_field('club_price_three'); ?></div>
									<p><?php echo get_field('club_desc_three'); ?></p>
								</div>	
							</div>
						</div><?php //row ?>							
					</div>
					<span class="asterisk">* Prices per release and are subject to tax</span>	
				</article>
				<?php //Lower Content Area ?>
				<article class="lower-content">
					<?php echo get_field('lower_wine_club_content'); ?>
					<?php if(get_field('brochure_link')){?><a href="<?php echo get_field('brochure_link'); ?>" class="join" target="_blank"><span>Download Our Brochure</span></a><?php } ?>
					<br class="clear">

					<?php edit_post_link(); ?>

				</article>
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