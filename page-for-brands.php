<?php /* Template Name: Page for Brands */ get_header(); ?>
        
        <main>
            <?php get_sidebar(); ?>
            <!-- section -->
            <section class="wleftsidebar">
            
                <div class="colorSection">

                    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                        
                        <?php if(has_post_thumbnail()) { the_post_thumbnail('page-brands-header', array('class' => 'flex')); } ?>

                        <!-- article -->
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <h1><?php if (is_page('tasting-room-bistro')) {echo 'Tasting rOOm';} else if (is_page('wines-vineyards')){echo 'wines';} else { the_title();} ?></h1>
                            <?php the_content(); ?>
                            
                            <br class="clear">

                            <?php edit_post_link(); ?>

                        </article>

                    <?php endwhile; ?>

                    <?php else: ?>

                        <!-- article -->
                        <article>

                            <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

                        </article>
                        <!-- /article -->

                    <?php endif; ?>

                </div>

            </section>
            <!-- /section -->
        </main>

<?php get_footer(); ?>