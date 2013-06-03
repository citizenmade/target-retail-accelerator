<?php 

require( '../../../../../wp-load.php' );

$user_id=$_POST["id"];
$title=$_POST["title"];

addToLB($user_id, $title);

?>