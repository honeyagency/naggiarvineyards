<?php get_header(); ?>

	<main>
		<!-- section -->
		<section class="wrightsidebar">

			<h1><?php _e( '', 'html5blank' ); single_cat_title(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
		<?php get_sidebar(); ?>
	</main>

<?php get_footer(); ?>
