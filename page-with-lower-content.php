<?php /* Template Name: Page with Lower Content */ get_header(); ?>
		
		<main>
			<?php get_sidebar(); ?>
			<!-- section -->
			<section class="wleftsidebar">

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				
				<?php if(has_post_thumbnail()) { the_post_thumbnail('page-header', array('class' => 'flex')); } ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1><?php if (is_page('tasting-room-bistro')) {echo 'Tasting rOOm';} else if (is_page('wines-vineyards')){echo 'wines';} else { the_title();} ?></h1>
					<?php the_content(); ?>
					
					<br class="clear">

					<?php edit_post_link(); ?>

				</article>
				<?php $attachment_id = get_field('lower_header_image');
					$size = "page-header"; // (thumbnail, medium, large, full or custom size)
					$image = wp_get_attachment_image_src( $attachment_id, $size );
					?>
					<img class="flex wp-post-image" src="<?php echo $image[0]; ?>" />

				<article >
					<?php echo '<h1>' . get_field('lower_title') . '</h1>'; ?>
					<?php echo get_field('lower_content'); ?>
				</article>
				<?php //Lower Content Area ?>

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