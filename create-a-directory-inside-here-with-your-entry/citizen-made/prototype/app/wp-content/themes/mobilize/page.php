<?php 
/**
 * @package WordPress
 * @subpackage Mobilize
 * @since Mobilize 1.0
 */
get_header(); 
?>
<?php 
  $meta2 = get_post_meta( get_the_ID(), 'dbt_checkbox3', TRUE );
 if($meta2!="on"){
   $meta4 = get_post_meta( get_the_ID(), 'dbt_bgsliderimgs', TRUE );
	 ?>
	  <div data-role="content">
	 <?php
	 
	 if(strlen($meta4)>3){
	 	?>
	 	<div class="slider-outer">	
    	<div class="slider-container">
		<div id="camera_wrap">
    <?php 
    $meta5=str_replace('"', "", $meta4);
   	$home_slides = explode(",", $meta5);
	$last=count($home_slides)-1;
	unset($home_slides[$last]);
      foreach ($home_slides as $slideimg) {
	  echo '<div data-src="' . $slideimg . '" ></div>';
           }
		?>
     		</div>
		</div>
        <br class="clear" />
	</div>
	<?php
	 }
	 else if(has_post_thumbnail()){ ?>
	<div class="bannerContainer">
<?php
			$image_url=wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
		 	echo'<img src="'.$image_url.'" class="banner">';	
?>

    </div>
 <?php   } ?>
 
 <?php $meta = get_post_meta( get_the_ID(), 'dbt_checkbox', TRUE ); if($meta!="on"){?>
  	<h2 class="pageTitle"><span><?php wp_title(''); ?></span></h2>
	<div class="shadow1box"><img src="<?php echo THEME_URL; ?>assets/images/shadow1.png" class="shadow1" alt="shadow"></div>
<?php }} ?>
   
    <div class="content-padd">
    	
 <?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
                               
						 the_content(); 
						 wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'Mobilize' ), 'after' => '</div>' ) ); 

				// comments_template( '', true ); 

 endwhile; // end of the loop. ?>
</div></div>
<?php 
 	get_footer(); ?>
