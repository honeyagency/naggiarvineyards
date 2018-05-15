<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="wrightsidebar">

			<h1><?php _e( 'Archives', 'html5blank' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<?php get_sidebar(); ?>
	</main>

<?php get_footer(); ?>
