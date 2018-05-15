<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<!-- article -->
			<article id="post-404">

				<h1><?php _e( '404 Error', 'html5blank' ); ?></h1>
				<h4>
					<a href="<?php echo home_url(); ?>"><?php _e( 'We must have spilled over to the wrong page', 'html5blank' ); ?></a>
				</h4>
				<img class="image404" src="<?php bloginfo('template_directory');?>/img/404.png">

			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
