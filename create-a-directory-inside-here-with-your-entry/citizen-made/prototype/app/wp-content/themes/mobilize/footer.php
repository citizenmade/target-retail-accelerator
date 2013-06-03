<?php 
/**
 * @package WordPress
 * @subpackage Mobilize
 * @since Mobilize 1.0
 */
?>
 <!-- footer -->
 <?php 
$idds= get_option('page_for_posts'); 
$meta3= get_post_meta($idds, 'dbt_checkbox3', TRUE ); //echo ""$meta3;
$meta2 = get_post_meta( get_the_ID(), 'dbt_checkbox3', TRUE );
 if($meta2!="on" && $meta3!="on"){
 $meta1 = get_post_meta( get_the_ID(), 'dbt_checkbox2', TRUE );
 $meta4 = get_post_meta( $idds, 'dbt_checkbox2', TRUE ); //echo$meta4;  
 if($meta1=="on" || $meta4=="on") {?>
	<div data-role="footer" data-position="fixed"><?php } else { ?>
	<div data-role="footer">
		<?php } ?>
		<div data-role="navbar" class="custom-icons" >
			<ul><?php $hide1=get_option_tree('hide1','', false);if($hide1[0]!="on"){$icon1=get_option_tree('footer_icon1','', false);$name1=get_option_tree('footer_name1','', false);$link1=get_option_tree('footer_link1','', false); ?>
				<li><a data-ajax="false"  href="<?php echo $link1; ?>" id="<?php echo $icon1; ?>" data-icon="custom" data-theme="b"><?php _e($name1,"mobilize"); ?></a></li><?php } ?>
				<?php $hide2=get_option_tree('hide2','', false);if($hide2[0]!="on"){$icon2=get_option_tree('footer_icon2','', false);$name2=get_option_tree('footer_name2','', false);$link2=get_option_tree('footer_link2','', false); ?>
				<li><a  data-ajax="false" href="<?php echo $link2; ?>" id="<?php echo $icon2; ?>" data-icon="custom" data-theme="b"><?php _e($name2,"mobilize"); ?></a></li><?php } ?>
				<?php $hide3=get_option_tree('hide3','', false);if($hide3[0]!="on"){$icon3=get_option_tree('footer_icon3','', false);$name3=get_option_tree('footer_name3','', false);$link3=get_option_tree('footer_link3','', false); ?>
				<li><a  data-ajax="false" href="<?php echo $link3; ?>" id="<?php echo $icon3; ?>" data-icon="custom" data-theme="b"><?php _e($name3,"mobilize"); ?></a></li><?php } ?>
				<?php $hide4=get_option_tree('hide4','', false);if($hide4[0]!="on"){$icon4=get_option_tree('footer_icon4','', false);$name4=get_option_tree('footer_name4','', false);$link4=get_option_tree('footer_link4','', false); ?>
				<li><a data-ajax="false" href="<?php echo $link4; ?>" id="<?php echo $icon4; ?>" data-icon="custom" data-theme="b"><?php _e($name4,"mobilize"); ?></a></li><?php } ?>
			</ul>
		</div>
	</div>
	<!-- /footer -->
	<?php } ?>
</div><!-- /page -->
<?php  if(get_option_tree('hide_slider','', false)!="on"){
	     $loader="pie";
		 $navhov="false";
		 $nav="false";
		 $cols=6;
		 $rows=8;
		 $loader="bar";
		 $effect="random";
		 $easing="linear";
		 $portrait="false";
		 $time=700;
		 $trans=1500;
		$swidth='';$height='';
	if(get_option_tree('loader','', false)!="")$loader=get_option_tree('loader','', false);
	$nuvi=get_option_tree('navigation','', false,true);
	if($nuvi[0]=="on")$nav=true;
	$nuvi2=get_option_tree('navigationHover','', false,true);
	if($nuvi2[0]=="on"){$navhov=true;$nav=true;}
	if(get_option_tree('effect','', false)!="")$effect=get_option_tree('effect','', false);
	if(get_option_tree('easing','', false)!="")$easing=get_option_tree('easing','', false);
	if(get_option_tree('cols','', false)!="")$cols=get_option_tree('cols','', false);
	if(get_option_tree('rows','', false)!="")$rows=get_option_tree('rows','', false);
	if(get_option_tree('portrait','', false)!="")$portrait=get_option_tree('portrait','', false);
	if(get_option_tree('time','', false)!="")$time=get_option_tree('time','', false);
	if(get_option_tree('trans','', false)!="")$trans=get_option_tree('trans','', false);
	if(get_option_tree('slider_width', false)!="")$swidth=get_option_tree('slider_width','', false)."px";
	if(get_option_tree('slider_height', false)!="")$sheight=get_option_tree('slider_height','', false)."px";

	if($swidth!='' && $sheight!=''){	?>
	<style>.slider-container{max-width:<?php echo $swidth;?>;margin-bottom:-20px;
				height:<?php echo $sheight;?>;}</style>
				<script>
		jQuery(function(){
			jQuery('#camera_wrap').camera({	
				width:"<?php echo $swidth; ?>",
				height:"<?php echo $sheight; ?>",
				loader				: "<?php echo $loader; ?>",
				navigation			: <?php echo $nav; ?>,
				navigationHover		: <?php echo $navhov; ?>,	
				fx					: "<?php echo $effect; ?>",
				easing				: "<?php echo $easing; ?>",
				cols				: <?php echo $cols; ?>,
				rows				: <?php echo $rows; ?>,
				portrait			: <?php echo $portrait; ?>,
				time				: <?php echo $time; ?>,
				transPeriod			: <?php echo $trans; ?>
			});
		});
	</script>
  <?php } else {?>
	<script>
		jQuery(function(){
			jQuery('#camera_wrap').camera({	

				loader				: "<?php echo $loader; ?>",
				navigation			: <?php echo $nav; ?>,
				navigationHover		: <?php echo $navhov; ?>,	
				fx					: "<?php echo $effect; ?>",
				easing				: "<?php echo $easing; ?>",
				cols				: <?php echo $cols; ?>,
				rows				: <?php echo $rows; ?>,
				portrait			: <?php echo $portrait; ?>,
				time				: <?php echo $time; ?>,
				transPeriod			: <?php echo $trans; ?>
			});
		});
	</script>
	<?php } ?>
	<!-- /slider -->
<?php } ?>	
<?php
$bubble=get_option_tree('bubble_hide', '',false, true);

 if(isset($bubble[0]) && $bubble[0]!='on') {?>
<!-- add to homepage bubble on iphone, ipad  -->
<script type="text/javascript">
	if ('standalone' in navigator && !navigator.standalone && (/iphone|ipod|ipad/gi).test(navigator.platform) && (/Safari/i).test(navigator.appVersion)) {
	//	document.write('<link rel="stylesheet" href="'+window.theme_url+'assets\/add-bubble\/style\/ad2home.css">');
	//	document.write('<script type="application\/javascript" src="'+window.theme_url+'assets\/add-bubble\/src\/add2home.js" charset="utf-8"><\/s' + 'cript>');
		//	wp_enqueue_script('bubble', THEME_URL . 'assets/add-bubble/src/add2home.js');
		//	wp_enqueue_style('bubble', THEME_URL . 'assets/add-bubble/style/add2home.css');
	}
</script>  
<?php } 

?>                       
<?php  wp_footer(); ?>
  </body>
</html>