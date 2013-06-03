<?php 
/**
 * @package WordPress
 * @subpackage Mobilize
 * @since Mobilize 1.0
 */
?>
<?php  get_header(); ?>
<div class="ui-content" data-role="content"  role="main">
<?php 
if( get_option( 'show_on_front' ) == 'page' ) {
$page_id=get_option('page_for_posts' ) ;
$idds= $page_id ;
 }
$idds=get_option('page_for_posts' ) ;
$meta2 = get_post_meta($idds, 'dbt_checkbox3', TRUE );

 if($meta2!="on"){
 	$meta4 = get_post_meta($idds, 'dbt_bgsliderimgs', TRUE );	 
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
			$image_url=wp_get_attachment_url( get_post_thumbnail_id( $page_id) );
		 	echo'<img src="'.$image_url.'" class="banner">';
?>

    </div>
 <?php   } ?>
 
  <?php 
 $meta7 = get_post_meta( $idds, 'dbt_checkbox', TRUE ); if($meta7!="on"){?>
  	<h2 class="pageTitle"><span><?php wp_title(''); ?></span></h2>
	<div class="shadow1box"><img src="<?php echo THEME_URL; ?>assets/images/shadow1.png" class="shadow1" alt="shadow"></div>	
<?php }

} else {?>
	<div data-role="page">
<?php 
$ceva=getPageContent($page_id); _e($ceva,'mobilize'); ?><div data-role="content"><?php
}
?>

	<div class="content-padd">
		<?php if($meta2!="on"){ ?>
	<?php  $ceva=getPageContent($page_id); _e('<p>'.$ceva.'</p>','mobilize'); }?>
	<div class="padd">
	<div class="thumbnail-list">
<?php 
 if(get_option_tree('show_search','', false)!="on"){?>
	<?php if(get_option_tree('show_inset','', false)=="on"){ ?>
     <ul data-role="listview" data-filter-theme="d" data-inset="true">
     <?php 	} else {?>
     <ul data-role="listview" data-filter-theme="d" >
     <?php } ?>
 <?php    }else{ ?>
 	<?php if(get_option_tree('show_inset','', false)=="on"){ ?>
     <ul data-filter-placeholder="Search..." data-filter="true" data-role="listview" data-filter-theme="d" data-inset="true">
     <?php 	} else {?>
     <ul data-filter-placeholder="Search..." data-filter="true" data-role="listview" data-filter-theme="d" >
     <?php } ?>
     <?php } ?>
	<?php if ( ! have_posts() ) : ?>
	
	<li id="post-<?php the_ID(); ?>" class="ui-btn-icon-right"><div class="ui-btn-inner ui-li" aria-hidden="true">
               <div class="ui-btn-text">
		<h3 class="ui-li-heading"><?php _e('Not Found', 'studio99'); ?></h3>
       <p class="ui-li-desc"> <?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'studio99'); ?></p>
			<br/>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div> </li><!-- #post-0 -->
	<?php endif; ?>
        
	<?php while ( have_posts() ) : the_post(); ?>
		<?php 
		if(get_option_tree('blog_exce','', false)!="")
		$length=get_option_tree('blog_exce','', false);
		else
		$length=100;
		$image_url=wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
		$id = get_post_meta(get_the_ID(), 'my_meta_box_text', true);
		if($id!="")
		$image_url=THEME_URL.'assets/images/movie.png';

		 ?>
	
		<li id="post-<?php the_ID(); ?>" <?php post_class("ui-btn-icon-right"); ?>> 	
			<div class="ui-btn-inner ui-li" aria-hidden="true">
               <div class="ui-btn-text">
               	<a data-ajax="false" class="ui-link-inherit" href="<?php the_permalink() ?>">
               			<p class="ui-li-aside ui-li-desc" ><?php the_time('Y-m-d') ?></p>
               		<?php if($id!="") {?>
						<img class="ui-li-thumb" style="margin:5px 0 0 15px;" src="<?php echo $image_url; ?>" />
						<?php }else {
							if($meta2!="on"){?>
						<div class="ui-li-thumb"><img style="display:none" class="blog_crop" src="<?php echo $image_url ; ?>" /></div>
						<?php }else{?>
						<div class="ui-li-thumb"><img style="max-height:80px;max-height:80px;" src="<?php echo $image_url ; ?>" /></div>
							
						<?php }} ?>
						<h3 class="ui-li-heading"><?php the_title()?></h3>
						<p class="ui-li-desc"><?php if(!has_excerpt()) generate_excerpt(get_the_content(),$length); else echo do_shortcode(get_the_excerpt());?></p>
			</a></div> 
			<span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span>	
 		</div>
		</li>

	<?php endwhile; // End the loop. Whew. ?>


</ul></div></div></div></div>
 <?php if($meta2=="on"){ ?>
 </div> </div>
 <?php } ?>
<?php flv_pagination(); ?>

<?php get_footer(); ?>