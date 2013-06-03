<?php 
/**
 * @package WordPress
 * @subpackage Mobilize
 * @since Mobilize 1.0
 */
get_header(); 
?>

	<div data-role="content" id="wrapper" class="scroll-y">
   
    <div class="content-padd">
	  	<!--<h2 class="pageTitle"><span><?php wp_title(''); ?></span></h2>-->
    	
 <?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
                               
						 the_content(); 
						 wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'Mobilize' ), 'after' => '</div>' ) ); 

				// comments_template( '', true ); 

 endwhile; // end of the loop. ?>

<style>
#footer{
	display: none;
}
</style>
<div class="clear"></div>
</div></div>
<?php 
 	get_footer(); ?>
