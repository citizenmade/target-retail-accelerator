 <?php 
/**
 * @package WordPress
 * @subpackage Mobilize
 * @since Mobilize 1.0
 */
?>
<?php
  get_header();
?>
  
<?php $sw2=get_option_tree('hide_slider','', false);
 if( isset($sw2) ){?>
    <div class="slider-outer" style="display:none;">
    	<?php } else { ?>
    <div class="slider-outer">
    	<?php } ?>	
    	
      	<div class="slider-container">
			<div id="camera_wrap">
				

            
     	
		</div>
	</div><!-- /slider -->  
 </div>
	<div class="shadow1box">
		<img src="<?php echo THEME_URL; ?>assets/images/shadow1.png" class="shadow1" alt="shadow">
	</div>  	
 	<div data-role="content" id="wrapper" class="scroll-y"> 
 	<div class="content-padd">   
	
 		
 		
 	 <?php
  class description_walker extends Walker_Nav_Menu
{ public $i=0;
    function start_el(&$output, $item, $depth=0, $args=array()) {
    	global $i;
    	
		 if($i==0)
		 $output.='<ul data-role="listview"  data-inset="true" id="listview" class="ui-listview">';
    	 $attributes  = ' ';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url) .'"' : '';

           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }  
        $output.="<li>"; 
		$trans='';
		if(get_option_tree("choose_menu_transition"))$trans=get_option_tree("choose_menu_transition");
		if($trans!='')
		$output .= '<a'. $attributes .'  class="ui-link-inherit"  data-transition="'.$trans.'">';
		else {
			if(get_option_tree("choose_menu_ajax")=="true")
		$output .= '<a'. $attributes .'  data-ajax="true">';
			else 
		$output .= '<a'. $attributes .'  data-ajax="false">';
				}
            $output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
            $output .= $description.$args->link_after;
            $output .= '</a>'; 
            
            $i++;
    }  
    function end_el(&$output, $item, $depth=0, $args=array()) {
  
        $output .= "</li>\n";  
		
    }  

}

$walker=new description_walker();

$menuid=get_nav_menu_locations(); 
$menuname=(get_option_tree('choose_menu','', false));

if($menuname!='')
wp_nav_menu( array('menu'=>$menuname,'container' =>'div', 'echo' => true, 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' =>1, 'walker' => $walker ));	             
else{
if($menuid["primary"]==0)
//_e("<p style='text-align:center;font-weight:bold;'>Please go to 'Appearance=>Menus' and set the primary menu in 'Theme Locations' section</p>","mobilize");
wp_nav_menu( array( 'menu'=>'','container' =>'div', 'echo' => true, 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 1, 'walker' => $walker ));	             
else
wp_nav_menu( array( 'theme_location'=>'primary',  'menu'=>'','container' =>'div', 'echo' => true, 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 1, 'walker' => $walker ));	             
}		    ?> 	
        </ul>
        <?php if($menuid["primary"]!=0){ ?>
        <div class="shadow2box"><img src="<?php echo THEME_URL; ?>assets/images/shadow2.png" class="shadow2" alt="shadow"></div>
        <?php } ?>
        
		<?php
		$mobile_content=get_option_tree('choose_front_page','', false);
		if($mobile_content)
		{
			_e(do_shortcode($mobile_content)); 
		}
		else {
		     $page_id=get_option('page_on_front' ) ;
	 $ceva=getPageContent($page_id); 
	 _e(do_shortcode($ceva)); 	
		}
 ?>	
 		
 		
 		
 <?php $sw=get_option_tree('hide_social','', false);
 if( isset($sw) ){?> 
 	<div class="social hide">
    <?php } ?>	 	
      </div>    		
		</div>
 <?php
  get_footer();
?>