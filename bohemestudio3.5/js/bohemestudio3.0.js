//bohemestudio 3.0 
//Version: 3.0 - April/May 2012
//Author: Miguel A. Rodriguez

function theRotator() {
	//Set the opacity of all images to 0
	$('div#rotator ul li').css({opacity: 0.0});
	
	//Get the first image and display it (gets set to full opacity)
	$('div#rotator ul li:first').css({opacity: 1.0});
		
	//Call the rotator function to run the slideshow, 6000 = change to next image after 6 seconds
	setInterval('rotate()',6000);
	
}

function rotate() {	
	//Get the first image
	var current = ($('div#rotator ul li.show')?  $('div#rotator ul li.show') : $('div#rotator ul li:first'));

	//Get next image, when it reaches the end, rotate it back to the first image
	var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('div#rotator ul li:first') :current.next()) : $('div#rotator ul li:first'));	
	
	//Set the fade in effect for the next image, the show class has higher z-index
	next.css({opacity: 0.0})
	.addClass('show')
	.animate({opacity: 1.0}, 1000);

	//Hide the current image
	current.animate({opacity: 0.0}, 1000)
	.removeClass('show');
	
};

$(function() {
    var open = false;
    $('#social-bar-button').click(function() {
        if(open === false) {
	    $('#social-bar').animate({
		right: "0"
	    }, 500);
	    $('#social-bar-button').css("background-position", "0px -50px")
            open = true;
        } else {
	    $('#social-bar').animate({
		right: "-600px"
	    }, 500);
	    $('#social-bar-button').css("background-position", "0px 0px")
            open = false;
        }
    });
});

$(document).ready(function() {
	$('div#rotator ul li:first-child').addClass('show');
			
	//Load the slideshow
	theRotator();
	
	$('#video-navigation ul li a').click( function(){
		//get displayed video class
		var currentVideoContent = $('#video-navigation ul li.video-active a').attr('class'); 
	
		//hide all articles (videos)
		$(".video article").hide();
		//remove video-active class
		$('#video-navigation ul li.video-active').removeClass("video-active");
	
		//Add class to selected video
		var newActiveVideo = $(this).attr('class');
		$(this).parent().addClass("video-active");
		
		//display selected video
		newActiveVideoContent = "." + newActiveVideo +"-content"
		$(newActiveVideoContent).fadeIn();
	});
	
	//Scroll and highlight category photos
	$('a[href^="#"]').bind('click.smoothscroll',function (e) {
	    e.preventDefault();
	    var target = this.hash,
	        $target = $(target);
	    	var myOffset = $target.offset().top;
	    	myOffset = myOffset - 130; 
	    $('html, body').stop().animate({
	        'scrollTop': myOffset
	    }, 500, 'swing', function () {
	    	
	        window.location.hash = target;
	    });
	});

	
	
});
