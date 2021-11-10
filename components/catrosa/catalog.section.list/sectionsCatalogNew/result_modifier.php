<?
	foreach($arResult["SECTIONS"] as $key => $arSection) {
		if($arSection["CODE"] == $_REQUEST["SECTION_CODE"]){
			$arResult["SECTIONS"][$key]["SELECTED"] = true;
			
		} else {
			foreach($arSection["SUBSECTIONS"] as $subSection) {
				if($subSection["CODE"] == $_REQUEST["SECTION_CODE"]){
					$arResult["SECTIONS"][$key]["SELECTED"] = true;
				}
			}
		}
	}