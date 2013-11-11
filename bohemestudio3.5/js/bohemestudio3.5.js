//bohemestudio 3.0

//Version: 3.5 - November 2013
//Version: 3.1 - November 2012
//Version: 3.0 - April/May 2012
//Author: Miguel A. Rodriguez | contact@bohemestudio.com




//SOCIAL BAR MODULE ======================================================================================

SocialBarModule = (function() {

	initSocialBar = function(){
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
	};


    return {
        init: function() {
            initSocialBar();
        }
    };


}());
//========================================================================================================


//VIDEO NAVIGATION MODULE ================================================================================

VideoNavigationModule = (function() {

	initVideoNavigation = function(){
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
			newActiveVideoContent = "." + newActiveVideo +"-content";
			$(newActiveVideoContent).fadeIn("slow");
		});
	};


    return {
        init: function() {
            initVideoNavigation();
        }
    };


}());
//========================================================================================================


//ROTATOR MODULE =========================================================================================

RotatorModule = (function() {


	theRotator = function(){
		//Init Rotator first child
		$('div#rotator ul li:first-child').addClass('show');

		//Set the opacity of all images to 0
		$('div#rotator ul li').css({opacity: 0.0});

		//Get the first image and display it (gets set to full opacity)
		$('div#rotator ul li:first').css({opacity: 1.0});

		//Call the rotator function to run the slideshow, 6000 = change to next image after 6 seconds
		setInterval('rotate()',5000);

	}

	rotate = function(){
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


    return {
        init: function() {
            theRotator();
        }
    };


}());
//========================================================================================================


//SCROLL TO CATEGORY MODULE ======================================================================================

ScrollToCategoryModule = (function() {

    scrollToGallery = function(){
        $(".page-title a").click(function(e){
            e.preventDefault();

            $('html, body').animate({
                scrollTop: $("#category-photos").offset().top - 120
             }, 1000);
        });
    };


    return {
        init: function() {
            scrollToGallery();
        }
    };


}());
//========================================================================================================


//SHARE THIS MODULE ======================================================================================

ShareThisModule = (function() {

    shareThisModule = function(){
        $('#share-button').socialShare({
            social: 'facebook,twitter,google,pinterest,linkedin,tumblr,blogger',
            whenSelect: true,
            selectContainer: '#share-button'
        });
    };


    return {
        init: function() {
            shareThisModule();
        }
    };


}());
//========================================================================================================


//LOADING MODULES ========================================================================================

var loadModules = function(){


    //Common modules
    //console.log("LOADING... SOCIAL BAR MODULE");
    SocialBarModule.init();


    //console.log("LOADING... SHARE THIS MODULE");
    ShareThisModule.init();


    //ROTATOR HOMEPAGE MODULE
    if( $('#rotator').length > 0 ){

        //console.log("LOADING... ROTATOR MODULE");
        RotatorModule.init();

    };

    //VIDEO NAVIGATION MODULE
    if( $('.video').length > 0 ){

        //console.log("LOADING... VIDEO NAVIGATION MODULE");
        VideoNavigationModule.init();

    };

    //SCROLL TO CATEGORY GALERY MODULE
    if( $('#category-photos').length > 0 ){

        //console.log("LOADING... SCROLL TO CATEGORY MODULE");
        ScrollToCategoryModule.init();

    };


};

//========================================================================================================


$(document).ready(function() {
    loadModules();
});


