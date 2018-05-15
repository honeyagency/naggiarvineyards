<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=no">
		
		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

        <?php if(is_page('homepage')) {?>
        <script>
            $(document).ready(function(){
				//Measure the window width
            	var $window = jQuery(window); //// so you have a "cached" reference 
    			var breakpoint = 600;
    			//Check if greater than breakpoint
            	if ($window.width() > breakpoint) { //Check if first slide is loaded before animation
	            	$(window).bind('load', function() {
	    				mySlideshow();
					});
            	}
            	//mySlideshow
    			function mySlideshow() {
	            	$('.myslider').delay(500).animate({height: '460'}, function() {
	            		$('.myslider .visit').delay(300).animate({left: '0'});
	            	});
				    $('.slide').each(function(){
				        var $bgobj = $(this); // assigning the object
				        $(window).scroll(function() {
				            var yPos = -($(window).scrollTop() / $bgobj.data('speed'));     
				            // Put together our final background position
				            var coords = '50% '+ yPos + 'px';
				            // Move the background
				            $bgobj.css({ backgroundPosition: coords });
				        }); 
				    });
				    $(".slideshow > div:gt(0)").hide();
					setInterval(function() { 
					  $('.slideshow > div:first-of-type')
					    .fadeOut(500)
					    .next()
					    .fadeIn(1000)
					    .end()
					    .appendTo('.slideshow');
					},  5000);
					} //end function 
				}); //end document ready
        </script>
    <?php } elseif (is_page('contact')) {?>
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> 
		<script>
		$(document).ready(function(){
			//$('.interact').hide();
			$('.interact').click(function(){
				$(this).fadeOut(function(){
					$('.shadow').fadeOut();
				});
			});
		});
		function initialize() {

		  var myLatlng = new google.maps.LatLng(39.056936, -121.182632);
		  var mapOptions = {
		    zoom: 9,
		    center: new google.maps.LatLng(39.056936, -121.182632),
		    mapTypeId: google.maps.MapTypeId.ROADMAP
		  }

		  var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

		  var contentString = '';

		  var infowindow = new google.maps.InfoWindow({
		      content: contentString,
		      maxWidth: 200
		  });

		  var marker = new google.maps.Marker({
		      position: myLatlng,
		      map: map,
		      title: 'Naggiar Vineyards'
		  });
		  google.maps.event.addListener(marker, 'click', function() {
		    infowindow.open(map,marker);
		  });
		}

		google.maps.event.addDomListener(window, 'load', initialize);
    	</script>
		<?php } else if(is_page('wine-club')) {?>
		<script>
				$(function() {
		  $('a[href*=#]:not([href=#])').click(function() {
		    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		      var target = $(this.hash);
		      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		      if (target.length) {
		        $('html,body').animate({
		          scrollTop: target.offset().top
		        }, 1000);
		        return false;
		      }
		    }
		  });
		});
		</script>
		<?php } ?>
		<?php if (is_tree('5942')): // Della Casa?>
			<style>
				header {
					background: #d01632;
				}
				.header .main-nav .logo a {
					background: url("<?php bloginfo('stylesheet_directory') ?>/img/bg/logo-della-casa.png") no-repeat center center;
					height: 182px;
					width: 182px;
				}
				@media (max-width: 800px) {
					.header .main-nav .logo a {
					    display: block;
					    position: relative;
					    width: 100%;
					}
				}
				.colorSection article {
				    padding-right: 35px !important;
				}
				header .main-nav nav[role="main"] ul li a {
					color: #ffffff;
				}
				.colorSection article p {
					color: #000;
				}
				.colorSection article h1 {
					color: #000;
					margin-left: 0;
				}
				.mobile-della-casa {
					display: none !important;
				}
			</style>
		<?php endif ?>

		<?php if (is_tree('5954')): // NV Wines?>
			<style>
				header {
					background: #181818 url("<?php bloginfo('stylesheet_directory') ?>/img/bg/header-nv-wines.jpg") no-repeat top center;
				}
				.header .main-nav .logo a {
					background: url("<?php bloginfo('stylesheet_directory') ?>/img/bg/logo-nv-wines.png") no-repeat center center;
					height: 167px;
					width: 157px;
				}
				@media (max-width: 800px) {
					.header .main-nav .logo a {
					    display: block;
					    position: relative;
					    width: 100%;
					}
				}
				header .main-nav nav[role="main"] ul li a {
					color: #ffffff;
				}
				.colorSection > img {
					vertical-align: middle;
				}
				.colorSection article {
					margin-left: 5px;
					background: url('http://nvwines.jnt.es/images/bg.jpg');
				    padding-right: 35px !important;
				}
				.colorSection article p {
					color: #a29061;
				}
				.colorSection article h1 {
					color: #a29061;
					margin-left: 0;
				}
				.mobile-nv-wines {
					display: none !important;
				}
			</style>
		<?php endif ?>
		<?php if (!is_tree('5954') && !is_tree('5942')): ?>
			<style>
				.mobile-naggiar {
					display: none !important;
				}
			</style>
		<?php endif ?>
	</head>
	<body <?php body_class(); ?>>
	
			<!-- header -->
			<header class="header clearfix" role="banner">
				<div class="topbar">
					<nav role="top">
						<?php wp_nav_menu (array ( 'theme_location' => 'top-menu') ); ?>
						<?php get_search_form(); ?>
					</nav>
				</div>	
					<div class="main-nav">
					<div class="logo">
						<?php if (is_tree('5942')): ?>
							<a href="<?php echo home_url(); ?>/della-casa">Della Casa</a>
						<?php elseif(is_tree('5954')): ?>
							<a href="<?php echo home_url(); ?>/nv-wines">NV Wines</a>
						<?php else: ?>
							<a href="<?php echo home_url(); ?>">Naggiar Vineyards</a>
						<?php endif ?>
					</div>	
					<!-- nav -->
					<nav class="clearfix" role="main">
						<?php html5blank_nav(); ?>
					</nav>
					<!-- /nav -->
				</div><?php //main-nav?>

			</header>
			<?php if (is_page('contact')) {?>
				<div class="contact-map">
					<div class="interact"></div>
					<div class="shadow"></div>
					<div id="map_canvas"></div>
				</div>	
			<?php } ?>	
			<!-- /header -->
			<div class="wrapper">
