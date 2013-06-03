<?php
$l_buffer=0;

$a = array(
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "seventeen" => 17
);

add_shortcode('vimeo', 'vimeo_func');
function vimeo_func($atts) {
    global $l_buffer;
    $func_output='';

    $w=400;
    if(isset($atts['width'])) $w=$atts['width'];
    
    $h=300;
    if(isset($atts['height'])) $h=$atts['height'];

    $func_output.='<iframe src="http://player.vimeo.com/video/'.$atts['id'].'" width="'.$w.'" height="'.$h.'" frameborder="0" ></iframe>';

    return $func_output;


}


add_shortcode('youtube', 'youtube_func');
function youtube_func($atts) {
   // global $l_buffer;
    $func_output='';

    $w=400;
    if(isset($atts['width'])) $w=$atts['width'];

    $h=300;
    if(isset($atts['height'])) $h=$atts['height'];

    $func_output.='<iframe width="'.$w.'" height="'.$h.'" src="http://www.youtube.com/embed/'.$atts['id'].'?rel=0" frameborder="0" allowfullscreen></iframe>';

	 return $func_output;


}


add_shortcode('video', 'video_func');
function video_func($atts) {
    $func_output='';

    $w=400;
    if(isset($atts['width'])) $w=$atts['width'];

    $h=300;
    if(isset($atts['height'])) $h=$atts['height'];

    $source=THEME_URL.'deploy/preview.swf?video='.$atts['source'];

    if(isset($atts['type'])) $source.='&types='.$atts['type'];
    if(isset($atts['audioimage'])) $source.='&audioImages='.$atts['audioimage'];

    $func_output.='<object width="'.$w.'" height="'.$h.'">
        <param name="movie" value="'.$source.'"></param>
        <param name="allowFullScreen" value="true"></param>
        <param name="allowscriptaccess" value="always"></param>
        <param name="wmode" value="opaque"></param>
        <embed src="'.$source.'" type="application/x-shockwave-flash" width="'.$w.'" height="'.$h.'" allowscriptaccess="always" allowfullscreen="true" wmode="opaque">
        </embed></object>';

    return $func_output;


}