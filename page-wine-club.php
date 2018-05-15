<?php get_header(); ?>
    
    <main>
      <?php get_sidebar(); ?>
      <!-- section -->
      <section class="wleftsidebar">

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        
        <?php if(has_post_thumbnail()) { the_post_thumbnail('page-header', array('class' => 'flex')); } ?>

        <!-- article -->
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
          <br class="clear">

          <?php edit_post_link(); ?>

        </article>
        <article class="linebreak">
          <h1>Benefits</h1>
          <div class="benefits">
            <div class="row">
              <div class="one-third column">
                <h4><a href="#3bottle">3 Bottles</a></h4>
                <a class="bottleshot" href="#3bottle"><img src="<?php bloginfo('template_directory');?>/img/wine-club-3-bottle.png"></a>
                <div class="choose whole">
                  <a href="https://shop.naggiarvineyards.com/clubs/join?clublevelid=1D95D2A5-F8AD-44E4-9A4D-B760320CFD5A">Join</a>
                  </div>
                  <div class="choose">
                  <a href="https://shop.naggiarvineyards.com/clubs/join?clublevelid=6659ECF2-C003-4CF8-B20A-5ED65819D691">Red Only</a>
                  <a href="https://shop.naggiarvineyards.com/clubs/join?clublevelid=D384DFD6-69F5-4C09-91B6-9F8D48445EDA">White Only</a>
                </div>
                <div class="details">
                  <div class="price"><span>PRICE</span> - <?php echo get_field('club_price_one'); ?></div>
                  <p><?php echo get_field('club_desc_one'); ?></p>
                </div>  
              </div>
              <div class="one-third column">
                <h4><a href="#4bottle">4 Bottles</a></h4>
                <a class="bottleshot" href="#4bottle"><img src="<?php bloginfo('template_directory');?>/img/wine-club-4-bottle.png"></a>
                <div class="choose whole">
                <a href="https://shop.naggiarvineyards.com/clubs/join?clublevelid=FB1E23BE-0186-4B49-B635-F92535D9BC6D">Join</a>
                </div>
                <div class="choose center">
                <a href="https://shop.naggiarvineyards.com/clubs/join?clublevelid=E40ECA24-ECAA-424B-9402-0FEB100F2E8E">Red Only</a>
                  <a href="https://shop.naggiarvineyards.com/clubs/join?clublevelid=74AB864B-1775-4EA9-A018-C512FADE9C26">Reserve Only</a>
                </div>
                <div class="details">
                  <div class="price"><span>PRICE</span> - <?php echo get_field('club_price_two'); ?></div>
                  <p><?php echo get_field('club_desc_two'); ?></p>
                </div>  
              </div>  
              <div class="one-third column">
                <h4><a href="#6bottle">6 Bottles</a></h4>
                <a class="bottleshot" href="#6bottle"><img src="<?php bloginfo('template_directory');?>/img/wine-club-6-bottle.png"></a>
                <div class="choose">
                  <a href="https://shop.naggiarvineyards.com/clubs/join?clublevelid=4395EB04-08C2-4945-B022-C8DDF0E06553">Join</a>
                  <a href="https://shop.naggiarvineyards.com/clubs/join?clublevelid=C05306DF-95E1-4451-9FF2-15B97EF9EC1F">Red Only</a>
                </div>
                <div class="details" id="sixBottleMargin">
                  <div class="price"><span>PRICE</span> - <?php echo get_field('club_price_three'); ?></div>
                  <p><?php echo get_field('club_desc_three'); ?></p>
                </div>  
              </div>
            </div><?php //row ?>              
          </div>
          <span class="asterisk">* Prices per release and are subject to tax</span> 
        </article>
        <?php //Lower Content Area ?>
        <article class="lower-content">
          <?php echo get_field('lower_wine_club_content'); ?>
          <?php if(get_field('brochure_link')){?><a href="<?php echo get_field('brochure_link'); ?>" class="join" target="_blank"><span>Download Our Brochure</span></a><?php } ?>
          <br class="clear">

        </article>
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