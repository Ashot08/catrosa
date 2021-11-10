<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div id="mycarousel" class="b-slider-image-layer wrapper">
    <ul class="jcarousel-skin-tango">
<?foreach($arResult["ITEMS"] as $key => $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	
	?>
	
	<li>
        <a href="<?=$arItem["PREVIEW_CODE"]?>">
            <span><?=$arItem["PREVIEW_TEXT"]?></span>
            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
        </a>
    </li>
<?endforeach;?>
	</ul>
	
	<div class="b-slider-number-nav">
		<div class="separator type-1"></div>
		<?for($i = 1; $i <=  count($arResult["ITEMS"]); $i++):?>
			<div class="number" onclick="m.slider.show(<?=$i?>);">
				<span><?=$i?></span>
				<div class="icon"></div>
            </div>
            <div class="separator type-1"></div>
		<?endfor;?>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>


          
          
           
          
          
        