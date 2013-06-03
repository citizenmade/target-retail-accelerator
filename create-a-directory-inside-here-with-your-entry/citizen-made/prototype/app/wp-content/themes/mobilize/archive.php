<?php get_header(); ?>

<div class="ui-content" data-role="content"  role="main">
		<?php if(have_posts()) : ?>
	
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pageTitle"><span><?php _e("POSTS IN ","mobilize"); ?><?php single_cat_title(); ?></span></h2>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pageTitle"><span><?php _e("Posts Tagged ","mobilize"); ?>&#8216;<?php single_tag_title(); ?>&#8217;</span></h2>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pageTitle"><span><?php _e("Archive for ","mobilize"); ?><?php the_time('F jS, Y'); ?></span></h2>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pageTitle"><span><?php _e("Archive for ","mobilize"); ?><?php the_time('F, Y'); ?></span></h2>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pageTitle"><span><?php _e("Archive for ","mobilize"); ?><?php the_time('Y'); ?></span></h2>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pageTitle"><span><?php _e("POSTS BY ","mobilize"); ?><?php if(get_query_var('author_name')) : $curauth = get_user_by('slug', get_query_var('author_name'));else :    $curauth = get_userdata(get_query_var('author'));endif; echo $curauth->nickname; ?></span></h2>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pageTitle"><span><?php _e("Blog Archives ","mobilize"); ?></span></h2>
		<?php } ?>
			<?php endif; ?>
		
		<div class="shadow1box"><img src="<?php echo THEME_URL; ?>assets/images/shadow1.png" class="shadow1" alt="shadow"></div>
	
		
			<div class="padd content-padd">
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
     	
		<?php while(have_posts()) : the_post(); ?>
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
						<?php }else {?>
						<div class="ui-li-thumb"><img style="display:none" class="blog_crop" src="<?php echo $image_url ; ?>" /></div>
						<?php } ?>
						<h3 class="ui-li-heading"><?php the_title()?></h3>
						<p class="ui-li-desc"><?php if(!has_excerpt()) generate_excerpt(get_the_content(),$length); else the_excerpt();?></p>
			</a></div> 
			<span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span>	
 		</div>
		</li>
		
		<?php endwhile; ?>

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

	</ul></div></div></div>
<?php flv_pagination(); ?>

<?php get_footer(); ?>