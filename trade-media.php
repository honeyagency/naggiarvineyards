<?php /* Template Name: Trade & Media */get_header(); ?>
		
		<main>
			<?php get_sidebar(); ?>
			<!-- section -->
			<section class="wleftsidebar">
				
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<!-- article -->
				<h1><?php the_title(); ?></h1>
					
					<div class="trade-nav">
						<a href="#naggiar">Naggiar</a>
						<a href="#della-casa">Della Casa</a>
						<a href="#nv-wines">NV Wines</a>
						<a href="#press">Press Kit</a>
					</div>

					<div class="trade-section" id="naggiar">
						<?php if(get_field('file_downloads_one')): $x = 0 ?>
							<h2><?php the_field('trade_section_title_one') ?></h2>
							<?php while (has_sub_field('file_downloads_one')): $x++?>
								<?php if ($x % 2): ?>
									<article class="downloads clearfix left">
								<?php else: ?>
									<article class="downloads clearfix right">
								<?php endif ?>
									<h4><?php the_sub_field('category_name'); ?></h4>
									
									
									<?php if(get_sub_field('file_category')):?>
										<?php while(has_sub_field('file_category')):?>

											<?php if(get_sub_field('section')):?>
												<ul>
													<?php while(has_sub_field('section')):?>
														
														<li>
															<a href="<?php the_sub_field('file_upload');?>"><?php the_sub_field('file_name');?></a>
														</li>

													<?php endwhile;?>
												</ul>
											<?php endif; ?>

										<?php endwhile;?>
									<?php endif; ?>


								</article>
							<?php endwhile; //while file_category ?>
					<?php endif; //if file_downloads_one ?>
				</div>

				<div class="trade-section" id="della-casa">
					<?php if(get_field('file_downloads_two')): $x = 0 ?>
							<h2><?php the_field('trade_section_title_two') ?></h2>
							<?php while (has_sub_field('file_downloads_two')): $x++?>
								<?php if ($x % 2): ?>
									<article class="downloads clearfix left">
								<?php else: ?>
									<article class="downloads clearfix right">
								<?php endif ?>
									<h4><?php the_sub_field('category_name'); ?></h4>
									
									
									<?php if(get_sub_field('file_category')):?>
										<?php while(has_sub_field('file_category')):?>

											<?php if(get_sub_field('section')):?>
												<ul>
													<?php while(has_sub_field('section')):?>
														
														<li>
															<a href="<?php the_sub_field('file_upload');?>"><?php the_sub_field('file_name');?></a>
														</li>

													<?php endwhile;?>
												</ul>
											<?php endif; ?>

										<?php endwhile;?>
									<?php endif; ?>


								</article>
							<?php endwhile; //while file_category ?>
					<?php endif; //if file_downloads_one ?>
				</div>

				<div class="trade-section" id="nv-wines">
					<?php if(get_field('file_downloads_three')): $x = 0 ?>
							<h2><?php the_field('trade_section_title_three') ?></h2>
							<?php while (has_sub_field('file_downloads_three')): $x++?>
								<?php if ($x % 2): ?>
									<article class="downloads clearfix left">
								<?php else: ?>
									<article class="downloads clearfix right">
								<?php endif ?>
									<h4><?php the_sub_field('category_name'); ?></h4>
									
									
									<?php if(get_sub_field('file_category')):?>
										<?php while(has_sub_field('file_category')):?>

											<?php if(get_sub_field('section')):?>
												<ul>
													<?php while(has_sub_field('section')):?>
														
														<li>
															<a href="<?php the_sub_field('file_upload');?>"><?php the_sub_field('file_name');?></a>
														</li>

													<?php endwhile;?>
												</ul>
											<?php endif; ?>

										<?php endwhile;?>
									<?php endif; ?>


								</article>
							<?php endwhile; //while file_category ?>
					<?php endif; //if file_downloads_one ?>
				</div>

				<div class="trade-section" id="press">
					<?php if(get_field('file_downloads_four')): $x = 0 ?>
							<h2><?php the_field('trade_section_title_four') ?></h2>
							<?php while (has_sub_field('file_downloads_four')): $x++?>
								<?php if ($x % 2): ?>
									<article class="downloads clearfix left">
								<?php else: ?>
									<article class="downloads clearfix right">
								<?php endif ?>
									<h4><?php the_sub_field('category_name'); ?></h4>
									
									
									<?php if(get_sub_field('file_category')):?>
										<?php while(has_sub_field('file_category')):?>

											<?php if(get_sub_field('section')):?>
												<ul>
													<?php while(has_sub_field('section')):?>
														
														<li>
															<a href="<?php the_sub_field('file_upload');?>"><?php the_sub_field('file_name');?></a>
														</li>

													<?php endwhile;?>
												</ul>
											<?php endif; ?>

										<?php endwhile;?>
									<?php endif; ?>


								</article>
							<?php endwhile; //while file_category ?>
					<?php endif; //if file_downloads_one ?>
				</div>
				
				<!-- /article -->
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