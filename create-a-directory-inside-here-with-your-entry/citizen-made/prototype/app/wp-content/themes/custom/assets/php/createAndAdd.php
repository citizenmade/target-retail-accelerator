<?php 

require( '../../../../../wp-load.php' );

$user_id=$_GET["id"];
$title=$_GET["title"];
$tcin=$_GET["tcin"];

$lb_id = createAndAdd($user_id, $title, $tcin);

$lbURL = "/lookbook?q=" . $lb_id;
wp_redirect($lbURL); 
exit;

?>