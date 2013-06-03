<?php

add_shortcode('hr', 'hr_func');
function hr_func($atts, $content) {$func_output=''; $func_output.='<hr class="ornamental">'; return $func_output;}
add_shortcode('clear', 'clear_func');
function clear_func($atts, $content) {$func_output='';$func_output.='<div class="clearboth"></div>';return $func_output;}
add_shortcode('callout', 'callout_bg_func');
function callout_bg_func($atts, $content) {global $l_buffer;$func_output='';$func_output.='<div class="ui-bar ui-bar-c">';$func_output.=do_shortcode($content);$func_output.='</div>';$l_buffer+=0.5;return $func_output;}
add_shortcode('ornamental_title', 'ornament_func');
function ornament_func($atts, $content) {	global $l_buffer;$func_output='';$func_output.='<hr class="ornamental"/><h3 class="home-title">';$func_output.=do_shortcode($content);$func_output.='</h3><hr class="ornamental"/>';$l_buffer+=0.5;return $func_output;}
add_shortcode('frame', 'frame_func');
function frame_func($atts, $content) {global $l_buffer;$func_output='';$func_output.='<div class="social"/>';$func_output.=do_shortcode($content);$func_output.='</div>';$l_buffer+=0.5;return $func_output;}
add_shortcode('blockquote', 'cite_bg_func');
function cite_bg_func($atts, $content) {global $l_buffer;$func_output='';$func_output.='<blockquote style="font-style:italic;">"';$func_output.=do_shortcode($content);$func_output.='"</blockquote>';$l_buffer+=0.5;return $func_output;}
add_shortcode('error', 'error_func');
function error_func($atts, $content) {global $l_buffer;$func_output='';$func_output.='<div class="error_message"><h2>';$func_output.=do_shortcode($content);$func_output.='</h2></div>';$l_buffer+=0.5;return $func_output;}
add_shortcode('success', 'success_func');
function success_func($atts, $content) {global $l_buffer; $func_output='';$func_output.='<div class="success_message"><h2>';$func_output.=do_shortcode($content);$func_output.='</h2></div>';$l_buffer+=0.5;return $func_output;}
add_shortcode('warning', 'warning_func');
function warning_func($atts, $content) {global $l_buffer;$func_output='';$func_output.='<div class="warning_message"><h2>'; $func_output.=do_shortcode($content);$func_output.='</h2></div>';$l_buffer+=0.5;return $func_output;}
add_shortcode('info', 'info_func');
function info_func($atts, $content) {global $l_buffer;$func_output='';$func_output.='<div class="info_message"><h2>'; $func_output.=do_shortcode($content); $func_output.='</h2></div>'; $l_buffer+=0.5;return $func_output;}
add_shortcode('location_img', 'location_img_func');
function location_img_func($atts, $content) {
    global $l_buffer;
    $func_output='';
	   extract( shortcode_atts( array('lat' => 'something','long' => 'somethinga','language' => 'somethinga','width' => 'somethinga','height' => 'somethinga'), $atts ) );
	$latitude=$lat;$longitude=$long;
        $w=395;$h=200;
        if(isset($atts['width']))$w=$atts['width'];
        if(isset($atts['height']))$h=$atts['height'];
$func_output.='<div class="map" style="width:'.$w.'px; height:'.$h.'px;">';
$func_output.='<object width="'.$w.'" height="'.$h.'" data="http://maps.google.com/maps?f=q&source=s_q&hl=';
if($language)$func_output.=$language;else $func_output.='en';
$func_output.='&geocode=&q=centre&sll='.$latitude.','.$longitude.'&sspn=0.006328,0.017885&ie=UTF8&spn=0.032789,0.051745&output=embed"></object><br><small><a href="http://maps.google.com/maps?f=q&source=s_q&hl=';
if($language) $func_output.=$language; else $func_output.='en';
$func_output.='&geocode=&q=centre&sll='.$latitude.','.$longitude.'&sspn=0.006328,0.017885&ie=UTF8&spn=0.032789,0.051745&output=embed"></a></small>';
	$func_output.='</div>';
    $l_buffer+=0.5;
    return $func_output;
}
  class description_walker2 extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth=0, $args=array()) {

    	 $attributes  = ' data-prefetch';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'/"' : '';

           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }  
		if(strtolower($item->attr_title)=="header")
		$output.='<li role="heading" data-role="list-divider" class="ui-li ui-li-divider ui-bar-b">'.$item->title;
		else{
        $output.='<li data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" data-theme="c" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-btn-up-c"><div class="ui-btn-inner ui-li"><div class="ui-btn-text">'; 
		if($args->container!='')
		$output .= '<a'. $attributes .'  class="ui-link-inherit" data-transition="'.$args->container.'">';
			else {
			if(get_option_tree("choose_menu_ajax")=="true")
		$output .= '<a'. $attributes .'  data-ajax="true" class="ui-link-inherit">';
			else 
		$output .= '<a'. $attributes .'  data-ajax="false" class="ui-link-inherit">';
				}
		
        $output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
        $output .= $description.$args->link_after;
        $output .= '</a><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div>'; }
            
    }  
    function end_el(&$output, $item, $depth=0, $args=array()) {
        $output .= "</li>\n";  
    }  
}

