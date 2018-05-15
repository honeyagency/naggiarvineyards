<?php get_header(); ?>

	<main>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<!-- section -->
		<section class="wrightsidebar contact">
			<article>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</article>

		<?php endwhile; endif; ?>
		</section>
		<!-- /section -->
		<?php get_sidebar(); ?>
	</main>

<?php get_footer(); ?>
