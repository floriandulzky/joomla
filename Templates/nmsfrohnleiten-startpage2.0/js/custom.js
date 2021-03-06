$(window).resize(function() {
    $('.main').height($(window).height() - $('header').height());
    $('.content').height($(window).height() - $('header').height());
    $('.sections').height($('.content').height() - $('.scroll').height());
    $('.google-maps').height($(window).height() - $('.contact-headline').height());
});
$(window).resize();

$('.scroll-down').click(function(){
	$('.sections').animate({
		scrollTop: $('.sections').scrollTop() + 190
	}, 'fast'
	);
});

$('.scroll-up').click(function(){
	$('.sections').animate({
		scrollTop: $('.sections').scrollTop() -190
	}, 'fast'
	);
});

/**
 * JS for Mobile-Menu
 */
$('.menu-opener').click(function(){
	var actual_height = $('header').height();
	var height = 112;
	if(actual_height <= 112){
		height = calcHeaderHeight();
		$('#menu').show();
	}else{
		$('#menu').hide();
	}
	$('header').animate({
		'height': height
	}, "slow");
});

$('ul.menu > li.parent').each(function(){
	$('<span class="show-submenu right glyphicon glyphicon-chevron-down"></span>').insertAfter($(this).find('a:first'));
});

$('.show-submenu').on('click', function(){
	var actualHeight = $(this).parent('li').height();
	$('ul.menu li.parent').find('ul').hide();
	$('ul.menu li.parent').css('height', 40);
	if(actualHeight <= 40){
		$(this).parent('li').find('ul').show();
	}else{
		$(this).parent('li').find('ul').hide();
	}
	var height = 50
	$(this).parent('li').find('ul').find('li').each(function(){
		if($(this).is(':visible')){
			height += $(this).height() + 20;
		}
	});
	$(this).parent('li').css('max-height', height);
	$(this).parent('li').css({'height': height});
	var headerHeight = calcHeaderHeight() + 70;
	$('header').animate({
		'height': headerHeight
	}, "slow");
});

function calcHeaderHeight(){
	var height = 112;
	$('ul.menu > li').each(function(){
		height += $(this).height();
	});
	height += 112;
	return height;
}


//Google-Maps
function initialize()
{
	var mapProp = {
	  center:new google.maps.LatLng(47.269253,15.320086),
	  zoom:15,
	  scrollwheel: false,
	  mapTypeId:google.maps.MapTypeId.ROADMAP
	};

	
	var map=new google.maps.Map(document.getElementById("googleMap")
	  ,mapProp);
	  
	var info = new google.maps.InfoWindow();
	info.setContent(
		$('.contact').html()
	);
	info.setPosition(new google.maps.LatLng(47.269253,15.320086));
	info.open(map);
}
google.maps.event.addDomListener(window, 'load', initialize);


// Scroll to Anchor
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

//Show scroll to top button
$(window).scroll(function(){
	if($(window).scrollTop() > 180){
		$('.scroll-top').fadeIn();
	}else{
		$('.scroll-top').fadeOut();
	}
});

// Scroll to top
$('.scroll-top').on('click', function(){
	$('html,body').animate({
        scrollTop: 0
      }, 1000);
});

// Lightbox init
$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});