add_shortcode('menu', 'menu_func');
function menu_func($atts, $content) {

	 $func_output = '';
	 $name="";
	 $title="";
	 $transs="";
	 $inset="yes";
	 $search="yes";
	 if(isset($atts['name']))$name=$atts['name'];
	 if(isset($atts['title']))$title=$atts['title'];
	 if(isset($atts['transition'])) $transs=$atts['transition'];
  	if(isset($atts['inset'])) $inset = $atts['inset'];
	if(isset ($atts['search'])) $search=$atts['search'];
	
	$walker2=new description_walker2();
	
	$func_output.='<ul class="custom-menu" data-role="listview"';
	if($inset=="yes")
	$func_output.=' data-inset="true"';
	else 
	$func_output.=' data-inset="false"';
	if($search=="yes")
	$func_output.=' data-filter-theme="d" data-filter-placeholder="Search..." data-filter="true"';
	$func_output.=' >';	
	if($title!='')$func_output.='<li data-role="list-divider" role="heading">'.$title.'</li>';
	$func_output.= wp_nav_menu( array(
                 'menu'=>$name,'container' =>$transs,'echo' => false, 'before' => '','after' => '','link_before' => '','link_after' => '','depth' => 0,'walker' => $walker2
                                ));	
	$func_output.='</ul>';							
return $func_output;	
}
	
$flv_button_nr = 0;
add_shortcode('button', 'button_func');
function button_func($atts, $content) {
    global $flv_button_nr;
    $flv_button_nr++;
    $func_output = '';
    
    $link = '#';
	$style= '';
	$pos= '';
	$dirr='';
	$ajax="false";
	
    if (isset($atts['url'])) $link = $atts['url'];
	if (isset($atts['icon'])) $style = $atts['icon'];
	if (isset($atts['icon_position'])) $pos = $atts['icon_position'];
	if (isset($atts['direction'])) $dirr = $atts['direction'];
	if(isset ($atts['ajax'])) $ajax=$atts['ajax'];

	if($dirr=="reverse")
	 $func_output.='<a rel="external" data-rel="back" id="button' . $flv_button_nr . '" href="' . $link . '" data-role="button" data-icon="'.$style.'"  data-direction="'.$dirr.'" data-iconpos="'.$pos.'">';
	else
    $func_output.='<a id="button' . $flv_button_nr . '" href="' . $link . '" data-role="button" data-icon="'.$style.'"  data-direction="'.$dirr.'" data-iconpos="'.$pos.'"  data-ajax="'.$ajax.'" >';
    $func_output.=strip_tags($content);
    $func_output.='</a>';

    return $func_output;
}
    add_shortcode('multiple_toggles', 'toggles_func');
    function toggles_func($atts, $content1) {
        $foutput = '';
        $foutput.='<div data-role="collapsible-set">';
        $foutput.=do_shortcode($content1);
        $foutput.='</div>';
        return $foutput;
    }

    add_shortcode('toggle', 'toggle_func');
    function toggle_func($atts, $content) {
        $func_output = '';
		$opened="no";
		if(isset($atts['opened'])  && strtolower($atts['opened'])=="yes") $opened="yes";
		if($opened=="yes")
		$func_output.='<div data-role="collapsible" data-collapsed="false"><h3>' . $atts['title'] . '</h3>';
		else
        $func_output.='<div data-role="collapsible" data-collapsed="true"><h3>' . $atts['title'] . '</h3>';
        $func_output.='<p>';
        $func_output.=do_shortcode($content);
        $func_output.='</p>';
        $func_output.='</div>';

        return $func_output;
    }

