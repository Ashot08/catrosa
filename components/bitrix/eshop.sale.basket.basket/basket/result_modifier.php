<?
	//debugmessage($arResult["ITEMS"]["AnDelCanBuy"]);
	$arID = array();
	foreach($arResult["ITEMS"]["AnDelCanBuy"] as $key => $arBasketItems) {
		$arID[] = $arBasketItems["PRODUCT_ID"];
	}
	
	$arResult2 = array();
	$res = CIBlockElement::GetList(array(), array("ID" => $arID), false, false, array());
	while($arItem = $res->GetNextElement()) {
		$arFields = $arItem->GetFields();
		$arFields["PROPERTIES"] = $arItem->GetProperties();
		
		$arResult2[$arFields["ID"]] = $arFields;
	}
	
	foreach($arResult["ITEMS"]["AnDelCanBuy"] as $key => $arBasketItems) {
		$arResult["ITEMS"]["AnDelCanBuy"][$key]["PROPERTIES"] = $arResult2[$arBasketItems["PRODUCT_ID"]]["PROPERTIES"];
	}