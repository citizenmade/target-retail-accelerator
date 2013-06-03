<?php

//function admin_redirect() {
//if ( !is_user_logged_in()) {
//wp_redirect( home_url('/wp-admin/') );
//exit;
//}
//}
 
//add_action('get_header', 'admin_redirect');

/////////////////////////
//MATT CUSTOM FUNCTIONS//
/////////////////////////

//this function finds lookbooks that belong to a certain user and displays them as a drop-down

function findLookbooks($user_id){
	//get global wpdb variable
	global $wpdb;
	$lookbooks = $wpdb->get_results( "SELECT * FROM wp_books WHERE author = '$user_id'");
	foreach ( $lookbooks as $lookbook )
	{
		echo "<option value=\"" . $lookbook->id . "\">" . $lookbook->title . "</option>";
	}	

}

function homePageLB(){
	//get global wpdb variable
	global $wpdb;
	$lookbooks = $wpdb->get_results( "SELECT * FROM wp_books WHERE promoted = '1' ORDER BY list ASC");
	$count = 0;
	foreach ( $lookbooks as $lookbook )
	{
		populateLookbooks($lookbook->id);
	}	

}

function getProduct($TCIN, $border)
{
	$url = "https://api.target.com/v2/items/". $TCIN ."?IdType=TCIN&ResponseGroups=MerchantItemAttributes,Images&key=XuzQlmxDxtTQMK25j65Ut8pkWz78nGQL";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/xml','Accept: application/json'));
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$file_contents = curl_exec($ch);
	curl_close($ch);
	
	//convert to XML and parse it out
	$xml_obj = new SimpleXMLElement($file_contents);
	$error = $xml_obj->Items->Request->Errors->Error->Code;
	if ($error == "TGT.InvalidParameterValue")
	{
		echo "<div>X</div>";
	}
	else
	{
		$infoURL = $xml_obj->Items->Item[0]->DetailPageURL;
		$productName = $xml_obj->Items->Item[0]->MerchantItemAttributes->Title;
		$productImage = $xml_obj->Items->Item[0]->Images->ImageURLPattern;
		echo "<div class=\"prodImage pull-left\"";
		if ($border == 1)
			echo "style=\"border-right: 1px solid #e6e6e6\"";
		echo "><a data-ajax=\"false\" href=\"/item/?q=" . $TCIN . "\"><img src=\"" . $productImage . "\"></a></div>";
	}
	
}

function getProductName($TCIN){
	$url = "https://api.target.com/v2/items/". $TCIN ."?IdType=TCIN&ResponseGroups=MerchantItemAttributes,Images&key=XuzQlmxDxtTQMK25j65Ut8pkWz78nGQL";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/xml','Accept: application/json'));
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$file_contents = curl_exec($ch);
	curl_close($ch);
	
	//convert to XML and parse it out
	$xml_obj = new SimpleXMLElement($file_contents);
	$error = $xml_obj->Items->Request->Errors->Error->Code;
	if ($error == "TGT.InvalidParameterValue")
	{
		echo "<div>X</div>";
	}
	else
	{
		$productName = $xml_obj->Items->Item[0]->MerchantItemAttributes->Title;
		echo "<h4 class=\"relName\">Lookbooks related to \"".$productName."\"</h4>";
	}
}

function getAuthor($count, $author){
	//get global wpdb variable
	global $wpdb;
	$auth_info = $wpdb->get_row( "SELECT * FROM wp_authors WHERE id = '$author'");
	echo "<div class=\"LBauthor\"><div class=\"authorPic\"><a data-ajax=\"false\" href=\"#\"><img src=\"/wp-content/themes/custom/assets/images/".$auth_info->image.".png\"></a></div><div class=\"authorDetail\"><h4 class=\"name\">".	$auth_info->name."</h4><h4 class=\"location\">".$auth_info->city.", ".$auth_info->state."</h4><h6>".$count." items</h6></div></div><div class=\"clear\"></div>";
}

function getRelated($tcin){
	//get global wpdb variable
	global $wpdb;
	$lookbooks = $wpdb->get_results( "SELECT * FROM wp_items WHERE tcin = '$tcin'");
	getProductName($tcin);
	$count = 0;
	foreach ( $lookbooks as $lookbook )
	{
		if($count<6)
			populateLookbooks($lookbook->lb);
		$count++;
	}
}

