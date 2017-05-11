// Smooth Scrolling Script
$(document).ready(function(){
	  // Add smooth scrolling to all links
	  $("a").on('click', function(event) {

	    // Make sure this.hash has a value before overriding default behavior
	    if (this.hash !== "") {
	      // Prevent default anchor click behavior
	      event.preventDefault();

	      // Store hash
	      var hash = this.hash;

	      // Using jQuery's animate() method to add smooth page scroll
	      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
	      $('html, body').animate({
	      	scrollTop: $(hash).offset().top
	      }, 800, function(){

	        // Add hash (#) to URL when done scrolling (default click behavior)
	        window.location.hash = hash;
	    });
	    } // End if
	});
	});


jQuery(function($) {

    var $nav = $('#nav_bar');
    var $win = $(window);
    var winH = $win.height(); // Get the window height.

    $win.on("scroll", function () {
        if ($(this).scrollTop() > winH ) {
            $nav.addClass("doch");
            var $topshifts = $('#topshift');
            $topshifts.addClass("doch_top");
        } else {
            $nav.removeClass("doch");
            var $topshifts = $('#topshift');
            $topshifts.removeClass("doch_top");
        }
    }).on("resize", function(){ // If the user resizes the window
       winH = $(this).height(); // you'll need the new height value
    });

});