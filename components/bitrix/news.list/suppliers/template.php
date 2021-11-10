<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="b-supplier"><!-- SUPPLIER -->

<?foreach($arResult["ITEMS"] as $key => $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	
	?>
	
	<div class="supp <?if(($key + 1) % 3 == 0) echo "no-margin";?>">
        <div class="supp-logo">
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=MakeImage($arItem["PREVIEW_PICTURE"]["SRC"], array("w" => 190, "h" => 70))?>" alt=""></a>
        </div>
		<div class="supp-green-line"></div>
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="link"><?=$arItem["NAME"]?></a>
        <p><?=$arItem["PREVIEW_TEXT"]?></p>
    </div>
			  
<?endforeach;?>
	<div class="clear"></div>
</div>



            
          