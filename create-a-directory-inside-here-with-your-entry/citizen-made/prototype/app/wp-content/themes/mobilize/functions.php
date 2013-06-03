<?php
if ( ! isset( $content_width ) ) $content_width = 300;
define('THEME_URL',  get_template_directory_uri() . '/');
$theme_path =  get_template_directory_uri() . '/';
$theme_url =  get_template_directory_uri() . '/';

require get_template_directory() . '/option-tree/index.php';

require get_template_directory() . '/assets/shortcodes/shortcodes_main.php';

add_action('admin_head', 'mobi_admin_head');
function mobi_admin_head() {

    echo '<script>window.theme_url = "' . THEME_URL . '";	</script>';
}


add_action('init', 'mobilize_init');

function mobilize_init() {
    global $theme_path;

      $arr=is_login_page();

    if (is_admin()) {
        wp_enqueue_script('thickbox');
        wp_enqueue_script('media-upload');
 wp_enqueue_script('jquery');
 wp_enqueue_style('adm',THEME_URL . 'assets/css/admin.css');
 wp_enqueue_script('admi',THEME_URL . 'assets/js/admin.js');
    } else {
     wp_deregister_script('jquery');
     wp_register_script('jquery','http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');
	 wp_enqueue_script('jquery');

		wp_enqueue_style('css','http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.css');
        wp_enqueue_style('portfolio',THEME_URL .'assets/portfolio/photoswipe.css');
		
	if($arr==0)
wp_enqueue_script('jsmobile', THEME_URL . 'assets/js/jquery.mobile-1.3.0.min.js');
	
     //	  wp_enqueue_script('screen', THEME_URL . 'assets/js/screen.min.js');
	 wp_enqueue_script('screen', THEME_URL . 'assets/js/screen.js');
		wp_enqueue_script('twitter', THEME_URL . 'assets/js/widget.js');
		wp_enqueue_script('port', THEME_URL . 'assets/portfolio/lib/klass.min.js');
		wp_enqueue_script('code', THEME_URL . 'assets/portfolio/code.photoswipe.jquery-3.0.5.min.js');
		
	 if(get_option_tree('bubble_hide', '', false)!='on') {
		wp_enqueue_script('code2', THEME_URL .'assets/add-bubble/src/add2home.js');
		wp_enqueue_style('code3', THEME_URL .'assets/add-bubble/style/add2home.css');
		
	 }


	     $theme=get_option_tree('theme_skin', '', false);
		if($theme=='Agency')wp_enqueue_style('style1', THEME_URL . 'assets/css/style1.css');
		elseif($theme=='Fashion')wp_enqueue_style('style1', THEME_URL . 'assets/css/style4.css');
		elseif($theme=='Real Estate')wp_enqueue_style('style1', THEME_URL . 'assets/css/style3.css');
		elseif($theme=='Restaurant')wp_enqueue_style('style1', THEME_URL . 'assets/css/style2.css');
		else wp_enqueue_style('style5', THEME_URL . 'assets/css/style5.min.css');


    }
//remove_filter ('the_content',  'wpautop');
//remove_filter ('comment_text', 'wpautop');
} 

add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain('mobilize', get_template_directory() . '/languages');
}
function well_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case '' :
                ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>" <?php jqmobile_ui('comment');?>>
                    <div class="comment-container" id="comment-<?php comment_ID(); ?>">
                     <?php
						$avatar_size = 80;
					echo get_avatar( $comment, $avatar_size );
					?>
					<div class="ui-li-heading">			
					<p class="ui-li-aside ui-li-desc" ><?php comment_date('Y-m-d') ;echo ", "; comment_time(); ?></p>
					<h3 class="ui-li-heading"><?php echo $comment->comment_author ?></h3>
					<div class="ui-li-desc"><?php comment_text(); ?></div>

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'jquerymobile' ); ?></em>
					<br />
				<?php endif; ?>

                  <div class="reply readon">
                    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                        </div><!-- .reply -->

	</div><!-- .comment-author .vcard -->
	
    </div>
                    <?php
                    break;
                case 'pingback' :
                case 'trackback' :
                    ?>
                <li class="post pingback">
                    <p><?php _e('Pingback:', 'well'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', 'well'), ' '); ?></p>
                    <?php
                    break;
            endswitch;
        }

function jqmobile_ui($key = '') {

	$data = jqmobile_get_ui($key);
	if ($data) {
		_e( 'data-theme="'.$data.'"',"mobilize");
	}
}
function jqmobile_get_ui($key = '') {
	static $ui_options;

	if (!is_array($ui_options)) {
		$options = jqmobile_get_theme_options();
		$ui_options = $options['ui'];
	}
	return isset($ui_options[$key]) ? $ui_options[$key] : '';
}
function jqmobile_get_theme_options() {;
	return get_option( 'jqmobile_theme_options', jqmobile_get_default_theme_options() );
}
function jqmobile_get_default_theme_options() {
	$default_theme_options = array(
		'color_scheme' => 'default',
		'mobile_layout' => 'content-sidebar',
		'ui' => array()
	);

	return apply_filters( 'jqmobile_default_theme_options', $default_theme_options );
}
$prefix = 'dbt_';

