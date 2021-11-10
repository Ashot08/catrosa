<?
	if($arResult["NAME"]) {
		$APPLICATION->SetPageProperty("name", $arResult["NAME"]);
	} else {
		$APPLICATION->SetPageProperty("name", "Каталог");
	}
?>