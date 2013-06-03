<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <link rel="icon" href="<?php get_option_tree('favico', '', true); ?>"/>
    <link rel="apple-touch-icon" href="<?php get_option_tree('phoneicon', '', true); ?>"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="apple-touch-startup-image" href="/wp-content/themes/custom/assets/images/splash5.png"/>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'mobilize' ), max( $paged, $page ) );

	?></title>
   
   <?php 
   	$animationIn="drop";$animationOut="drop";$startDelay=2000;$lifespan=5000;$bottomOffset= 14;$expire=8;$message=""; $disableLoading="false";	$touchIcon=true;$arrow=true;$iterations=100;
	if(get_option_tree('bubble_animin', '', false))$animationIn=get_option_tree('bubble_animin', '', false);
	if(get_option_tree('bubble_animout', '', false))$animationOut=get_option_tree('bubble_animout', '', false);
	if(get_option_tree('bubble_delay', '', false))$startDelay=get_option_tree('bubble_delay', '', false);
	if(get_option_tree('bubble_lifespan', '', false))$lifespan=get_option_tree('bubble_lifespan', '', false);
	if(get_option_tree('bubble_bottom', '', false))$bottomOffset=get_option_tree('bubble_bottom', '', false);
	if(get_option_tree('bubble_expire', '', false))$expire=get_option_tree('bubble_expire', '', false);
	if(get_option_tree('bubble_dispload', '', false)=="yes")$disableLoading="true";else $disableLoading="false";
	if(get_option_tree('bubble_icon', '', false)=="yes")$touchIcon="true";else $touchIcon="false";
	if(get_option_tree('bubble_arrow', '', false)=="yes")$arrow="true";else $arrow="false";
	if(get_option_tree('bubble_iterations', '', false))$iterations=get_option_tree('bubble_iterations', '', false);
   ?>
<script type="text/javascript">
        if (window.screen.height==568) { // iPhone 4"
        document.querySelector("meta[name=viewport]").content="width=320.1";
        }
        window.theme_url = "<?php echo home_url('/');?>";
    	window.animationIn="<?php echo $animationIn; ?>";window.animationOut="<?php echo $animationOut; ?>";window.startDelay=<?php echo $startDelay; ?>;window.lifespan=<?php echo $lifespan; ?>;window.bottomOffset= <?php echo $bottomOffset; ?>;window.expire=<?php echo $expire; ?>;window.disableLoading=<?php echo $disableLoading; ?>;window.touchIcon=<?php echo $touchIcon; ?>;	window.arrow=<?php echo $arrow; ?>;window.iterations=<?php echo $iterations; ?>;
</script>

	<?php  wp_get_archives('type=monthly&format=link');
	