add_shortcode('social_icons', 'social_icons_func');
function social_icons_func($atts, $content) {
    global $l_buffer;
    $func_output='';
    $func_output.='<div class="social">';
	$slides = get_option_tree('sm_icons','', false, true, -1);
                                    foreach ($slides as $slide) {
                           $func_output.='<a href="' . $slide['link'] . '"><img src="' . $slide['image'] . '" alt="' . $slide['title'] . '" /></a>';
                                    }
    $func_output.='</div>';

    $l_buffer+=0.5;
    return $func_output;
}
add_shortcode('testimonial', 'testimonial_func');
function testimonial_func($atts, $content) {
    $a_bg = '';
    $b_bg='';
    $a_text = '';
    $a_color = '';
    if(isset($atts['bg'])){
        $a_bg = $atts['bg'];
        $b_bg = $atts['bg'];
    }
     if(isset($atts['textcolor'])){
        $a_text = $atts['textcolor'];
    }
    if(isset($atts['authorcolor'])){
        $a_color = $atts['authorcolor'];
    }
    
    $func_output='';
    $func_output.='<div class="testimonial">';
    $func_output.='<div style="color:'.$a_text.';background-color:'.$a_bg.';border-color:'.$b_bg.';" class="testimonial-box">';
    $func_output.='<span>';
    $func_output.=do_shortcode($content);
    $func_output.='</span>';
    $func_output.='<div class="testimonial-arrow" style="border-color:'.$b_bg.' transparent"></div><div class="testimonial-arrow-border"></div>';
    $func_output.='</div>';
    $func_output.='<div class="testimonial-author" style="color:'. $a_color .'">';
    $func_output.=$atts['author'];
    $func_output.='</div>';
    $func_output.='</div>';
    return $func_output;
}
     add_shortcode('latest_posts', 'latest_func');
    function latest_func($atts, $content){
    	$lnumber=4;
    	$lsource="post";
		$sear="yes";
    if(isset($atts['number'])){
        $lnumber = $atts['number'];
    }
	    if(isset($atts['search'])=="no"){
        $sear = $atts['search'];
    }

            $args = array('post_type' => 'post','posts_per_page' => $lnumber);
			
        $fout='';
        $fout.='<div class="padd"><div class="thumbnail-list">';
		if($sear=="no")
  $fout.='<ul data-role="listview" data-filter-theme="d" >';
else
     $fout.='<ul data-filter-placeholder="Search..." data-filter="true" data-role="listview" data-filter-theme="d" >';
   
      $wquery = new WP_Query( $args );
       foreach($wquery->posts as $port){	
            $postid = $port->ID;
			 if($port->post_excerpt==''){
			 	if(strlen($port->post_content)>100){
				 $desc=substr($port->post_content, 0, 100);
				 $desc.='...';}
				else 
				$desc=$port->post_content;
			 }
			 else 
			  $desc=$port->post_excerpt;
				
		$url=get_post_permalink($postid); 					
		$length=100;
		$image_url=wp_get_attachment_url( get_post_thumbnail_id($postid) );
		$id = get_post_meta($postid, 'my_meta_box_text', true);
		if($id!="")
		$image_url=THEME_URL.'assets/images/movie.png';				
		$fout.='<li class="ui-btn-icon-right" > 
		<div class="ui-btn-inner ui-li" aria-hidden="true">
               <div class="ui-btn-text">
               	<a class="ui-link-inherit" href="'. $url.'">';
               		 if($id!="") 
				$fout.='<img class="ui-li-thumb" style="margin:5px 0 0 15px;" src="'.$image_url .'" />';
					else 
				$fout.='<img class="ui-li-thumb" src="'.$image_url .'" />';

				$fout.='<h3 class="ui-li-heading">'. $port->post_title.'</h3>
						<p class="ui-li-desc">'.$desc.'</p>
			</a></div> 
			<span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span>	
 		</div>
		</li>';
	   }
	   $fout.='</ul></div></div>';
	 return $fout;
  
}
$fialovy_postgallery_nr = 0;
add_shortcode('posts_gallery', 'postgallery_func');
function postgallery_func($atts, $content) {
	 global $fialovy_postgallery_nr;
	 $fialovy_postgallery_nr++;
	  $func_output = '';
	 $lnumber=4;
	$bgcol="#000";
    $hidedesc="no";
    $desc="Click an image to enlarge.";
		    if(isset($atts['number'])) $lnumber = $atts['number'];

        if(isset($atts["bg_color"]))$bgcol = $atts['bg_color'];
        if(isset($atts["hide_description"]))$hidedesc = $atts['hide_description'];
 		if(isset($atts["bottom_description"])) $desc = $atts['bottom_description'];
		
	$args = array('post_type' => 'post','posts_per_page' => $lnumber,'meta_query' => array(
        array( 'key' => '_thumbnail_id')));
	$wquery = new WP_Query( $args );
	 $func_output.='<style>.ui-content{background:'.$bgcol.';overflow-x:visible}</style>';
	$func_output.='<div data-role="content" id="Gallery'.$fialovy_postgallery_nr.'" style="background:'.$bgcol.';"><ul class="gallery">';
       foreach($wquery->posts as $port){	
            $postid = $port->ID;
		$image = wp_get_attachment_image_src( get_post_thumbnail_id($postid)); 
		$func_output.='<li><a href="'.$image[0].'" rel="external"><img src="'.$image[0].'" alt="'.get_the_title($postid).'" /></a></li>'; 
	   }
	   $func_output.='</ul>';
	   if($hidedesc=="no")$func_output.='<p class="gal-description">'.$desc.'</p>';
	   $func_output.='</div>';
       $func_output.='<script>(function(window, PhotoSwipe){
			document.addEventListener("DOMContentLoaded", function(){
				var options = {},
					instance = PhotoSwipe.attach( window.document.querySelectorAll("#Gallery'.$fialovy_postgallery_nr.' a"), options );
			}, false);
		}(window, window.Code.PhotoSwipe));</script><style>.ui-content{padding-bottom:0px;}</style>'; 
	      return $func_output;
}

