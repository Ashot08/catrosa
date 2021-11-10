<?
	$LAST_OBJECT = $APPLICATION->get_cookie("LAST_OBJECT");
	
	if(is_array($LAST_OBJECT) && !in_array($arResult["ID"], $LAST_OBJECT)) {
		if(count($LAST_OBJECT) < 5) {
			$APPLICATION->set_cookie("LAST_OBJECT[".count($LAST_OBJECT)."]", $arResult["ID"]);
		} else {
			$APPLICATION->set_cookie("LAST_OBJECT[0]", $LAST_OBJECT[1]);
			$APPLICATION->set_cookie("LAST_OBJECT[1]", $LAST_OBJECT[2]);
			$APPLICATION->set_cookie("LAST_OBJECT[2]", $LAST_OBJECT[3]);
			$APPLICATION->set_cookie("LAST_OBJECT[3]", $LAST_OBJECT[4]);
			$APPLICATION->set_cookie("LAST_OBJECT[4]", $arResult["ID"]);
		}
		
	} else {
		$APPLICATION->set_cookie("LAST_OBJECT[0]", $arResult["ID"]);
	}
	
				
?>
