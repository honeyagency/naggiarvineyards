
<aside class="<?php if (is_home() || is_archive() || is_single() || is_search()) {echo 'right-sidebar';} elseif (is_page('contact')) {echo 'contact-sidebar';} else {echo 'sidebar';} ?>" role="complementary">

	<?php if (is_home() || is_single() || is_archive() || is_category() || is_search()) {?>
	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
	</div>
	<?php } else if ((is_page('2776') || $post->post_parent == 2776) || is_page_template( 'wines-logic.php' ) || is_singular('wines')) { ?>
	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-wines')) ?>
	</div>
	<?php } else if (is_page('8') || is_page('125') || ($post->post_parent == 8)) { ?>
	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-tasting-room')) ?>
	</div>
	<?php } else if (is_page('contact')) { ?>
	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-contact')) ?>
	</div>
	<?php } else if (is_page('wine-club') || ($post->post_parent == 12)) { ?>
	<div class="box club">
		<a class="square" href="https://shop.naggiarvineyards.com/index.cfm?method=members.showlogin">manage<br/>my club</a>
		<a class="square" href="http://shop.naggiarvineyards.com/index.cfm?method=storeproducts.showlist&productcategoryid=F7CD4823-F45F-42F7-AD12-E24F567E4AC5&isMarketingURL=1&maxrows=120">Explore Our<br/>Wines</a>
	</div>
	<?php } else if (is_page('events') || ($post->post_parent == 10)) { ?>
	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-events')) ?>
	</div>
	<div class="box">
		<a href="<?php echo get_permalink( 135 );?>"><em class="first">Plan</em> <em class="second">Your</em> <em class="third">Event</em><span> <b>at</b></span><i> Naggiar</i> <i>Vineyards</i></a>
		<a href="<?php echo get_permalink( 141 );?>">view all<i>Events</i></a>
	</div>
	<?php } else if (is_tree('5942')) { ?>
	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-della-casa')) ?>
	</div>
	<?php } else if (is_tree('5954')) { ?>
	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-nv-wines')) ?>
	</div>
	<?php } else { ?>	
	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-about')) ?>
	</div>
	<?php } ?>

</aside>