function populateLookbooks($lookbook){
	//get global wpdb variable
	global $wpdb;
	//print title
	$lb_title = $wpdb->get_row( "SELECT * FROM wp_books WHERE id = '$lookbook'");
	$count = countItemsInLB($lookbook);
	echo "<div class=\"loadBook\">";
	getAuthor($count, $lb_title->author);
	echo "<div class=\"LBtitle\">";
	echo "<h4>\"" . $lb_title->title . "\"</h4>";
	echo "</div>";
	echo "<div class=\"LBwidget\"></div>";
	echo "<div class = \"loadBook noSwipe\" id = \"lb";
	echo $lookbook;
	echo "\"><div style=\"margin: auto; text-align: center;\"><div class=\"LBmain\">";
	echo getLookbookName($lookbook);
	echo "<img src=\"/wp-content/themes/custom/assets/images/loading.gif\"></div></div><div id = \"err";
	echo $count;
	echo "\"></div></div>";
	//print images
	echo "<script type=\"text/javascript\">$(\"#lb";
	echo $lookbook;
	echo "\").load(\"/wp-content/themes/custom/assets/php/loadLB.php?lb=";
	echo $lookbook;
	echo "\", function(response, status, xhr) {if (status == \"error\") {var msg = \"Error loading. Please refresh.\"; $(\"#err";
	echo $lookbook;
	echo "\").html(msg + xhr.status + \" \" + xhr.statusText);}});</script>";


	echo "<div class=\"popular\">
	<ul>
		<li class=\"heart\">".rand(10,300)."</li>
		<li class=\"plus\">".rand(10,300)."</li>
		<li class=\"speak\">".rand(10,300)."</li>
	</ul>
</div></div>";

}

function populateLookbooksBetter($lookbook){
		//get global wpdb variable
	global $wpdb;
	$count = countItemsInLB($lookbook);
	$splitActive = 0;
	$lbSplit = ceil($count / 2);
	$count = 0;
	$countRow = 0;
	$width = ($lbSplit * 131);
	echo "<div id=\"LBmain\" class=\"LBmain\"><div class=\"topHalf\" style=\"width:".$width."px\">";
	echo "<style type=\"text/css\"> .LBmain {width:".$width."px; max-width: 100%; margin: auto;} </style>";
	$items = $wpdb->get_results( "SELECT * FROM wp_items WHERE lb = '$lookbook'");
	foreach ( $items as $item )
	{
		$passTCIN = $item->tcin;
		if($countRow < ($lbSplit - 1))
			$border = 1;
		else
			$border = 0;
		getProduct($passTCIN, $border);
		$count++;
		$countRow++;
		if(($count >= $lbSplit) && ($splitActive == 0)){
			echo "<div class=\"clear\"></div></div><div class=\"bottomHalf\" style=\"width:".$width."px\">";
			$splitActive = 1;
			$countRow = 0;
		}
	}	
	echo "<div class=\"clear\"></div></div><div class=\"clear\"></div>";
	echo "</div>";
}

function getLookbookName($lookbook){
	//get global wpdb variable
	global $wpdb;
	//print title
	$lb_title = $wpdb->get_row( "SELECT * FROM wp_books WHERE id = '$lookbook'");
	echo "<h3>Loading lookbook \"" . $lb_title->title . "\"...</h3>";
}

//makes sure an item isn't already in this lookbook before adding it
function checkItem($lookbook, $item){
	global $wpdb;
	$items = $wpdb->get_results( "SELECT * FROM wp_items WHERE lb = '$lookbook' AND tcin = '$item'");
    $count = 0;
	foreach ( $items as $item )
	{
		$count++;
	}
	return $count;
}

//makes sure the lookbook doesn't already exist
function checkLB($user_id, $title){
	global $wpdb;
	$items = $wpdb->get_results( "SELECT * FROM wp_books WHERE author = '$user_id' AND title = '$title'");
    $count = 0;
	foreach ( $items as $item )
	{
		$count++;
	}
	return $count;
}

//count items in a lookbook
function countItemsInLB($lookbook){
	global $wpdb;
	$items = $wpdb->get_results( "SELECT * FROM wp_items WHERE lb = '$lookbook'");
    $count = 0;
	foreach ( $items as $item )
	{
		$count++;
	}
	return $count;
}

function addToLB($lookbook, $item){
	global $wpdb;
	if(checkItem($lookbook, $item) < 1)
	{
		$query = "INSERT INTO wp_items (tcin, lb) VALUES ('".$item."', '".$lookbook."')";
		$wpdb->query($query); 
	}
}

function createLB($user_id, $title){
	global $wpdb;
	$query = "INSERT INTO wp_books (author, title) VALUES ('".$user_id."', '".$title."')";
	$wpdb->query($query); 
}

function createAndAdd($user_id, $title, $TCIN){
	global $wpdb;
	if(checkLB($user_id, $title) < 1)
	{
		//create the new LB
		$query = "INSERT INTO wp_books (author, title) VALUES ('".$user_id."', '".$title."')";
		$wpdb->query($query);
		//get the ID of the LB
		$lb = $wpdb->get_row( "SELECT * FROM wp_books WHERE author = '$user_id' AND title = '$title'");
		$lb_id = $lb->id;
		//insert the item into the new lookbook
		addToLB($lb_id, $TCIN);
	}
	return $lb_id;
	
}

function hideComments(){
	echo "<style media=\"all\" type=\"text/css\">";
    echo "#disqus_thread{display: none;}";
    echo "</style>";
}


?>