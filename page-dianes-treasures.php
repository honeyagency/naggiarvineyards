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
					<?php if( have_rows('treasure') ) :?>
						<div class="row">
						<?php while ( have_rows('treasure') ) : the_row();
						$image = wp_get_attachment_image_src(get_sub_field('treasure_image'), 'small');
						$image_full = wp_get_attachment_image_src(get_sub_field('treasure_image'), 'large');
						?>
						<div class="treasures one-third column">
							<a href="<?php echo $image_full[0]; ?>" rel="lightbox"><img src="<?php echo $image[0]; ?>" class="flex"></a>
						</div>
					<?php endwhile;?>
					</div><?php //row ?>
					 <?php endif; ?>	
					<br class="clear">

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