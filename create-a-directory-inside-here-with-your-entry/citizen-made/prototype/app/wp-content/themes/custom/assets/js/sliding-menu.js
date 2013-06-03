//Open source plugin credited to Aldo Lugo
//https://github.com/aldomatic/FB-Style-Page-Slide-Menu

//Modified to include fixed header and footer
//Then remodified to comment out that due to CSS changes


$(document).bind("mobileinit", function () {
    $.mobile.pushStateEnabled = true;
});
 
$(function () {
	//random thing to make menu same height as window
	//fixes bug in mobile safari
	//$("#menu").height($(window).height());
    var menuStatus;
	//var oldSlideWidth;
	//var newSlideWidth;
    var show = function() {
        if(menuStatus) {
            return;
        }
		//oldSlideWidth = $('.pages').width();
		//newSlideWidth = oldSlideWidth - 275;
		//$('.remove-slide, #wrapper').fadeOut(300);
		//$('.ui-block-a').css("width" , "100%");
        $('#menu').show();
        $.mobile.activePage.animate({
            marginLeft: "275px",
        }, 300, function () {
            menuStatus = true
        });
		//$('.ui-header-fixed').animate({"left":"165px"}, 300);
		//$('.ui-footer-fixed').animate({"left":"165px"}, 300);
    };
    var hide = function() {
        if(!menuStatus) {
            return;
        }
		//$('.remove-slide, #wrapper').fadeIn(300);
		//$('.ui-block-a').css("width" , "20%");
        $.mobile.activePage.animate({
            marginLeft: "0px",
        }, 300, function () {
            menuStatus = false
            $('#menu').hide();
        });
		//$('.ui-header-fixed').animate({"left":"0px"}, 300);
		//$('.ui-footer-fixed').animate({"left":"0px"}, 300);
    };
    var toggle = function() {
        if (!menuStatus) {
            show();
        } else {
            hide();
        }
        return false;
    };
 
    // Show/hide the menu
	//depreciated code, now need to use the ON function
    $("a.showMenu").click(toggle);
    //$('#menu, .pages').live("swipeleft", hide);
    //$('.pages').live("swiperight", show);
	$('#menu, .pages').on("swipeleft", hide);
    $('.pages').on("swiperight", show); 
	//prevent lookbook div from swiping
	$(".noSwipe").on("swiperight", function(e) {
		e.stopPropagation();
	});
	//$(document).on("swipeleft","#menu, .pages", hide); 
	//$(document).on("swiperight",".pages", show); 
 
    $('div[data-role="page"]').live('pagebeforeshow', function (event, ui) {
        menuStatus = false;
        $(".pages").css("margin-left", "0");
		//$(".ui-header-fixed").css("left", "0");
		//$(".ui-footer-fixed").css("left", "0");
    });
 
    // Menu behaviour
    $("#menu li a").click(function () { 
        var p = $(this).parent();
        p.siblings().removeClass('active');
        p.addClass('active');
    });
});