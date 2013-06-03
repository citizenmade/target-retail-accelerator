//script by Jordan Rodriguez
//http://jordanrodriguez.com/jquery-nested-accordion-menu/

jQuery(document).ready(function() {
	var parentDivs = jQuery('#nestedAccordion div'),
	childDivs = jQuery('#nestedAccordion h3').siblings('div');
	
	jQuery('#nestedAccordion h2').click(function(){
		parentDivs.slideUp();
		jQuery('#nestedAccordion h2').css({"backgroundColor": "#464646", "color": "gray"});
		jQuery(this).css({"backgroundColor": "#383838", "color": "white"});
		if(jQuery(this).next().is(':hidden')){
			jQuery(this).next().slideDown();
		}else{
			jQuery(this).next().slideUp();
		}
	});
	jQuery('#nestedAccordion h3').click(function(){
		childDivs.slideUp();
		if(jQuery(this).next().is(':hidden')){
			jQuery(this).next().slideDown();
		}else{
			jQuery(this).next().slideUp();
		}
	});
});