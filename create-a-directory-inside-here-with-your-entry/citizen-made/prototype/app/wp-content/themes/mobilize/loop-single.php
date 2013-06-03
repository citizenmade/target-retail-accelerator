<?php
/**
 * @package WordPress
 * @subpackage Mobilize
 * @since Mobilize 1.0
 */

?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<!-- banner & title -->
	<div data-role="content"> 
	<div class="bannerContainer">
		<?php 
		$tyle = get_post_meta(get_the_ID(), 'my_meta_box_select', true);
		$idd = get_post_meta(get_the_ID(), 'my_meta_box_text',true);
		
		if($idd!=''){
		if($tyle=="vimeo")
		echo '<iframe src="http://player.vimeo.com/video/'.$idd.'" width="450" height="300" frameborder="0" class="video banner generalframe"></iframe>';
		else
		echo '<iframe src="http://www.youtube.com/embed/'.$idd.'" width="450" height="300" frameborder="0" class="video banner generalframe"></iframe>';
		}
		else {
		if ( has_post_thumbnail() ) {
		// the_post_thumbnail(array(320,240));
			$image_url=wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
		 	echo'<img src="'.$image_url.'" class="banner">';	
		}
	 } ?>
		
    </div>
    
  	<h2 class="pageTitle"><span><?php wp_title(''); ?></span></h2>
	<div class="shadow1box"><img src="<?php echo THEME_URL; ?>assets/images/shadow1.png" class="shadow1" alt="shadow"></div>
	    <div  id="post-<?php the_ID(); ?>" <?php post_class('blogpost'); ?>>
	    	<div class="content-padd">
			<p class="blog_info"><?php _e("Posted ","mobilize"); ?><?php the_time('d/m/Y') ?><?php _e(" by ","mobilize"); ?><?php echo'<a data-ajax="false" href="'. get_author_posts_url(get_the_author_meta('ID')).'" >'.get_the_author().'</a>'; ?>
			<?php 
	$categories = get_the_category();$seperator = ', ';$output = '';
	if($categories){
		$i=0;
		foreach($categories as $category) {
			
			if($category->cat_name!="Uncategorized")
			{
				$i++;
			if($i==1)
			$output .= 'in ';
		$output .= '<a data-ajax="false" href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",'studio99' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$seperator;}
	}_e(trim($output, $seperator),"mobilize"); 
} 
?></p>
				    <div class="entry-content">
				    <?php the_content();?>
					</div><!-- .entry-content -->
					
            <div class="tags">
		<?php the_tags(); ?>
	    </div>  
	    
				<?php comments_template( '', true ); ?>

            	<fieldset >
			<div ><a data-icon="arrow-l" href="page-styles.html" data-role="button" data-direction="reverse"  rel="external" data-rel="back">Back</a></div>
				   
		</fieldset>	
</div><!-- #post-## -->
</div></div>	

<?php endwhile; // end of the loop. ?>

