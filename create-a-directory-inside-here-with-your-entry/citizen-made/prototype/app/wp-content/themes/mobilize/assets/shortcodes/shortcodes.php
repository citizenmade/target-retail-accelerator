<?php 

function add_simple_buttons(){ 
    wp_print_scripts( 'quicktags' );
	$output = "<script type='text/javascript'>\n
	/* <![CDATA[ */ \n";
	$buttons = array();
	
	$buttons[] = array('name' => 'one_half',
					'options' => array(
						'display_name' => 'one half',
						'open_tag' => '\n[one_half]',
						'close_tag' => '[/one_half]\n',
						'key' => ''
					));
	$buttons[] = array('name' => 'one_half_last',
					'options' => array(
						'display_name' => 'one half last',
						'open_tag' => '\n[one_half_last]',
						'close_tag' => '[/one_half_last]\n',
						'key' => ''
					));
	$buttons[] = array('name' => 'one_third',
					'options' => array(
						'display_name' => 'one third',
						'open_tag' => '\n[one_third]',
						'close_tag' => '[/one_third]\n',
						'key' => ''
					));
	$buttons[] = array('name' => 'one_third_last',
					'options' => array(
						'display_name' => 'one third last',
						'open_tag' => '\n[one_third_last]',
						'close_tag' => '[/one_third_last]\n',
						'key' => ''
					));

$buttons[] = array('name' => 'blockquote',
					'options' => array(
						'display_name' => 'Blockquote',
						'open_tag' => '\n[blockquote]',
						'close_tag' => '[/blockquote]\n',
						'key' => ''
					));
$buttons[] = array('name' => 'frame',
					'options' => array(
						'display_name' => 'Frame',
						'open_tag' => '\n[frame]',
						'close_tag' => '[/frame]\n',
						'key' => ''
					));
$buttons[] = array('name' => 'callout',
					'options' => array(
						'display_name' => 'Callout',
						'open_tag' => '\n[callout]',
						'close_tag' => '[/callout]\n',
						'key' => ''
					));
$buttons[] = array('name' => 'ornamental_title',
					'options' => array(
						'display_name' => 'Ornamental Title',
						'open_tag' => '\n[ornamental_title]Lorem ipsum dolor sit amet.[/ornamental_title]\n',
						'key' => ''
					));
$buttons[] = array('name' => 'custom_menu',
					'options' => array(
						'display_name' => 'Custom Menu',
						'open_tag' => '\n[menu title="Searchable Lists" name="custom-menu-id" transition="fade" inset="no" search="yes"]\n',
						'key' => ''
					));
$buttons[] = array('name' => 'event_list',
					'options' => array(
						'display_name' => 'Event List',
						'open_tag' => '\n[event_list inset="yes" search="no"][event title="event day" divider="yes" events_number="number_of_events"][event title="event_title" date="event_date" description_line1="event_description1" description_line2="event_description2" url="link" ][event][/event_list]\n',
						'key' => ''
					));
$buttons[] = array('name' => 'numbered_list',
					'options' => array(
						'display_name' => 'Numbered List',
						'open_tag' => '\n[numbered_list search="yes" inset="no"][element divider="yes" title="category_title"][element url="" transition="slidedown" title="name"][element url=""  title="name"][/numbered_list]\n',
						'key' => ''
					));
$buttons[] = array('name' => 'thumbnail_list',
					'options' => array(
						'display_name' => 'Thumbnail List',
						'open_tag' => '\n[thumbnail_list][thumb img_url="image_link" title="name" description="desc1" url=""][thumb img_url="image_link" title="name" description="desc2" url=""][/thumbnail_list]\n',
						'key' => ''
					));
$buttons[] = array('name' => 'icon',
					'options' => array(
						'display_name' => 'Icon',
						'open_tag' => '\n[single_icon url="" style="home"]Link[/single_icon]\n',
						'key' => ''
					));
$buttons[] = array('name' => 'icons_group',
					'options' => array(
						'display_name' => 'Icons Group ',
						'open_tag' => '\n[icons_group inset="no"][icon style="style_name" url=""]Link[/icon][icon style="style_name" url=""]Link[/icon][/icons_group]\n',
						'key' => ''
					));
$buttons[] = array('name' => 'posts_gallery',
					'options' => array(
						'display_name' => 'Posts Gallery',
						'open_tag' => '\n[posts_gallery bg_color="black" hide_description="no" bottom_description="click on images"]\n',
						'key' => ''
					));

$buttons[] = array('name' => 'gallery ',
					'options' => array(
						'display_name' => 'Image Gallery',
						'open_tag' => '\n[gallery bottom_description="click on images"][item title="image title 1" source="image_url"][item title="image title 2" source="image_url" big_image="big_image_url"][/gallery]\n',
						'key' => ''
					));
$buttons[] = array('name' => 'latest_posts',
					'options' => array(
						'display_name' => 'Latest Posts',
						'open_tag' => '\n[latest_posts number="3" search="yes"]\n',
						'key' => ''
					));
$buttons[] = array('name' => 'location_img',
					'options' => array(
						'display_name' => 'Location Image',
						'open_tag' => '\n[location_img lat="47.157254" long="27.586858" lang="en" width="300" height="200"] ',
						'key' => ''
					));
$buttons[] = array('name' => 'testimonial',
					'options' => array(
						'display_name' => 'Testimonial',
						'open_tag' => '\n[testimonial author="John Connor" bg="#CCFCF2" authorcolor="#2D7BB3" textcolor="#630E0E"]Your text here.[/testimonial]',
						'key' => ''
					));	
$buttons[] = array('name' => 'toggle',
					'options' => array(
						'display_name' => 'Toggle',
						'open_tag' => '\n[multiple_toggles][toggle title="title1" opened="yes"]content1[/toggle][toggle title=title2"]content2[/toggle][/multiple_toggles]',
						'key' => ''
					));	
$buttons[] = array('name' => 'warning',
					'options' => array(
						'display_name' => 'Warning',
						'open_tag' => '\n[warning]Attention![/warning]',
						'key' => ''
					));	
$buttons[] = array('name' => 'success',
					'options' => array(
						'display_name' => 'Success',
						'open_tag' => '\n[success]Message sent![/success]',
						'key' => ''
					));	
$buttons[] = array('name' => 'error',
					'options' => array(
						'display_name' => 'Error',
						'open_tag' => '\n[error]Please try again[/error]',
						'key' => ''
					));	
$buttons[] = array('name' => 'info',
					'options' => array(
						'display_name' => 'Info',
						'open_tag' => '\n[info]This is a info box[/info]',
						'key' => ''
					));	

$buttons[] = array('name' => 'youtube',
					'options' => array(
						'display_name' => 'Youtube',
						'open_tag' => '\n[youtube id="v6u4UNFi8RE" width="330" height="250"]',
						'key' => ''
					));		
$buttons[] = array('name' => 'vimeo',
					'options' => array(
						'display_name' => 'Vimeo',
						'open_tag' => '\n[vimeo id="17988239" width="330" height="250"]',
						'key' => ''
					));				
$buttons[] = array('name' => 'social_icons',
					'options' => array(
						'display_name' => 'Social Icons',
						'open_tag' => '\n[social_icons]',
						'key' => ''
					));						
		$buttons[] = array('name' => 'HR',
					'options' => array(
						'display_name' => 'Horizontal line',
						'open_tag' => '\n[hr]',
						'key' => ''
					));	
	$buttons[] = array('name' => 'button',
					'options' => array(
						'display_name' => 'Button',
						'open_tag' => '\n[button url="#"]A Button![/button]',
						'key' => ''
					));	
	$buttons[] = array('name' => 'twitter',
					'options' => array(
						'display_name' => 'Twitter Feed',
						'open_tag' => '\n[twitter_feed width="auto" height="400" interval="3" user="beantowndesign" tweets_nr="10" scrollbar="no" loop="no" live="no" background_color="#353434" link_color="#2489CE"]',
						'key' => ''
					));	
					
	$buttons[] = array('name' => 'contact-form',
					'options' => array(
						'display_name' => 'Contact Form',
						'open_tag' => '\n[contactform]',
						'key' => ''
					));	
$buttons[] = array('name' => 'content',
					'options' => array(
						'display_name' => 'Content',
						'open_tag' => '\n[content]',
						'close_tag' => '[/content]\n',
						'key' => ''
					));		
	
	$buttons[] = array('name' => 'clear',
					'options' => array(
						'display_name' => 'Clear',
						'open_tag' => '\n[clear]',
						'key' => ''
					));	
	$buttons[] = array('name' => 'Panel',
					'options' => array(
						'display_name' => 'Panel',
						'open_tag' => '\n[panel title="Panel Title l" display="reveal" position="left"]//panel content [/panel]',
						'key' => ''
					));					
	for ($i=0; $i <= (count($buttons)-1); $i++) {
		$output .= "edButtons[edButtons.length] = new edButton('ed_{$buttons[$i]['name']}'
			,'{$buttons[$i]['options']['display_name']}'
			,'{$buttons[$i]['options']['open_tag']}'
			,'{$buttons[$i]['options']['close_tag']}'
			,'{$buttons[$i]['options']['key']}'
		); \n";
	}
	
	$output .= "\n /* ]]> */ \n
	</script>";
	echo $output;
}