if(get_option_tree('bg_image', '', false)!='') {?><style>body, .ui-body-c, .ui-overlay-c{background-image:url("<?php get_option_tree('bg_image', '', true); ?>") !important;}</style><?php } ?>
<?php $bg_width=get_option_tree('bg_image_w', '', false);$bgheight=get_option_tree('bg_image_h', '', false); if($bg_width!='' && $bgheight!=''){?><style>body, .ui-body-c, .ui-overlay-c{background-size:<?php echo $bg_width;?>px <?php echo $bgheight; ?>px !important;}</style><?php } ?>
<?php $bg_rep=get_option_tree('bg_image_r', '', false);$bg_pos=get_option_tree('bg_image_p', '', false); ?>
<?php if($bg_rep!=''){?><style>body, .ui-body-c, .ui-overlay-c{background-repeat:<?php echo $bg_rep;?> !important;}</style><?php } ?>
<?php if($bg_pos!=''){?><style>body, .ui-body-c, .ui-overlay-c{background-position:<?php echo $bg_pos;?> !important;}</style><?php } ?>
<?php if(get_option_tree('body_font_select')) {?><link href="http://fonts.googleapis.com/css?family=<?php get_option_tree('body_font_select', '', true);?>" rel="stylesheet" type="text/css" />  <?php } ?>
<?php if(get_option_tree('menu_font_select')) {?> <link href="http://fonts.googleapis.com/css?family=<?php get_option_tree('menu_font_select', '', true);?>" rel="stylesheet" type="text/css" />   <?php } ?>
<?php if(get_option_tree('h1_font_select')) {?> <link href="http://fonts.googleapis.com/css?family=<?php get_option_tree('h1_font_select', '', true);?>" rel="stylesheet" type="text/css" />   <?php } ?>
<?php if(get_option_tree('h2_font_select')) {?> <link href="http://fonts.googleapis.com/css?family=<?php get_option_tree('h2_font_select', '', true);?>" rel="stylesheet" type="text/css" />   <?php } ?>
<?php if(get_option_tree('h3_font_select')) {?> <link href="http://fonts.googleapis.com/css?family=<?php get_option_tree('h3_font_select', '', true);?>" rel="stylesheet" type="text/css" />   <?php } ?>
<?php if(get_option_tree('h4_font_select')) {?> <link href="http://fonts.googleapis.com/css?family=<?php get_option_tree('h4_font_select', '', true);?>" rel="stylesheet" type="text/css" />   <?php } ?>
<?php if(get_option_tree('h5_font_select')) {?> <link href="http://fonts.googleapis.com/css?family=<?php get_option_tree('h5_font_select', '', true);?>" rel="stylesheet" type="text/css" />   <?php } ?>
<?php if(get_option_tree('h6_font_select')) {?> <link href="http://fonts.googleapis.com/css?family=<?php get_option_tree('h6_font_select', '', true);?>" rel="stylesheet" type="text/css" />   <?php } ?>
<?php if(get_option_tree('slider_font_select')) {?> <link href="http://fonts.googleapis.com/css?family=<?php get_option_tree('slider_font_select', '', true);?>" rel="stylesheet" type="text/css" />   <?php } ?>
<?php if(get_option_tree('phead_font_select')) {?> <link href="http://fonts.googleapis.com/css?family=<?php get_option_tree('phead_font_select', '', true);?>" rel="stylesheet" type="text/css" />   <?php } ?>

