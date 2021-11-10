<?

	$sections_id = array();
	$res = CIBLockElement::GetList(array(), array("IBLOCK_ID" => 9, "PROPERTY_SUPPLIER" => $arResult["ID"], "ACTIVE" => "Y", "!SECTION_ID" => false), false, false, array("IBLOCK_SECTION_ID"));
	While($arItem = $res->Fetch()) {
		if(!(in_array($arItem["IBLOCK_SECTION_ID"], $sections_id))) {
			$sections_id[] = $arItem["IBLOCK_SECTION_ID"];
		}
	}
	
	
	$arSections = array();
	if(count($sections_id)) {
		$sec = CIBlockSection::GetList(array(), array("IBLOCK_ID" => 9, "ID" => $sections_id, "ACTIVE" => "Y"), true, array());
		while($arItem = $sec->GetNext()) {
			$arSections[] = $arItem;
		}
	}
	$arResult["PRODUCTS_SECTIONS"] = $arSections; 