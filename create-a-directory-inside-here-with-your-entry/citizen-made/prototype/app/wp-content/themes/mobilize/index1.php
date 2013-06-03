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
<div data-role="content"> 
    
    <!-- slider -->
    <div class="slider-outer">
    	<div class="slider-container">
			<div id="camera_wrap">
            
            <div data-src="<?php echo THEME_URL; ?>assets/images/demo/slides/1.jpg">
                <div class="camera_caption fadeFromBottom">
                    Touch Optimized Responsive Slider!
                </div>
            </div>
            
            <div data-src="<?php echo THEME_URL; ?>assets/images/demo/slides/2.jpg">
                <div class="camera_caption fadeFromBottom">
                     24 Effects, Optional Captions!
                </div>
            </div>
            
            <div data-src="<?php echo THEME_URL; ?>assets/images/demo/slides/3.jpg">
            	<div class="camera_caption fadeFromBottom">
                     &laquo; Swipe With Your Finger &raquo;
                </div>
            </div>
            
            <div data-src="<?php echo THEME_URL; ?>assets/images/demo/slides/4.jpg">
            </div>
            
     		</div>
		</div>
        <br class="clear" />
	</div><!-- /slider -->  
    
	<div class="shadow1box">
		<img src="<?php echo THEME_URL; ?>assets/images/shadow1.png" class="shadow1" alt="shadow">
	</div>
	
	<!-- main content -->
  	
  		<div class="content-padd">
  		
  		  	<hr class="ornamental"/>
  		<h3 class="home-title">Welcome to Mobilize!</h3>
	<hr class="ornamental"/>

   <?php
  class description_walker extends Walker_Nav_Menu
{ public $i=0;
    function start_el(&$output, $item, $depth=0, $args=array()) {
    	global $i;
    	
		 if($i==0)
		 $output.='<ul data-role="listview" data-inset="true" id="listview">';
    	 $attributes  = ' data-prefetch';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'/"' : '';

           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }  
        $output.="<li>".esc_attr($item->label); 
		$output .= '<a'. $attributes .'>';
            $output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $output .= $description.$args->link_after;
            $output .= '</a>'; 
            
            $i++;
    }  
    function end_el(&$output, $item, $depth=0, $args=array()) {
  
        $output .= "</li>\n";  
		
    }  

}
$walker=new description_walker();

                wp_nav_menu( array(
                'theme_location'=>'primary',
				 'container' =>false,
				 'echo' => true,
				 'before' => '',
				 'after' => '',
				 'link_before' => '',
				 'link_after' => '',
				 'depth' => 0,
				 'walker' => $walker
                                )
				 );	
                ?> 	
        </ul>
        <div class="shadow2box"><img src="<?php echo THEME_URL; ?>assets/images/shadow2.png" class="shadow2" alt="shadow"></div>
        <!-- /navigation -->  
    
		<?php
		the_content(); ?>


   <div id="social">
    <?php if(get_option_tree('sm_icons','', false)){
   	$slides = get_option_tree('sm_icons','', false, true, -1);
                                    foreach ($slides as $slide) {
                          echo '<a href="' . $slide['link'] . '"><img src="' . $slide['image'] . '" alt="' . $slide['title'] . '" /></a>';
                                    }
			}
		?>
    </div><!-- close div social-icons -->

     </div> 
  </div>



  <?php
  get_footer();
?>