$fialovy_gallery_nr = 0;
add_shortcode('gallery', 'gallery_func');
function gallery_func($atts, $content) {
        global $fialovy_gallery_nr;
		$fialovy_gallery_nr++;
        $return = '';
		$bgcol="#000";
		$hidedesc="no";
		
		$source="mobilize";
		$order="ASC";
		$desc="Click an image to enlarge.";
		
        if(isset($atts["bg_color"]))$bgcol = $atts['bg_color'];
        if(isset($atts["hide_description"]))$hidedesc = $atts['hide_description'];
 		if(isset($atts["bottom_description"])) $desc = $atts['bottom_description'];
		if(isset($atts["source"])) $source = $atts['source'];
		if(isset($atts["order"]) && ($atts["order"]=="desc" ||  $atts["order"]=="DESC" )) $order="DESC"; else  $order="ASC";
		
		if(isset($atts["thumb_width"]) ) $twid=$atts["thumb_width"]; 
		if(isset($atts["thumb_height"])) $thei=$atts["thumb_height"];
		 $return.='<style>.ui-content{background:'.$bgcol.';overflow-x:visible}</style>';
		$return.='<div data-role="content" id="Gallery'.$fialovy_gallery_nr.'" style="background:'.$bgcol.';"><ul class="gallery">';
		if($source =="mobilize")
        $return.= do_shortcode(strip_tags($content));
		else {

    	global $post;
	$photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' =>$order, 'orderby' => 'menu_order ID') );
	$size= array();
	
	$size[0]=$twid;
	$size[1]=$thei;
	$results = array();
	if ($photos) {
		foreach ($photos as $photo) {
			$results[] = wp_get_attachment_image($photo->ID);
		}
	}
	foreach ($photos as $photo) 
	$return.='<li><a href="'.$photo->guid.'" rel="external"><img src="'.$photo->guid.'" style="width:'.$twid.'px !important; height:'.$thei.'px !important;" alt="'.$photo->post_title.'" /></a></li>'; 
		}
		$return.='</ul>';
	    if($hidedesc=="no")
        $return.='<p class="gal-description">'.$desc.'</p>';
	    $return.='</div>';
        $return.='<script>(function(window, PhotoSwipe){
			document.addEventListener("DOMContentLoaded", function(){
				var options = {},
					instance = PhotoSwipe.attach( window.document.querySelectorAll("#Gallery'.$fialovy_gallery_nr.' a"), options );
			}, false);
		}(window, window.Code.PhotoSwipe));</script><style>.ui-content{padding-bottom:0px;}</style>'; 
        return $return;
    }
    
    add_shortcode('item', 'item_func');
    function item_func($atts2, $content2){
    	$fout='';
        $title='';
        $sourceimg='';
        if(isset($atts2['title']))$title=$atts2['title'];
        if(isset($atts2['source']))$sourceimg=$atts2['source'];
        if(isset($atts2['big_image'])) $big_image=$atts2['big_image']; else $big_image=$sourceimg;
		$fout.='<li><a href="'.$big_image.'" rel="external"><img src="'.$sourceimg.'" alt="'.$title.'" /></a></li>';
        return $fout;
    }

