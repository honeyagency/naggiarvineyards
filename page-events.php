<?php get_header(); ?>
		
		<main>
			<?php get_sidebar(); ?>
			<!-- section -->
			<section class="wleftsidebar">

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				
				<?php if(has_post_thumbnail()) { the_post_thumbnail('page-header', array('class' => 'flex')); } ?>


				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1><span>coming events at</span>Naggiar vineyards</h1>
					<?php the_content(); ?>
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
			<section class="bottom-full">
				<h2>EVENTS CALENDAR</h2>
				<?php echo do_shortcode('[ai1ec view="posterboard"]'); ?>
			</section>	
		</main>

<?php get_footer(); ?>