<style type="text/css">body,.ui-body-c{<?php if(get_option_tree('body_font_select', '', false)){ ?>font-family:"<?php get_option_tree('body_font_select', '', true); ?>" ,Helvetica, Arial, sans-serif !important;<?php } ?>font-weight:<?php get_option_tree('body_font_weight_select', '', true);?>;
<?php $ceva12=get_option_tree('body_font_style_select'); if($ceva12[0]=="italic") echo "font-style:italic;"; ?><?php $ceva=get_option_tree('body_font_shadow');if($ceva[0]=="disable") echo "text-shadow:none !important;"; ?>}</style>
<style type="text/css">.menu a.ui-link-inherit,.custom-menu li a,.ui-listview li a{<?php if(get_option_tree('menu_font_select', '', false)){ ?>font-family:"<?php get_option_tree('menu_font_select', '', true); ?>" ,Helvetica, Arial, sans-serif !important;<?php } ?> font-weight:<?php get_option_tree('menu_font_weight_select', '', true);?>;
<?php $ceva22=get_option_tree('menu_font_style_select'); if($ceva22[0]=="italic") echo "font-style:italic;"; else echo "font-style:normal;"; ?>}</style>
<style type="text/css">h1{<?php if(get_option_tree('h1_font_select', '', false)){ ?>font-family:"<?php get_option_tree('h1_font_select', '', true); ?>", Helvetica, Arial, sans-serif !important;<?php } ?>font-weight:<?php get_option_tree('h1_font_weight_select', '', true);?>;<?php $ceva2=get_option_tree('h1_font_style_select'); if($ceva2[0]=="italic") echo "font-style:italic;"; ?>}</style>
<style type="text/css">h2{<?php if(get_option_tree('h2_font_select', '', false)){ ?>font-family:"<?php get_option_tree('h2_font_select', '', true); ?>", Helvetica, Arial, sans-serif !important;<?php } ?>font-weight:<?php get_option_tree('h2_font_weight_select', '', true);?>;<?php $ceva3=get_option_tree('h2_font_style_select'); if($ceva3[0]=="italic") echo "font-style:italic;"; ?>}</style>
<style type="text/css">h3{<?php if(get_option_tree('h3_font_select', '', false)){ ?>font-family:"<?php get_option_tree('h3_font_select', '', true); ?>", Helvetica, Arial, sans-serif !important;<?php } ?>font-weight:<?php get_option_tree('h3_font_weight_select', '', true);?>;<?php $ceva4=get_option_tree('h3_font_style_select'); if($ceva4[0]=="italic") echo "font-style:italic;"; ?>}</style>
<style type="text/css">h4{<?php if(get_option_tree('h4_font_select', '', false)){ ?>font-family:"<?php get_option_tree('h4_font_select', '', true); ?>", Helvetica, Arial, sans-serif !important;<?php } ?>font-weight:<?php get_option_tree('h4_font_weight_select', '', true);?>;<?php $ceva5=get_option_tree('h4_font_style_select'); if($ceva5[0]=="italic") echo "font-style:italic;"; ?>}</style>
<style type="text/css">h5{<?php if(get_option_tree('h5_font_select', '', false)){ ?>font-family:"<?php get_option_tree('h5_font_select', '', true); ?>", Helvetica, Arial, sans-serif !important;<?php } ?>font-weight:<?php get_option_tree('h5_font_weight_select', '', true);?>;<?php $ceva6=get_option_tree('h5_font_style_select'); if($ceva6[0]=="italic") echo "font-style:italic;"; ?>}</style>
<style type="text/css">h6{<?php if(get_option_tree('h6_font_select', '', false)){ ?>font-family:"<?php get_option_tree('h6_font_select', '', true); ?>", Helvetica, Arial, sans-serif !important;<?php } ?>font-weight:<?php get_option_tree('h6_font_weight_select', '', true);?>;<?php $ceva7=get_option_tree('h6_font_style_select'); if($ceva7[0]=="italic") echo "font-style:italic;"; ?>}</style>
<style type="text/css">.camera_caption>div{<?php if(get_option_tree('slider_font_select', '', false)){ ?>font-family:"<?php get_option_tree('slider_font_select', '', true); ?>", Helvetica, Arial, sans-serif !important;<?php } ?>font-weight:<?php get_option_tree('slider_font_weight_select', '', true);?>;<?php  $ceva8=get_option_tree('slider_font_style_select'); if($ceva8[0]=="italic") echo "font-style:italic;"; ?>}</style>
<style type="text/css">h2.pageTitle{<?php if(get_option_tree('phead_font_select', '', false)){ ?>font-family:"<?php get_option_tree('phead_font_select', '', true); ?>", Helvetica, Arial, sans-serif !important;<?php } ?>font-weight:<?php get_option_tree('phead_font_weight_select', '', true);?>;<?php $ceva9=get_option_tree('phead_font_style_select'); if($ceva9[0]=="italic") echo "font-style:italic;"; ?>;<?php $ceva1=get_option_tree('phead_font_shadow');if($ceva1[0]=="disable") echo "text-shadow:none !important;"; ?>}</style>



<?php if(get_option_tree('extra_css')!='')echo '<style>'.get_option_tree('extra_css').'</style>'?>

