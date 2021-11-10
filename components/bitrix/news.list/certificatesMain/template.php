<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="b-certificate"><!-- CERTIFICATE -->
    <div class="caption"><?=$arParams["CAPTION"]?></div>
	<div class="certificate-image">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	
	$ArImage = imageConverter::resize($arItem["PREVIEW_PICTURE"]["SRC"], 78, 119);
	
	?>
	<a href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="fancybox"  rel="group"><img src="<?=$ArImage["SRC"];?>" alt=""></a>
			
<?endforeach;?>
		<div class="clear"></div>
    </div>
	<a href="/certificates/" class="link">Все сертификаты</a>
</div><!-- CERTIFICATE END -->



            
            
              
            
          
            
          