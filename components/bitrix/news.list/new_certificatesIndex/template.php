<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="col-md-12">

    
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	
	?>

	<?if (!empty($arItem["PREVIEW_PICTURE"]["SRC"])):?>
	<div class="content-box content-box-sertificat">
	<div>
		<?/*?>
		<img src="<?//=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"], array("h" => 140))?>">
		<?*/?>
		<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" style="height: 140px;">
	</div>
	<div>
						<div>
							<div class="content-box-title"><?=$arItem["NAME"]?></div>
							<div class="content-box-text"><?=$arItem["PREVIEW_TEXT"]?></div>
						</div>
						<div class="content-box-sertificat-info-right">
							<a href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="fancybox" rel="group">смотреть</a>
							<a href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" download>скачать</a>
						</div>
					</div>
	
	</div>
	<?endif?>	
<?endforeach;?>
	
</div>

            
          