$meta_box = array(
	'id' => 'stdio-box',
	'title' => 'Page Settings',
	'page' => 'page',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => 'Hide title from page',
			'id' => $prefix . 'checkbox',
			'type' => 'checkbox'
		),
		array(
			'name' => 'Sticky footer (fixed)',
			'id' => $prefix . 'checkbox2',
			'type' => 'checkbox'
		),
		array(
			'name' => 'Modal Window (display just content witout header & footer)',
			'id' => $prefix . 'checkbox3',
			'type' => 'checkbox'
		),
		array(
			'name' => 'Slider Imges',
			'id' => $prefix . 'bgsliderimgs',
			'type' => 'textblockupload'
		)
	)
); 


add_action('admin_menu', 'mobi_add_box');
function theme_queue_js(){
  if (!is_admin()){
    if (!is_page() AND is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
  }
}
add_action('get_header', 'theme_queue_js');
// Add meta box
function mobi_add_box() {
	global $meta_box;
	
	add_meta_box($meta_box['id'], $meta_box['title'], 'mobi_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}
function transform($text){
	$fout='';
	if($text!=' '){
	$fout=str_replace ('", "', "</span><span> ", $text);
	$fout=substr_replace($fout, '</span>', -3, -1);
	$fout=substr_replace($fout, '<span>', 0, 2);
	}
	return $fout;
}
// Callback function to show fields in meta box
function mobi_show_box() {
	global $meta_box, $post;
?><script>jQuery(document).ready(function() { 
	  jQuery('.flv_upload_slide').click(function() {
     	 window.upl_target3 = jQuery(this).prev().prev();
            tb_show('', 'media-upload.php?post_id=<?php _e($post->ID); ?>&type=image&amp;TB_iframe=1');
       window.send_to_editor = function(html) { 
	imgurl=window.upl_target3.val();
	imgurl += '"'+jQuery(html).attr('href')+'", ';  
	
window.upl_target3.val(imgurl);
window.upl_target3.trigger("change");
add_change(jQuery(html).attr('href'));
 tb_remove();
  window.send_to_editor = orig_send_to_editor;}
         return false;
     });  
  });</script>
<?php
	// Use nonce for verification
	echo '<input type="hidden" name="mobi_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	
	echo '<table class="form-table">';

	foreach ($meta_box['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		
		echo '<tr>',
				'<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>';
		switch ($field['type']) {
			case 'checkbox':
				echo '<td><input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' /></td>';
				break;
			case 'textblockupload': if($meta=='')$meta=" ";
				echo '<td><textarea style="display:none" name="', $field['id'], '" id="', $field['id'], '">'.$meta.'</textarea><div id="my_special_div"  >'.transform($meta).'</div><button class="flv_upload_slide button">Upload</button></td>';
				break;
		}
		echo'</tr>';
	}
	
	echo '</table>';
}

add_action('save_post', 'mobi_save_data');

// Save data from meta box
function mobi_save_data($post_id) {
	global $meta_box;
	
	// verify nonce
	if (!wp_verify_nonce($_POST['mobi_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	
	foreach ($meta_box['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
} 
function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}
register_nav_menu( 'primary', __( 'Primary Menu', 'mobilize' ) );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 70, 70 );
 add_theme_support( 'automatic-feed-links' );



/**
* register_sidebar()
*
*@desc Registers the markup to display in and around a widget
*/
if ( function_exists('register_sidebar') )
{
  register_sidebar(array(
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '',
    'after_title' => '',
  ));
}

function get_excerpt($idd){
	$excerpt = get_the_excerpt();
	if($excerpt!='')
	$aut=$excerpt;
	else {
	$content = get_the_content();
	$aut=$content;
	}
	return $aut;
}

add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
	add_meta_box( 'my-meta-box-id', 'Post - Featured Movie', 'cd_meta_box_cb', 'post', 'normal', 'high' );
}

function cd_meta_box_cb( $post )
{
	$values = get_post_custom( $post->ID );
	$text = isset( $values['my_meta_box_text'] ) ? esc_attr( $values['my_meta_box_text'][0] ) : '';
	$selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

?>

<div class="my_meta_control">
	<br/>

	<label for="my_meta_box_select">
		<p>Adding a movie here will override the featured image. Leave empty if you don't want to display a featured movie.</p></label>
	<table cellpadding="0" cellspacing="5" style="width:100%">
		<tr>
			<td style="width:10%">Movie type:</td>
			<td>
			<select name="my_meta_box_select" id="my_meta_box_select" style="width:100px;">
				<option value="vimeo" <?php selected($selected, 'vimeo'); ?>>Vimeo</option>
				<option value="youtube" <?php selected($selected, 'youtube'); ?>>Youtube</option>
			</select></td>
			<br/>
		</tr>
		<tr>
			<label for="my_meta_box_text"><td style="width:10%">Id of video:</td> </label>
			<td>
			<input class="textinput upload" style="width:30%;" type="text" id="my_meta_box_text" name="my_meta_box_text" value="<?php _e($text,"mobilize"); ?>" />
			</td>
		</tr>
	</table>
</div>

<?php
}

add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id )
{
// Bail if we're doing an auto save
if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

// if our nonce isn't there, or we can't verify it, bail
if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

// if our current user can't edit this post, bail
if( !current_user_can( 'edit_post' ) ) return;

// now we can actually save the data
$allowed = array(
'a' => array( // on allow a tags
'href' => array() // and those anchords can only have href attribute
)
);

// Probably a good idea to make sure your data is set
if( isset( $_POST['my_meta_box_text'] ) )
update_post_meta( $post_id, 'my_meta_box_text', wp_kses( $_POST['my_meta_box_text'], $allowed ) );

if( isset( $_POST['my_meta_box_select'] ) )
update_post_meta( $post_id, 'my_meta_box_select', esc_attr( $_POST['my_meta_box_select'] ) );

// This is purely my personal preference for saving checkboxes
$chk = ( isset( $_POST['my_meta_box_check'] ) && $_POST['my_meta_box_check'] ) ? 'on' : 'off';
update_post_meta( $post_id, 'my_meta_box_check', $chk );
}
if(!function_exists('getPageContent'))
{
function getPageContent($pageId)
{
if(!is_numeric($pageId))
{
return;
}

global $wpdb;
$sql_query = 'SELECT DISTINCT * FROM ' . $wpdb->posts .
' WHERE ' . $wpdb->posts . '.ID=' . $pageId;
$posts = $wpdb->get_results($sql_query);

if(!empty($posts))
{
foreach($posts as $post)
{
return nl2br($post->post_content);
}
}
}
}

function others()
{
dynamic_sidebar( $index );
language_attributes();
add_theme_support( 'custom-header', $args );
add_theme_support( 'custom-background', $args );
add_editor_style();
posts_nav_link();
previous_posts_link();
the_post_thumbnail();
}
function flv_pagination()
{

$range=0;
$showitems = ($range * 2)+1;

global $paged;
if(empty($paged)) $paged = 1;
global $wp_query;
 $pages = $wp_query->max_num_pages;
if($pages == '')
{

if(!$pages)
{
$pages = 1;
}
}
if(1 != $pages)
{
if(get_option_tree('show_inset','', false)=="on")
echo "<div class='pagination'  data-role='controlgroup' style='margin:-15px 15px 15px 15px;'>";
else
echo "<div class='pagination'  data-role='controlgroup' >";

if($paged > 1 && $showitems < $pages)
_e("<a href='".get_pagenum_link($paged - 1)."' data-role='button' data-icon='arrow-u' data-ajax='false' >Newer Posts</a>","mobilize");
if ($paged < $pages && $showitems < $pages)
_e("<a href=\"".get_pagenum_link($paged + 1)."\" data-role='button' data-icon='arrow-d' data-ajax='false'>Older Posts</a>","mobilize");
echo "</div>\n";
}

}
function generate_excerpt($content,$length){

if(strlen($content)>intval($length)){
$excerpt=substr(strip_tags($content), 0, intval($length));
$excerpt.="  [...]" ;
}
else
$excerpt=strip_tags($content);
_e($excerpt,"mobilize");
}
function cropImage($source_image, $target_image, $crop_area)
{
    // detect source image type from extension
    $source_file_name = basename($source_image);
    $source_image_type = substr($source_file_name, -3, 3);
    
    // create an image resource from the source image  
    switch(strtolower($source_image_type))
    {
        case 'jpg':
            $original_image = imagecreatefromjpeg($source_image);
            break;
            
        case 'gif':
            $original_image = imagecreatefromgif($source_image);
            break;

        case 'png':
            $original_image = imagecreatefrompng($source_image);
            break;    
        
        default:
            trigger_error('cropImage(): Invalid source image type', E_USER_ERROR);
            return false;
    }
    
    // create a blank image having the same width and height as the crop area
    // this will be our cropped image
    $cropped_image = imagecreatetruecolor($crop_area['width'], $crop_area['height']);
    
    // copy the crop area from the source image to the blank image created above
    imagecopy($cropped_image, $original_image, 0, 0, $crop_area['left'], $crop_area['top'], 
              $crop_area['width'], $crop_area['height']);
 	
    // detect target image type from extension
    $target_file_name = basename($target_image);
    $target_image_type = substr($target_file_name, -3, 3);
    
    // save the cropped image to disk
    switch(strtolower($target_image_type))
    {
        case 'jpg':
            imagejpeg($cropped_image, $target_image, 100);
            
        case 'gif':
            imagegif($cropped_image, $target_image);
            break;

        case 'png':
            imagepng($cropped_image, $target_image, 0);
            break;    
        
        default:
            trigger_error('cropImage(): Invalid target image type', E_USER_ERROR);
            imagedestroy($cropped_image);
            imagedestroy($original_image);
            return false;
    }
    
    // free resources
    imagedestroy($cropped_image);
    imagedestroy($original_image);
    
    return true;
}
	?>
