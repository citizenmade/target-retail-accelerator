<?php 

require( '../../../../../wp-load.php' );

$lookbook=$_GET["lb"];
$item=$_GET["i"];

addToLB($lookbook, $item);

$lbURL = "/lookbook?q=" . $lookbook;
wp_redirect($lbURL); 
exit;

?>