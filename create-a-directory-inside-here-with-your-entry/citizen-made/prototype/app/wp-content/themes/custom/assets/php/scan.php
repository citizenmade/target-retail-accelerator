<?php
$current_user = wp_get_current_user();
$user_id = $current_user->ID;
$sku = 0;
$sku = $_GET['q'];
//remove leading 0
$sku = substr($sku, 1);

function getName($sku, $user_id)
{
	$url = "https://api.target.com/v2/items/". $sku ."?IdType=UPC&ResponseGroups=OfferSummary,MerchantItemAttributes,Images&key=XuzQlmxDxtTQMK25j65Ut8pkWz78nGQL";

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
		echo "We're sorry, Target does not carry that product.";
                echo "<INPUT TYPE=BUTTON OnClick=\"trygoogle();\" VALUE=\"Try Another Barcode\">";
                echo "<style media=\"all\" type=\"text/css\">";
                echo "#disqus_thread{display: none;}";
                echo "</style>";
	}
	else
	{
		$infoURL = $xml_obj->Items->Item[0]->DetailPageURL;
		$productName = $xml_obj->Items->Item[0]->MerchantItemAttributes->Title;
		$productImage = $xml_obj->Items->Item[0]->Images->ImageURLPattern;
		$productPrice = $xml_obj->Items->Item[0]->OfferSummary->LowestNewPrice->FormattedPrice;
                $TCIN = $xml_obj->Items->Item[0]->TCIN;
                echo "<div class=\"foundIt\">";
                echo "<p class=\"found1\">We found it.</p>";
                echo "<INPUT class=\"found2\" TYPE=BUTTON OnClick=\"trygoogle();\" VALUE=\"Look Again\">";
                echo "<div class=\"clear\"></div>";
                echo "</div>";
		echo "<p class=\"prodImage singleItem\"><img src=\"" . $productImage . "\"></p>";
		echo "<p><a href=\"" . $infoURL . "\">" . $productName . "</a> - ".$productPrice."</p>";

echo "<p>Add to lookbook:</p>";
echo "<form data-ajax=\"false\" action=\"/wp-content/themes/custom/assets/php/addToLB.php\" method=\"get\">";
echo "<select name=\"lb\">";
findLookbooks($user_id);
echo "</select>";
echo "<input type=\"hidden\" value=\"" .$TCIN. "\" name=\"i\" />";
echo "<input name=\"send_button\" type=\"submit\" value=\"Add\" />";
echo "</form>";
echo "<div id=\"MyResult\"></div>";
echo "<p>Create new lookbook with this item:</p>";
echo "<form data-ajax=\"false\" action=\"/wp-content/themes/custom/assets/php/createAndAdd.php\" method=\"get\">";
echo "<input type=\"text\" name=\"title\" value=\"Lookbook Name\">";
echo "<input type=\"hidden\" value=\"" .$TCIN. "\" name=\"tcin\" />";
echo "<input type=\"hidden\" value=\"" .$user_id. "\" name=\"id\" />";
echo "<input name=\"send_button\" type=\"submit\" value=\"Create And Add\" />";
echo "</form>";
echo "<div id=\"MyResult\"></div>";
echo "<div class=\"popular loneProduct\">
	<ul>
		<li class=\"heart\">".rand(10,300)."</li>
		<li class=\"plus\">".rand(10,300)."</li>
		<li class=\"speak\">".rand(10,300)."</li>
	</ul>
</div>";
	}
	
}


?>

      <p>     
	     <?php
	
	     if ($sku != 0)
			{
				//echo "The product SKU you just scanned is: " . $sku;
				$another = " Another ";
			}
	
	     ?>
	  </p>
		<?php

	     if ($sku != 0)
			{
				getName($sku, $user_id);
			}

	     ?>