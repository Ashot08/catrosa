<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(count($arResult["ITEMS"])):?>
<div class="b-catalog"><!-- CATALOG -->

	<?foreach($arResult["ITEMS"] as $cell=>$arElement):
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		//debugmessage($arElement["PRICES"]["BASE"]["PRINT_DISCOUNT_VALUE"]);
		?>
		
		<div class="catalog-item <?if(($cell+1)%3==0) echo "no-margin";?>">
            <div class="item-image">
                <a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
					<?if($arElement["DETAIL_PICTURE"]["SRC"]):?>
						<img src="<?=MakeImage($arElement["DETAIL_PICTURE"]["SRC"], array("w" => 224,"h" => 183))?>" alt="">
					<?else:?>
						<img src="/img/catrosa_default_image.jpg" alt="">
					<?endif;?>
				</a>
            </div>
            <div class="item-basket">
                <?if($arElement["PRICES"]["BASE"]["VALUE"]):?>
					<a data-href="<?=$arElement["ADD_URL"]?>" class="basketAdd" href="<?=$arElement["ADD_URL"]?>"><div class="basket-icon <?if($arElement["QUANTITY_ORDER"]) echo "active";?>"></div></a>
					<div class="basket-line"></div>
					<div class="bPrice"> <?=$arElement["PRICES"]["BASE"]["PRINT_DISCOUNT_VALUE"]?> </div>
					 <div class="basket-input">
						<input type="text" name="" disabled="disabled" value="1">
						<div class="icon-left"></div>
						<div class="icon-right"></div>
						<div class="icon-plus"></div>
						<div class="icon-minus"></div>
					</div>
					<br/>
					
				<?else:?>
					<div class="basket-icon" style="background: none;"></div>
					<div class="basket-line"></div>
				<?endif;?>
				<?if($arElement["CATALOG_QUANTITY"] > 0):?>						
					<span> есть на складе </span>
				<?else:?>
					<span> нет на складе </span>
				<?endif?>
            </div>
            <div class="item-caption"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?><?if($arElement["PROPERTIES"]["ARTNUMBER"]["VALUE"]) echo ", ".$arElement["PROPERTIES"]["ARTNUMBER"]["VALUE"];?></a></div>
            <div class="item-text"><?=$arElement["PREVIEW_TEXT"]?></div>
            <div class="catalog-item-bg-top"></div>
            <div class="catalog-item-bg"></div>
            <div class="catalog-item-bg-bottom"></div>
        </div>
		
		<?endforeach;?>
	<div class="clear"></div>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

<?else:?>
	<h2 style="padding: 140px 0px; text-align: center;">нет результатов по вашему запросу</h2>
<?endif;?>