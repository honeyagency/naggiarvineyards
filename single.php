<?php get_header(); ?>

	<main>
	<!-- section -->
	<section class="wrightsidebar">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<!-- post title -->
			<h1>Blog</h1>
			<!-- /post title -->
			<!-- /post thumbnail -->
			<h2><?php the_title(); ?></h2>
			<!-- post details -->
			<!-- post thumbnail -->
			<div class="feature">
			<?php if ( has_post_thumbnail() && (get_field('show_feature_image') != 'no') ) : // Check if Thumbnail exists ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('medium', array('class' => 'flex')); // Fullsize image for the single post ?>
				</a>
			<?php endif; ?>
			</div>
			
			<!-- /post details -->

			<?php the_content(); // Dynamic Content ?>
			<?php echo do_shortcode("[jetpack_subscription_form]"); ?>
			<?php comment_form(); ?>
		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>
	<?php
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  echo "<a href='$url' class=\"back-button\">< back</a>"; 
?>
	</section>
	<?php get_sidebar(); ?>
	</main>



<?php get_footer(); ?>
