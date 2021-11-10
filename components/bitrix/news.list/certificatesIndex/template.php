<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	
	?>
	<a  href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="fancybox" rel="group"> <img style="padding: 0px 10px 10px 10px; " src="<?=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"], array("w" => 150))?>"> </a>
				
<?endforeach;?>
	


            
          