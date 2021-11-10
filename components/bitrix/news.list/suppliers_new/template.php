<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="row">
	<?foreach (array_chunk($arResult["ITEMS"], 4, true) as $key => $arItems) {?>

	<?
	//$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	//$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

	<div class="tab-box">
		<?foreach ($arItems as $key1 => $arItem1) {?>
		<?
		$text_supplier = $arItem1["DETAIL_TEXT"];
		
		//echo $text_supplier;
		$classname = "";
		switch ($key1%4) { case 0: $classname = "first"; break; case 1: $classname = "two"; break; case 2: $classname = "tree"; break; case 3: $classname = "four"; break; } ?>
		<div class="col-md-3">
			<div class="partner-box partner-box-<?=$classname?>">
				<img src="<?=CFile::ResizeImageGet($arItem1["PREVIEW_PICTURE"], Array("width" => 200, "height" => 120))['src']?>" alt="<?=$arItem1["NAME"]?>">
			</div>
		</div>
		<?}?>

		<div class="col-md-12 partner-box-text">
		<?
		//foreach (array_chunk($arResult["ITEMS"], 4, true) as $array) {
		
	   
		foreach($arItems as $key1 => $arItem1) {?>
		<div>
			<div class="col-md-8">
				<div class="title-partner"><?=$arItem1["NAME"]?></div>
				<?echo $arItem1["DETAIL_TEXT"];?>
			</div>
			<div class="col-md-4">
				<img src="<?=$arItem1["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem1["NAME"]?>" class="img-responsive center-block">
			</div>
		</div>
		<?}?>
		</div>

	</div>
	<?}?>

</div>    