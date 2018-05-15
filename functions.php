<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/


/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 500, 9999); // Medium Thumbnail
    add_image_size('small', 320, 320, true); // Small Thumbnail
    add_image_size('page-header', 800, 280, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
    add_image_size('page-brands-header', 800, '', true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
    add_image_size('wine', 185, 260, true); // For Wine Detail Page
    add_image_size('press', 230, 50, true); // For Press Page Links

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if (!is_admin()) {

    	wp_deregister_script('jquery'); // Deregister WordPress jQuery
    	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array(), '1.9.1'); // Google CDN jQuery
    	wp_enqueue_script('jquery'); // Enqueue it!

    	wp_register_script('conditionizr', 'http://cdnjs.cloudflare.com/ajax/libs/conditionizr.js/4.0.0/conditionizr.js', array(), '4.0.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js', array(), '2.6.2'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!

        wp_register_script('scrolly', get_template_directory_uri() . '/js/jquery.scrolly.js', array(), '1.0.0'); // Scrolly Parallax Effect
        wp_enqueue_script('scrolly'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!

    wp_register_style('maincss', get_template_directory_uri() . '/css/screen.css', array(), '2.0', 'all');
    wp_enqueue_style('maincss'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'top-menu' => __('Top Menu', 'html5blank'), // Top Navigation if needed (duplicate as many as you need!)
        'footer-menu' => __('Footer Menu', 'html5blank'),
        'vineyards-menu' => __('Vineyards Menu', 'html5blank'),
        //'wines-menu' => __('Wines Menu', 'html5blank'),
        'about-menu' => __('About Menu', 'html5blank'),
        'press-menu' => __('Press Menu', 'html5blank'),
        'tasting-room-menu' => __('Tasting Room Menu', 'html5blank'),
        //'bistro-menu' => __('Bistro Menu', 'html5blank'), 
        'events-menu' => __('Events Menu', 'html5blank')
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Wine Sidebar', 'html5blank'),
        'description' => __('Sidebar for wines custom post type', 'html5blank'),
        'id' => 'widget-area-wines',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar About 
    register_sidebar(array(
        'name' => __('About Sidebar', 'html5blank'),
        'description' => __('Sidebar for About Pages', 'html5blank'),
        'id' => 'widget-area-about',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

     // Define Sidebar Tasting Room 
    register_sidebar(array(
        'name' => __('Tasting Room & Bistro Sidebar', 'html5blank'),
        'description' => __('Sidebar for Tasting Room Pages', 'html5blank'),
        'id' => 'widget-area-tasting-room',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Contact
    register_sidebar(array(
        'name' => __('Contact Sidebar', 'html5blank'),
        'description' => __('Sidebar for Contact Page', 'html5blank'),
        'id' => 'widget-area-contact',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    // Define Sidebar Events
    register_sidebar(array(
        'name' => __('Events Sidebar', 'html5blank'),
        'description' => __('Sidebar for Events Page', 'html5blank'),
        'id' => 'widget-area-events',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    // Define Sidebar Event Detail
    register_sidebar(array(
        'name' => __('Event Detail Sidebar', 'html5blank'),
        'description' => __('Sidebar for Event Detail Page', 'html5blank'),
        'id' => 'widget-area-event-single',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    // Define Sidebar Della Casa
    register_sidebar(array(
        'name' => __('Della Casa Sidebar', 'html5blank'),
        'description' => __('Sidebar for Della Casa Pages', 'html5blank'),
        'id' => 'widget-area-della-casa',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    // Define Sidebar Della Casa
    register_sidebar(array(
        'name' => __('NV Wines Sidebar', 'html5blank'),
        'description' => __('Sidebar for NV Wine Pages', 'html5blank'),
        'id' => 'widget-area-nv-wines',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
//add_action('init', 'create_post_type_wines'); // Add our Wines Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_wines()
{
    register_post_type('wines', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Our Wines', 'wines'), // Rename these to suit
                'singular_name' => __('Our Wines Post', 'wines'),
                'add_new' => __('Add New Wine', 'wines'),
                'add_new_item' => __('Add New Wine Post', 'wines'),
                'edit' => __('Edit', 'wines'),
                'edit_item' => __('Edit Wine', 'wines'),
                'new_item' => __('New Wine Post', 'wines'),
                'view' => __('View Wine Post', 'wines'),
                'view_item' => __('View Wine Post', 'wines'),
                'search_items' => __('Search Our Wines', 'wines'),
                'not_found' => __('No wines found', 'wines'),
                'not_found_in_trash' => __('No Wines found in Trash', 'wines')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), 
        'can_export' => true, // Allows export in Tools > Export
        ));
    }
        //Add Custom Taxonomy
        function wine_taxonomy() {
           register_taxonomy(
            'wine-type',
            'wines',
            array(
                'hierarchical' => true,
                'label' => 'Wine Type',
                'query_var' => true,
                'rewrite' => array('slug' => 'type')
            )
        );

        function wine_tags() {
            register_taxonomy(
            'tag',
            'wines'
            ,array(
                'hierarchical' => false,
                'labels' => $labels,
                'show_ui' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array( 'slug' => 'tag' ),
            )
        );
    }
}

 
add_action( 'init', 'wine_taxonomy' );
add_action( 'init', 'wine_tags' );

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

//Add Social Links to top nav

//Add Homelink to main header navigation
add_filter('wp_nav_menu_items','add_custom_menu_items', 10, 2);
function add_custom_menu_items( $items, $args ) {
    if( $args->theme_location == 'top-menu')  {
        
        $nvwinesGoldLink = '<li class="brand-links brand-nv"><a href="' . get_bloginfo('url') . '/nv-wines"><img height="68" src="' . get_bloginfo( 'stylesheet_directory' ) . '/img/brand-nv-gold.png"></a></li>';
        $nvwinesWhiteLink = '<li class="brand-links brand-nv"><a href="' . get_bloginfo('url') . '/nv-wines"><img height="68" src="' . get_bloginfo( 'stylesheet_directory' ) . '/img/brand-nv-white.png"></a></li>';
        $naggiarGoldLink = '<li class="brand-links brand-naggiar"><a href="' . get_bloginfo('url') . '/"><img height="68" src="' . get_bloginfo( 'stylesheet_directory' ) . '/img/brand-naggiar-gold.png"></a></li>';
        $naggiarWhiteLink = '<li class="brand-links brand-naggiar"><a href="' . get_bloginfo('url') . '/"><img height="68" src="' . get_bloginfo( 'stylesheet_directory' ) . '/img/brand-naggiar-white.png"></a></li>';
        $delacasaGoldLink = '<li class="brand-links brand-dela-casa"><a href="' . get_bloginfo('url') . '/della-casa"><img height="68" src="' . get_bloginfo( 'stylesheet_directory' ) . '/img/brand-dellacasa-gold.png"></a></li>';

        $spacer = '<li class="brand-spacer">&nbsp;</li>';

        $facebooklink = '<li class="facebook-link"><a href="https://www.facebook.com/pages/Naggiar-Vineyards-and-Winery/148240922872" target="_blank"><span aria-hidden="true" data-icon="e601" class="icon-facebook"></span></a></li>';
        $twitterlink = '<li class="twitter-link"><a href="https://twitter.com/NaggiarVineyard" target="_blank"><span aria-hidden="true" data-icon="e600" class="icon-twitter"></span></a></li>';
        $instagramlink = '<li class="instagram-link"><a href="http://instagram.com/naggiarvineyards" target="_blank"><span aria-hidden="true" data-icon="e609" class="icon-instagram"></span></a></li>';
        
        if (!is_tree('5942') && !is_tree('5954')) {
            $items = $delacasaGoldLink . $nvwinesGoldLink . $spacer . $items . $newitems . $facebooklink . $instagramlink . $twitterlink;
        } else if(is_tree('5942')) {
            $items = $naggiarWhiteLink . $nvwinesWhiteLink . $spacer . $items . $newitems . $facebooklink . $instagramlink . $twitterlink;
        } else if(is_tree('5954')) {
            $items = $naggiarGoldLink . $delacasaGoldLink . $spacer . $items . $newitems . $facebooklink . $instagramlink . $twitterlink;
        } else {
            $items = $items . $newitems . $facebooklink . $instagramlink . $twitterlink;
        }
        // $items = $nvwinesWhiteLink . $naggiarWhiteLink . $spacer . $items . $newitems . $facebooklink . $instagramlink . $twitterlink;
    }
    
    if( $args->theme_location == 'header-menu')  {
        
        $mobilebutton = '<li class="mobile-button"><a href="#">Navigation</a></li>';
        $items = $mobilebutton . $items . $newitems;
        
    }
   return $items;
}

//Add classes to first and last menu items

function add_first_and_last($output) {
  $output = preg_replace('/class="menu-item/', 'class="first-menu-item menu-item', $output, 1);
  $output = substr_replace($output, 'class="last-menu-item menu-item', strripos($output, 'class="menu-item'), strlen('class="menu-item'));
  return $output;
}
add_filter('wp_nav_menu', 'add_first_and_last');


//Add items to footer nav
add_filter('wp_nav_menu_items','add_custom_footer_items', 10, 2);
function add_custom_footer_items( $items, $args ) {
    if( $args->theme_location == 'footer-menu')  {
        
        $copyright = '<li class="copyright"><a href="' . home_url() . '">&copy;' . date('Y') . ' Naggiar Vineyards - </a></li>';
        $honey = '<li class="honey-link"><a href="http://honeyagency.com" target="_blank">Website Design by Honey Agency</a></li>';
        $items = $copyright . $items . $newitems . $honey;

    }
    return $items;
}

function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
    global $post;             // load details about this page
    if(is_page()&&($post->post_parent==$pid||is_page($pid))) 
       return true;           // we're at the page or at a sub page
    else 
       return false;          // we're elsewhere
};

?>
