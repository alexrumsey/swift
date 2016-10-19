/*
Bones Scripts File
Author: Caitlin DiMare-Oliver

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

isMobile = {
	Android: function(){return navigator.userAgent.match(/Android/i) ? true : false;},
	BlackBerry: function(){return navigator.userAgent.match(/BlackBerry/i) ? true : false;},
	iOS: function(){return navigator.userAgent.match(/iPhone|iPad|iPod/i) ? true : false;},
	Windows: function(){return navigator.userAgent.match(/IEMobile/i) ? true : false;},
	any: function(){return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Windows());},
	tablet: function(){return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Windows()) && jQuery(window).width() > 767;}
};
isSmallMobile = { any: function(){return jQuery(window).width() < 767;} }

// $('img.photo',this).imagesLoaded(myFunction)
// execute a callback when all images have loaded.
// needed because .load() doesn't work on cached images
 
// mit license. paul irish. 2010.
// webkit fix from Oren Solomianik. thx!
 
// callback function is passed the last image to load
//   as an argument, and the collection as `this`
 


// as the page loads, call these scripts
jQuery(document).ready(function($) {

	/*
	Responsive jQuery is a tricky thing.
	There's a bunch of different ways to handle
	it, so be sure to research and find the one
	that works for you best.
	*/
	
	
	/* getting viewport width */
	var responsive_viewport = $(window).width();

	/******set images based on size********/

	/*  EXAMPLE CODE, modify for your needs
	*	USES DATA-ATTRIBUTES containing URLS to WordPress Generated sizes to replace with the correct image size
	*	There are many options for responsive image sizes in the works right now - a lot of change - this solution
	*	was specifically created for very large carousels to allow them to scale down nicely
	*	and isn't a great solution for all projects.
	*/

	/*
		var width = jQuery(window).width();
		var size = '';
		
		if( width < 482 )
			size = 'small';
		else if( width > 481 && width < 700 )
			size = 'medium';
		else if( width > 700 && width < 1500 )
			size = 'large';
		else 
			size = 'full';
		
		if( jQuery('.biobg').length >  0 )
		{
			jQuery('.carousel-inner .item').each(function(){
				if( jQuery(this).find('.biobg').data(size.toString()) )
				{
					var imgURL = jQuery(this).find('.biobg').data(size.toString());
					//console.log( "  imgURL " + imgURL );
					jQuery(this).find('.biobg').css('background-image','url("'+imgURL+'")');
				}
			
			});
		}
	*/


}); /* end of as page load scripts */



jQuery(window).resize(function() {
	/* getting viewport width */
	var responsive_viewport = jQuery(window).width();

}).resize();

	

/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
    var doc = w.document;
    if( !doc.querySelector ){ return; }
    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;
    if( !meta ){ return; }
    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true; }
    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false; }
    function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
        if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );



/** =======================================================================
    DOCUMENT READY FUNCTIONS
======================================================================== */

jQuery(document).ready(function ($) {	
    
    
/* -------------------------------------------
    Smooth Slide to Div ID
------------------------------------------- */    
jQuery(function($) {
  jQuery('.sub-menu a,[href^="#"]:not([data-toggle],a[href^="#company-info"],a.read-bio)').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        jQuery('html,body').animate({
          scrollTop: target.offset().top - 80 // can add offset here ( example: - 100 )
        }, 1000); // duration time of scroll
        return false;
      }
    }
  });
});

// if page has a #hash
if (location.hash) {
	$('html, body').scrollTop(0).show();
	// smooth-scroll to hash
	var target = jQuery(location.hash);
	jQuery('html,body').animate({
          scrollTop: target.offset().top - 80 // can add offset here ( example: - 100 )
        }, 1000); // duration time of scroll
}
	
	
//	
/* -------------------------------------------
    Scroll to top button
------------------------------------------- */   
    
//Check to see if the window is top if not then display button
	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 300) {
			jQuery('.scrollToTop').fadeIn();
		} else {
			jQuery('.scrollToTop').fadeOut();
		}
	});
	
	//Click event to scroll to top
	jQuery('.scrollToTop').click(function(){
		jQuery('html, body').animate({scrollTop : 0},800);
		return false;
	});    
	
	
	
// add .fade-in-video to video tag	
/* -------------------------------------------
    Fade-In Video
------------------------------------------- */
var fade_in_videos = document.querySelectorAll('.fade-in-video');
for( i=0; i<fade_in_videos.length; i++ ) {
    fade_in_videos[i].addEventListener("playing", function(){
        this.className += ' is-playing';
    });
}
    
var iOS = /iPad|iPhone|iPod/.test(navigator.platform);
if( iOS ) {
    var background_videos = document.querySelectorAll('.fade-in-video');
    for( i=0; i<background_videos.length; i++ ) {
        background_videos[i].parentNode.removeChild(background_videos[i]);
    }
}

    
/* -------------------------------------------
    end of Document Ready
------------------------------------------- */     
});