add_shortcode('icons_group', 'icons_group');
  function icons_group($atts, $content) {
        $func_output = '';
		$number='';
		$inset="yes";
	 if(isset ($atts['inset'])) $inset=$atts['inset'];
	 
		$text=do_shortcode($content);
		
        if(isset($atts['number'])) $number = $atts['number'];
		if($inset!="yes")
        $func_output='</div><div class="ui-footer ui-bar-a" role="contentinfo"><div data-role="navbar" class="custom-icons"><ul>';
		else
		$func_output='<div class="ui-footer ui-bar-a" role="contentinfo"><div data-role="navbar" class="custom-icons"><ul>';
		$func_output.=$text;
		$func_output.='</ul></div></div>';
		if($inset!="yes") $func_output.='<div data-role="content" style="padding:0 !important;">';
		return $func_output;
	}
add_shortcode('content', 'content_group');
  function content_group($atts, $content) {
        $func_output = '';
        $func_output='<div data-role="content">';
		$func_output.=do_shortcode($content);
		$func_output.='</div>';
		return $func_output;
	}
	
    
 add_shortcode('icon', 'icon_func');
    function icon_func($atts, $content2) {
        $output = '';
        $url= '';
		$style='pencil';
		$theme="b";
		$text=$content2;
		$ajax="false";
		
        if(isset($atts['style'])) $style = $atts['style'];
		if(isset($atts['link'])) $url = $atts['link'];
		if(isset ($atts['ajax'])) $ajax=$atts['ajax'];
    
         $output='<li><a href="'.$url.'" data-icon="custom" data-theme="'.$theme.'" id="'.$style.'" data-ajax="'.$ajax.'" >'.$content2.'</a></li>';
		
		return $output;
	}
	 add_shortcode('single_icon', 'single_icon');
	 function single_icon($atts, $content2) {
        $output = '';
        $url= '';
		$style='pencil';
		$theme="b";
		$text=$content2;
		$ajax="false";
		
        if(isset($atts['style'])) $style = $atts['style'];
		if(isset($atts['link'])) $url = $atts['link'];
	if(isset ($atts['ajax'])) $ajax=$atts['ajax'];
	
    $output.='<div data-role="navbar" class="custom-icons"><ul><li><a href="'.$url.'" data-icon="custom" data-theme="'.$theme.'" id="'.$style.'" data-ajax="'.$ajax.'" >'.$text.'</a></li></ul></div>';	
		return $output;
	}
	 
