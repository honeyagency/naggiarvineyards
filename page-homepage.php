<?php get_header(); ?>	
	<div class="myslider">
		<a class="visit" href="http://naggiarvineyards.com/about/our-story/">Visit Naggiar Vineyards</a>
		<div class="slideshow">
			<?php if(have_rows('slideshow')) :
				while(have_rows('slideshow')) : the_row();
			?>
			<div onclick="location.href='<?php the_sub_field('slide_link');?>';" style="background: white url('<?php the_sub_field('slide_image');?>') no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(
src='<?php the_sub_field('slide_link');?>',
sizingMethod='scale'); -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(
src='<?php the_sub_field('slide_link');?>',
sizingMethod='scale')";" class="slide" data-type="background" data-speed="10"></div>
			<?php endwhile; endif; ?>
		</div>
	<div class="more">
		<div class="cell"></div>
		<div class="cell center"><a href=""> View More </a></div>
		<div class="cell"></div>	
	</div>	
	</div>	
		<main role="homepage">
			<!-- section -->
			<section class="blocks">
				<?php query_posts( 'category_name=homepage&posts_per_page=1' ); if ( have_posts() ) : while ( have_posts() ) : the_post();?>	
				<article>
					<?php $firstlink = get_permalink(); //Set first link variable ?>
					<?php 
					the_title('<h3>', '</h3>');
					if(has_post_thumbnail()) { ?>
					<a class="thumbnail" href="<?php the_permalink();?>">
					<?php the_post_thumbnail('small', array('class' => 'flex'));?></a> 
					<?php } 
					the_excerpt();
					?>
					<a class="read-more" href="<?php the_permalink();?>">View Full Details ></a>
				</article>
				<?php endwhile; endif; wp_reset_query();?>
				<?php //Naggiar News ?>
				<?php query_posts( 'category_name=naggiar-news&posts_per_page=1' ); if ( have_posts() ) : while ( have_posts() ) : the_post();?>	
				<article>
					<?php $secondlink = get_permalink(); //Set first link variable ?>
					<h3>Naggiar News</h3>
					<?php 
					if(has_post_thumbnail()) { ?>
					<a class="thumbnail" href="<?php the_permalink();?>">
					<?php the_post_thumbnail('small', array('class' => 'flex')); ?></a> <?php } 
					the_excerpt();
					?>
					<a class="read-more" href="<?php the_permalink();?>">View Full Details ></a>
				</article>
				<?php endwhile; endif; wp_reset_query();?>
				<?php //Naggiar News ?>
				<article>
					<?php $attachment_id = get_field('right_box_area_image');
						$size = "small"; // (thumbnail, medium, large, full or custom size)
						$image = wp_get_attachment_image_src( $attachment_id, $size );
						echo '<h3>' . get_field('right_box_area_title') . '</h3>';?>
						<a class="thumbnail" href="<?php echo get_permalink('4624');?>"><img class="flex wp-post-image" src="<?php echo $image[0]; ?>" /></a>
						<?php echo '<p>' . get_field('right_box_area_text') . '</p>' ;?>
					<a class="read-more" href="<?php echo get_permalink('4624');?>">Join ></a>
				</article>
				<div class="home-links"><a href="<?php echo $firstlink; ?>"><span>View Full Details</span></a><a href="<?php echo $secondlink; ?>"><span>View Full Details</span></a><a href="<?php echo get_permalink('4624');?>"><span>Join ></span></a></div>
			</section>
			<!-- /section -->
			<section id="tripAdivsor">
				<?php $trip_advisor = get_field('trip_advisor');
					if ($trip_advisor != null) {
						echo $trip_advisor;
					}
					?>
			</section>
			<section class="white">
				<div class="map seven columns">
					<img class="flex" src="<?php bloginfo('template_directory'); ?>/img/bg/map.png">
				</div>
				
				<div class="text nine columns">
					<h3>Plan YouR next visit</h3>
					<div class="eight columns">
						<?php echo get_field('directions');?>
					</div>
					<div class="eight columns">
						<?php echo get_field('hours');?>
					</div>
				</div>

			</section>	
		</main>

<?php get_footer(); ?>
