<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//delayed function must return a string
if(empty($arResult))
	return "";

//$strReturn = '<div class="b-breadcrumbs">';
$strReturn = '';

for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
{
	if($index > 0) {}
		//$strReturn .= '<div></div>';

	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	//if($arResult[$index]["LINK"] <> "" && $arResult[$index]["LINK"] != $_SERVER["REQUEST_URI"])
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
		$strReturn .= '<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a> <span>—</span>';
	else
		$strReturn .= '<div>'.$title.'</div>';
}

//$strReturn .= '<div></div></div>';
return $strReturn;
?>