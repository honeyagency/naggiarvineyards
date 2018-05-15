<?php get_header(); ?>

	<main class="blog">
		
		<!-- section -->
		<section class="wrightsidebar">

			<h1><?php _e( 'Latest Posts', 'html5blank' ); ?></h1>
						
			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
		<?php get_sidebar(); ?>
	</main>

<?php get_footer(); ?>
