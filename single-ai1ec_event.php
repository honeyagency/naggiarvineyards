<?php get_header(); ?>

	<main>
	<!-- section -->
	<section class="wrightsidebar">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<!-- post title -->
			<h1>Events</h1>
			<!-- /post title -->

			<!-- post thumbnail -->
			<div class="feature">
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('large', array('class' => 'flex')); // Fullsize image for the single post ?>
				</a>
			<?php endif; ?>
			</div>
			<!-- /post thumbnail -->
			<h2><?php the_title(); ?></h2>

			<?php the_content(); // Dynamic Content ?>

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
		<adide class="right-sidebar">
			<div class="sidebar-widget">
				<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-event-single')) ?>
			</div>
		</aside>
	</main>



<?php get_footer(); ?>
