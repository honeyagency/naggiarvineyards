<?php /* Template Name: Tasting Room & Bistro */ get_header(); ?>
		
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

					<?php if( have_rows('small_gallery_image') ) : ?>
					<div class="tasting-hours">
						<div class="one-half column">
							
							<?php $i=0;
							while ( have_rows('small_gallery_image') ) : the_row(); ++$i;
							$image = wp_get_attachment_image_src(get_sub_field('gallery_image'), 'small'); 
							$image_full = wp_get_attachment_image_src(get_sub_field('gallery_image'), 'large');?> 
							<a href="<?php echo $image_full[0]; ?>" rel="lightbox"><img <?php if($i > 3) {?>class="last-row"<?php } ?> src="<?php echo $image[0]; ?>"></a>
							<?php endwhile; ?>
						</div>
						<div class="one-half hours column">
							<?php echo get_field('small_gallery_text'); ?>
						</div>	
					</div>	
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