add_shortcode('one_half', 'flv_columns');
add_shortcode('one_half_last', 'flv_columns');
add_shortcode('one_third', 'flv_columns');
add_shortcode('one_third_last', 'flv_columns');
add_shortcode('one_fourth', 'flv_columns');
add_shortcode('one_fourth_last', 'flv_columns');
add_shortcode('two_third', 'flv_columns');
add_shortcode('two_third_last', 'flv_columns');
add_shortcode('three_fourth', 'flv_columns');
add_shortcode('three_fourth_last', 'flv_columns');
add_shortcode('one_fifth', 'flv_columns');
add_shortcode('one_fifth_last', 'flv_columns');
add_shortcode('two_fifth', 'flv_columns');
add_shortcode('two_fifth_last', 'flv_columns');
add_shortcode('three_fifth', 'flv_columns');
add_shortcode('three_fifth_last', 'flv_columns');
add_shortcode('four_fifth', 'flv_columns');
add_shortcode('four_fifth_last', 'flv_columns');
add_shortcode('one_sixth', 'flv_columns');
add_shortcode('one_sixth_last', 'flv_columns');
add_shortcode('five_sixth', 'flv_columns');
add_shortcode('five_sixth_last', 'flv_columns');

function flv_columns($atts, $content = null, $name='') {
	extract(shortcode_atts(array(
		"id" => '',
		"class" => ''
	), $atts));
	
	$content = flv_content_helper($content);
	
	$id = ($id <> '') ? " id='{$id}'" : '';
	$class = ($class <> '') ? " {$class}" : '';
	
	$pos = strpos($name,'_last');	

	if($pos !== false)
		$name = str_replace('_last',' last',$name);
else
	$name .=" left";
	
	$output = "<div{$id} class='{$name}{$class}'>{$content}</div>";
	if($pos !== false) 
		$output .= "<div class='clear'></div>";
	
	return $output;
}
add_shortcode('raw', 'ceva');
function ceva($atts, $content = null, $name='') {
	$content = flv_content_helper($content);
	return $content;
}
function flv_delete_htmltags($content,$paragraph_tag=false,$br_tag=false){	
	$content = preg_replace('#^<\/p>|^<br \/>|<p>$#', '', $content);
	$content = preg_replace('#<br \/>#', '', $content);
	if ( $paragraph_tag ) $content = preg_replace('#<p>|</p>#', '', $content);
	return trim($content);
}

function flv_content_helper($content,$paragraph_tag=false,$br_tag=false){
	return flv_delete_htmltags( do_shortcode(shortcode_unautop($content)), $paragraph_tag, $br_tag );
}

add_action('admin_init', 'action_admin_init');
function action_admin_init(){
	if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
		if ( in_array(basename($_SERVER['PHP_SELF']), array('post-new.php', 'page-new.php', 'post.php', 'page.php') ) ) {
			add_action('admin_head','add_simple_buttons');
		}
	}
}

