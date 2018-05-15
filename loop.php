<?php if ( is_home() ) {
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts($query_string . '&cat=-30&paged='.$paged);
} ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('small'); // Declare pixel size you need inside the array ?>
			</a>
		<?php endif; ?>
		<!-- /post thumbnail -->

		<!-- post title -->
		<h2>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
		<!-- /post title -->

		<!-- post details -->
		<span class="meta"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?> | <?php the_time('F j, Y'); ?></span>
		<!-- /post details -->


		<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
		
		<?php echo do_shortcode('[ssba]'); // Simple Sharing Plugin ?> 
		
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