function tw_shortcode($atts, $content = null, $code) {
$search='#wordpress';
$subject='Today for #wordpress';
$title='Twitter Live';
$type='profile';
$width='auto';
$height='400';
$interval ='3000';
$setuser ='beantowndesign';
$rpp='10';
$scrollbar='false';
$loop='false';
$live='false';

$bg_col='#353434';
$link_col='#2489CE';
	
	if(isset($atts['width']))$width=$atts['width'];
	if(isset($atts['height']))$height=$atts['height'];
	if(isset($atts['interval']))$interval=$atts['interval']*1000;
	if(isset($atts['user']))$setuser=$atts['user'];
	if(isset($atts['tweets_nr']))$rpp=$atts['tweets_nr'];
	if(isset($atts['scrollbar'])&& $atts['scrollbar']=="yes")$scrollbar='true';else $scrollbar='false';
	if(isset($atts['loop'])&& $atts['loop']=="yes")$loop='true';else $loop='false';
	if(isset($atts['live'])&& $atts['live']=="yes")$live='true';else $live='false';
	if(isset($atts['background_color']))$bg_col=$atts['background_color'];
	if(isset($atts['link_color']))$link_col=$atts['link_color'];
	
	$output = '';	
	$output .= "<script>
	new TWTR.Widget({
	  version: 2,\n";
	$output .= "	  type: '".$type."',\n";
	if( $type == 'search' ){
		$output .= "	  search: '".$search."',\n";
	} else {
		$output .= "	  rpp: ".$rpp.",\n";
	}
	$output .= "	  interval: ".$interval.",\n";
	$output .= "	  width: '".$width."',\n";
	$output .= "	  height: ".$height.",\n";
	
	if( $type != 'profile' ){
		$output .= "	  title: '".$title."',\n";
		$output .= "	  subject: '".$subject."',\n";
	}

	$output .= "  	  theme: {
      	    shell: {\n";
	$output .= "	      background: '".$bg_col."',\n";
	$output .= "	      color:  '#ffffff'\n";
	$output .= "      	    },
      	    tweets: {\n";
	$output .= "	      background: '".$bg_col."',\n";
	$output .= "	      color: '#ffffff',\n";
	$output .= "	      links: '".$link_col."' \n";
	$output .= "      	    }
      	  },
      	    features: {\n";
	$output .= "	      scrollbar: ".$scrollbar.",\n";
	$output .= "	      loop: ".$loop.",\n";
	$output .= "	      live: ".$live.",\n";
	$output .= "	      behavior: 'default' \n";
	$output .= "      	    }\n";
	if( $type != 'search' ){
		$output .= "	  }).render().setUser('".$setuser."').start();\n";
	} else {
		$output .= "	  }).render().start();\n";
	}
	
$output .= "</script>\n";
	
	return $output;

}
add_shortcode('twitter_feed', 'tw_shortcode');

add_shortcode('event_list', 'event_list_func');
function event_list_func($atts,$content) {
	 $func_output='';
	 $inset="no";
	 $search="yes";
	 if(isset ($atts['inset'])) $inset=$atts['inset'];
	 if(isset ($atts['search'])) $search=$atts['search'];
      $func_output.='<div class="padd">
    <div class="events-list">';
	$func_output.='<ul class="ui-listview" data-role="listview"  ';
	if($search=="yes")
	$func_output.=' data-filter-theme="d" data-filter-placeholder="Search..." data-filter="true"';
	if($inset!="no")
	$func_output.=' data-inset="true"';
	$func_output.=' >';
    $func_output.=do_shortcode(strip_tags($content));
	$func_output.='</ul>
	</div>
    </div>';
	  return $func_output;
}
	
add_shortcode('event', 'event_func');
function event_func($atts) {
	 $foutput='';
	 $title='';
	 $divider="no";
	 $desc1='';
	 $desc2='';
	 $date='';
	 $url='';
	 $evnr='';
	 if(isset ($atts['title'])) $title=$atts['title'];
	 if(isset ($atts['url'])) $url=$atts['url'];
	 if(isset ($atts['divider'])) $divider=$atts['divider'];
	 if(isset ($atts['events_number'])) $evnr=$atts['events_number'];
	 if(isset ($atts['description_line1'])) $desc1=$atts['description_line1'];
	 if(isset ($atts['description_line2'])) $desc2=$atts['description_line2'];
	 if(isset ($atts['date'])) $date=$atts['date'];
	 $ajax="false";
	 if(isset ($atts['ajax'])) $ajax=$atts['ajax'];
	 if($divider=="no")
	 $foutput='<li class="ui-btn-icon-right ui-li-has-arrow"><div class="ui-btn-inner ui-li" aria-hidden="true"><div class="ui-btn-text"><a class="ui-link-inherit" href="'.$url.'" data-ajax="'.$ajax.'" ><p class="ui-li-aside ui-li-desc" >'.$date.'</p><h3 class="ui-li-heading">'.$title.'</h3><p class="ui-li-desc"><strong>'.$desc1.'</strong></p><p class="ui-li-desc">'.$desc2.'</p></a></div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div></li>';
else{
	if($evnr!='')
	$foutput='<li data-role="list-divider">'.$title.'<span class="ui-li-count">'.$evnr.'</span></li>';
	else
	$foutput='<li data-role="list-divider">'.$title.'</li>';
}
	
        
	  return $foutput;
}
add_shortcode('numbered_list', 'numbered_list_func');
function numbered_list_func($atts,$content) {
	 $func_output='';
	 $inset="no";
	 $search="yes";
	 if(isset ($atts['inset'])) $inset=$atts['inset'];
	 if(isset ($atts['search'])) $search=$atts['search'];
      $func_output.='<div class="padd">';
	$func_output.='<ol class="ui-listview" data-role="listview"  ';
	if($search=="yes")$func_output.=' data-filter-theme="d" data-filter-placeholder="Search..." data-filter="true"';
	if($inset!="no")$func_output.=' data-inset="true"';
	$func_output.=' >';
    $func_output.=do_shortcode($content);
	$func_output.='</ol>
	</div>';
	  return $func_output;
}
	   add_shortcode('element', 'element_func');
    function element_func($atts2, $content2){
    	$fout='';
        $title='';
        $url='';
		$transition='';
	  $divider="no";
	 if(isset ($atts['divider'])) $divider=$atts['divider'];
        if(isset($atts2['title']))$title=$atts2['title'];
        if(isset($atts2['url']))$url=$atts2['url'];
        if(isset($atts2['transition'])) $transition=$atts2['transition']; 
		$ajax="false";
	if(isset ($atts['ajax'])) $ajax=$atts['ajax'];
	
        if($divider=='no'){
        	if($transition!='')
        	$fout.='<li><a href="'.$url.'"' ;
			else
			$fout.='<li><a href="'.$url.'"  data-ajax="'.$ajax.'"' ;	
		if($transition!='')$fout.=' data-transition="'.$transition.'"';
		$fout.='>'.$title.'</a></li>';}
       else
	   $fout.='<li data-role="list-divider" role="heading">'.$title.'</li>';
        return $fout;
    }
	
add_shortcode('thumbnail_list', 'thumbnail_list_func');
function thumbnail_list_func($atts,$content) {
	 $func_output='';
	 $inset="no";
	 $search="yes";
	
	 if(isset ($atts['inset'])) $inset=$atts['inset'];
	 if(isset ($atts['search'])) $search=$atts['search'];
      $func_output.='<div class="padd"><div class="thumbnail-list">';
	$func_output.='<ul class="ui-listview" data-role="listview"  ';
	if($search=="yes")
	$func_output.=' data-filter-theme="d" data-filter-placeholder="Search..." data-filter="true"';
	if($inset!="no")
	$func_output.=' data-inset="true"';
	$func_output.=' >';
    $func_output.=do_shortcode(strip_tags($content));
	$func_output.='</ul>
	</div>
    </div>';	
    
	  return $func_output;
}
	   add_shortcode('thumb', 'thumb_func');
    function thumb_func($atts2, $content2){
    
    	$fout='';
        $title='';
        $url='';
		$img_source='';
		$transition='';
		$desc='';
		$target="";
		$class="ui-li-thumb";
		$style="";
		if(isset($atts2['crop_image']) && $atts2['crop_image']=="yes"){$class="blog_crop";$style="display:none;";}
		if(isset($atts2['target'])) $target=$atts2['target'];
        if(isset($atts2['title']))$title=$atts2['title'];
        if(isset($atts2['description']))$desc=$atts2['description'];
        if(isset($atts2['img_url']))$img_source=$atts2['img_url'];
        if(isset($atts2['url']))$url=$atts2['url'];
        if(isset($atts2['transition'])) $transition=$atts2['transition']; 
		$ajax="false";
	if(isset ($atts['ajax'])) $ajax=$atts['ajax'];

        $fout.='<li class="ui-btn-icon-right"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a target="'.$target.'" class="ui-link-inherit" href="'.$url.'"';
		if($transition!='')$fout.=' data-transition="'.$transition.'"';else $fout.=' data-ajax="'.$ajax.'" ';
		$fout.='>';
		if($class=="blog_crop")
		$fout.='<div class="ui-li-thumb"><img class="'.$class.'" src="'.$img_source.'" style="'.$style.'"/></div>';
		else
		$fout.='<img class="'.$class.'" src="'.$img_source.'" style="'.$style.'"/>';

		$fout.='<h3 class="ui-li-heading">'.$title.'</h3><p class="ui-li-desc">'.$desc.'</p>';
		$fout.='</a></div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div></li>';
		
        return $fout;
    }



      
$fialovy_panel_nr = 10;
add_shortcode('panel', 'panel_func');
function panel_func($atts, $content) {
	 global $fialovy_panel_nr;
	$fialovy_panel_nr++;
    $func_output='';
	$title='';
	$icon='bars';
	$close='Close Panel';
	$display_close="yes";
	$position='left';  //right
	$display='reveal'; //pop //overlay
	$padding='yes'; //pop //overlay
	
	if(isset($atts['title']))$title=$atts['title'];
	if(isset($atts['icon']))$icon=$atts['icon'];
	if(isset($atts['close_btn_text']))$close=$atts['close_btn_text'];
	if(isset($atts['display_close']))$display_close=$atts['display_close'];
	if(isset($atts['position']))$position=$atts['position'];
	if(isset($atts['display']))$display=$atts['display'];
	if(isset($atts['padding']))$padding=$atts['padding'];
	 if($padding=="no") $func_output.='<style>#panel-'.$fialovy_panel_nr.' .padd{padding:0px !important}</style>';
    $func_output.='<div data-role="panel" class="out-of-padd" id="panel-'.$fialovy_panel_nr.'" data-display="'.$display.'"  data-position="'.$position.'">';
    $func_output.='<div class="content-padd"';
    if($padding=="no")$func_output.=' style="padding:0px !important"';
    $func_output.='>';
	$func_output.=do_shortcode($content);
	$func_output.='</div>';
	if($display_close=="yes")
	
    $func_output.='<div class="content-padd"><a href="#close" data-role="button" data-icon="delete" data-rel="close">'.$close.'</a></div>';
	//if($padding=="yes")
	
	$func_output.='</div>';
	
   $func_output.='<a href="#panel-'.$fialovy_panel_nr.'" data-role="button" data-icon="'.$icon.'">'.$title.'</a>';
    return $func_output;
}	