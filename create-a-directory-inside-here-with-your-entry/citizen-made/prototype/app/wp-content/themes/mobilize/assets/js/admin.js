function add_change(url){
jQuery("#my_special_div").append("<span><img class='special_img' src='"+url.trim()+"'/><span class='xicon'></span></span>");
jQuery("#my_special_div .xicon").click(function(){
var txt2='"'+jQuery(this).prev().attr('src')+'", ';
var textarea = jQuery(this).parent().parent().parent().find("#dbt_bgsliderimgs");
var txt = textarea.val();
textarea.val(txt.replace(txt2, ''));
	jQuery(this).parent().hide("slow").remove();
})
}
jQuery(document).ready(function() {
	jQuery("#my_special_div span").each(function(){
	var valr=jQuery(this).text();jQuery(this).text("");
	jQuery(this).prepend("<img class='special_img' src='"+valr.trim()+"'/><span class='xicon'></span>");
})

if(!jQuery("#my_special_div")){jQuery("#my_special_div").empty();}

jQuery("#my_special_div .xicon").click(function(){
	
var txt2='"'+jQuery(this).prev().attr('src')+'", ';
var textarea = jQuery(this).parent().parent().parent().find("#dbt_bgsliderimgs");
var txt = textarea.val();
textarea.val(txt.replace(txt2, ''));
	jQuery(this).parent().hide("slow").remove();
})
	})