<?php $themee=get_option_tree('theme_skin', '', false);
if($themee=="Custom"){$col1=get_option_tree('theme_body_color', '', false);	$gridd=get_option_tree('theme_grid', '', false);	$gridd1=get_option_tree('theme_grid2', '', false);	$col2=get_option_tree('theme_color_1', '', false);	$col3=get_option_tree('theme_color_2', '', false);	$col4=get_option_tree('theme_color_3', '', false);	$col5=get_option_tree('theme_color_4', '', false); $col6=get_option_tree('phead_color', '', false);$col7=get_option_tree('phead_bgcolor', '', false);$col8=get_option_tree('pshead_bgcolor', '', false); $col9=get_option_tree('theme_body_bgcolor', '', false); ?>
<style>  h2.pageTitle{color:<?php echo $col6; ?> !important;}
.ui-footer li span.ui-btn-text {background-color:#111111 !important;}.ui-btn-up-b,.ui-footer li span.ui-btn-text{color:#fff;}.ui-btn-inner{border:none;}
.ui-body-c, .ui-body-c input, .ui-body-c select, .ui-body-c textarea, .ui-body-c button,.ui-dialog.ui-overlay-c {color:<?php echo $col1; ?>!important;}
.ui-btn-up-c a.ui-link-inherit,.ui-btn-active a.ui-link-inherit,.thumbnail-list a.ui-link-inherit, 
.events-list ul.ui-listview a.ui-link-inherit,.ui-btn-hover-b ,.ui-btn-hover-b a.ui-link-inherit,.ui-btn-up-c{color:<?php echo $col2; ?> !important;}	
a.ui-link-inherit:hover,.ui-btn-hover-c,.ui-btn-down-c,.ui-btn-active,a.ui-link-inherit:hover{color:<?php echo $col3; ?>!important;}	
.ui-btn-up-c,h2.pageTitle,li .ui-btn-text,.ui-btn-up-c,h2.pageTitle  {background-color:<?php echo $col4; ?>!important;}
.ui-btn-hover-c,a.ui-link-inherit:hover,.ui-btn-hover-b,.ui-footer li:hover span.ui-btn-text{background-color:<?php echo $col5; ?>!important;}	
<?php if($gridd!="on"){?> li .ui-btn-text,.ui-dialog{background-image:none !important;}
<?php } ?><?php if($gridd1!="on"){?> h2.pageTitle,.page-header,.ui-btn-up-b 	{background-image:none !important;}<?php } ?>
li.ui-li-divider{background: -moz-linear-gradient(top,  <?php echo $col2; ?> 0%, <?php echo $col3; ?> 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $col2; ?>), color-stop(100%,<?php echo $col3; ?>));background: -webkit-linear-gradient(top,  <?php echo $col2; ?> 0%,<?php echo $col3; ?> 100%);background: -o-linear-gradient(top,  <?php echo $col2; ?> 0%,<?php echo $col3; ?> 100%);background: -ms-linear-gradient(top,  <?php echo $col2; ?> 0%,<?php echo $col3; ?> 100%);background: linear-gradient(top,  <?php echo $col2; ?> 0%,<?php echo $col3; ?> 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $col2; ?>', endColorstr='<?php echo $col3; ?>',GradientType=0 );
background-color:<?php echo $col2; ?>!important;}
.ui-btn-up-c{border-color:<?php echo $col5; ?>}.ui-btn-hover-c{border-color:<?php echo $col4; ?>}
ul.children li{padding:0px;border-top:1px solid #111;}
ul#commentlist>li{border-bottom:2px solid #111;	}
li.commentlist,li.comment{background:none repeat scroll 0 0 <?php echo $col4; ?>;}
.page-header.ui-header{background:<?php echo $col7;?> !important;}
.slider-outer,.bannerContainer{background:<?php echo $col8;?> !important;}
.ui-body-c{background:<?php echo $col9;?>  !important;}
</style>
<?php } ?>


<?php wp_head();?>

<script type="text/javascript">
    function trygoogle() {
     setTimeout(function() {
     // if pic2shop not installed yet, go to App Store
     window.location = "http://itunes.com/apps/pic2shop";
    }, 25);
    // launch pic2shop and tell it to open Google Products with scan result
    window.location="pic2shop://scan?callback=http%3A//target.citizenmade.co/scan?q%3DEAN";
    }
</script>

<script type="text/javascript">
function BlockMove(event) { event.preventDefault(); }
</script>


<style type="text/css" media="all">@import url( <?php bloginfo('stylesheet_url'); ?> );</style>

<script src="/wp-content/themes/custom/assets/js/accordion-menu.js"></script>

<script type="text/javascript" src="/wp-content/themes/custom/assets/js/sliding-menu.js"></script>  
<script type="text/javascript" src="/wp-content/themes/custom/assets/js/scroll-city.js"></script>
<script type="text/javascript" src="/wp-content/themes/custom/assets/js/ajax.js"></script>  


</head>
<body onload="loaded()" <?php body_class(); ?>> 

<div id="menu" style="display: none; overflow: scroll" class="scroll-y">
	<form method="get" id="searchform" class="top-search" action="<?php bloginfo('home'); ?>/">
		<div>
			<input type="text" name="s" id="s" value="" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
		</div>
	</form>
	<div id="nestedAccordion">
		<h2>Women</h2>
			<div>
				<h3>Summer</h3>
					<div>
						<a data-ajax="false" href="/lookbook?q=18">Living in the 90s</a>
					</div>
				<h3>Fall</h3>
					<div>
						<a data-ajax="false" href="/lookbook?q=1">Labworks Date Night</a>
					</div>
			</div>
		<h2>Men</h2>
			<div>
				<h3>Summer</h3>
					<div>
						<a data-ajax="false" href="/lookbook?q=26">Men's Book</a>
					</div>
			</div>
		<h2>Children</h2>
			<div>
				<h3>Babies</h3>
					<div>
						<a data-ajax="false" href="/lookbook?q=22">Mini Me</a>
					</div>
			</div>
		<h2>Home</h2>
			<div>
				<h3>Interiors</h3>
					<div>
						<a data-ajax="false" href="/lookbook?q=20">Modern Gatsby</a>
					</div>
				<h3>Garden</h3>
					<div>
						<a data-ajax="false" href="/lookbook?q=21">Love is Green</a>
					</div>
			</div>
		<h2>Recreation</h2>
			<div>
				<h3>Sporting</h3>
					<div>
						<a data-ajax="false" href="/lookbook?q=19">Move It!</a>
						<a data-ajax="false" href="/lookbook?q=23">Total Workout</a>
					</div>
			</div>
	</div>
</div>
 <?php
 if( get_option( 'show_on_front' ) == 'page' ) $page_id=get_option('page_for_posts' ) ;
  $meta5 = get_post_meta( get_the_ID(), 'dbt_checkbox3', TRUE );
 $meta2 = get_post_meta( $page_id, 'dbt_checkbox3', TRUE );
  $lurl=get_home_url();
  if(get_option_tree("logo_url",'',false))
$lurl=get_option_tree("logo_url",'',false);
 if($meta2!="on" && $meta5!="on"){
 	 if (is_front_page()) { ?>
<div id="home-page" data-role="page" class="pages">
	    <!-- header -->
	<div data-role="header" data-position="fixed" class="page-header">
		    <a href="#" data-icon="menu-icon" data-iconpos="notext" class="ui-icon-menu-icon showMenu">Menu</a>
        	<div class="logo remove-slide">
        	<a href="<?php echo $lurl; ?>" data-ajax="false"><img src="/wp-content/themes/custom/assets/images/nav-icons/target-logo-w.png" width="<?php get_option_tree("logo_w",'',true); ?>" height="<?php get_option_tree("logo_h",'',true); ?>" /></a>
        </div>
    	<a href="/cart" data-icon="cart" data-iconpos="notext" rel="external" class="ui-btn-right ui-icon-cart remove-slide">Cart</a>
	</div>
    <!--/header --> 
    <?php }else {?> 
<div id="home-page" data-role="page" class="pages">
 <!-- header -->
	<div data-role="header" data-position="fixed" class="page-header" >
    	<a href="<?php echo home_url('/'); ?>" data-icon="left-arrow" data-iconpos="notext" data-direction="reverse" data-rel="back" class="ui-icon-left-arrow">Back</a>

      <div class="logo remove-slide">
        	<a href="<?php echo $lurl;?>" data-ajax="false"><img src="/wp-content/themes/custom/assets/images/nav-icons/target-logo-w.png" width="<?php get_option_tree("logo_w",'',true); ?>" height="<?php get_option_tree("logo_h",'',true); ?>" /></a>
        </div>
    	<a href="/cart" data-icon="cart" data-iconpos="notext" rel="external" class="ui-btn-right ui-icon-cart remove-slide">Cart</a>
	</div>
	
    <!--/header -->
    <?php }} ?>
    