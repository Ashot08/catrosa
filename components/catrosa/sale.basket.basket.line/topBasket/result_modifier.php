<?
	
	$full_price = 0;
	
	foreach($arParams["PRODUCTS_IN_CARD"] as $value) {
		$full_price = $full_price + (int)($value["PRICE"] * $value["QUANTITY"]);
	}
	
	$arResult["FULL_PRICE"] = $full_price;