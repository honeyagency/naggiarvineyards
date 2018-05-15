// DOM Ready
$(function() {
	

	// SVG fallback
	// toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script#update
	if (!Modernizr.svg) {
		var imgs = document.getElementsByTagName('img');
		for (var i = 0; i < imgs.length; i++) {
			if (/.*\.svg$/.test(imgs[i].src)) {
				imgs[i].src = imgs[i].src.slice(0, -3) + 'png';
			}
		}
	}

});

$(document).ready(function(){
	var doc = document.documentElement;
	doc.setAttribute('data-useragent', navigator.userAgent);
	
	var $window = jQuery(window); //// so you have a "cached" reference 
    var breakpoint = 800;
	var iframe = $('iframe');
	if (iframe.hasClass('notvid')) {}else{
		$('p iframe').wrap('<div class="video-container"></div>');
	}
	
	if ($window.width() < breakpoint) {
	//Remove Link from parent pages in top navigation
		$('nav li:has(ul.sub-menu)').children('a').removeAttr("href");
		//Navigation
		$('nav li.mobile-button a').click(function() {
			
			if ( $( 'nav[role="main"] ul' ).is( ".expanded" ) ) {
				$('nav[role="main"] ul li.menu-item').slideUp(function(){
					$('nav[role="main"] ul').removeClass('expanded');
					$('ul.sub-menu').hide();
				});
				} else {
				$('nav[role="main"] ul li.menu-item').slideDown(function(){
					$('nav[role="main"] ul').addClass('expanded');
				});
			}
			//Subnav
			$('nav[role="main"] ul li.menu-item').click(function(){
				if ( $(this).find('ul.sub-menu').is( ".sub-menu-expanded" ) ) {
					$(this).find('ul.sub-menu').slideUp(function(){
						$(this).removeClass('sub-menu-expanded');
					});
				} else {
					$(this).find('ul.sub-menu').slideDown(function(){
						$(this).addClass('sub-menu-expanded');
					});		
				}	
			});
		});
	} //endif
});