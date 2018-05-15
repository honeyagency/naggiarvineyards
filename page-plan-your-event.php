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

					<br class="clear">

					<?php edit_post_link(); ?>

				</article>
				<article class="linebreak clearfix plan-events">
					<div class="row first">
						<div class="six columns">
							<?php $attachment_id = get_field('plan_event_img_one');
							$size = "full"; // (thumbnail, medium, large, full or custom size)
							 
							$image = wp_get_attachment_image_src( $attachment_id, $size );
							?>
							<img class="flex" src="<?php echo $image[0]; ?>" />

						</div>
						<div class="text ten columns">
								<?php if(get_field('plan_event_txt_one')) {
								echo get_field('plan_event_txt_one');
							} ?>
						</div>
					</div><?php //row ?>
					<div class="row">
						<div class="six columns">
							<?php $attachment_id = get_field('plan_event_img_two');
							$size = "full"; // (thumbnail, medium, large, full or custom size)
							 
							$image = wp_get_attachment_image_src( $attachment_id, $size );
							?>
							<img class="flex" src="<?php echo $image[0]; ?>" />

						</div>
						<div class="text ten columns">
								<?php if(get_field('plan_event_txt_two')) {
								echo get_field('plan_event_txt_two');
							} ?>
						</div>
					</div><?php //row ?>
				</article>
				<article class="linebreak">
					<h1>contact</h1>
					<blockquote>
						Need to get in touch with our event coordinator? Please fill out our form below and we’ll contact you as soon as possible.
					</blockquote>	
					<?php echo do_shortcode('[contact-form-7 id="144" title="Events Contact"]'); ?>
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