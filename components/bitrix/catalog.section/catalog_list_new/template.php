<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(count($arResult["ITEMS"])):

?>
<?foreach($arResult["ITEMS"] as $cell=>$arElement):

		//
		$arElement["PRICES"]["BASE"]["VALUE"] = 0;


		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		//debugmessage($arElement["PRICES"]["BASE"]["PRINT_DISCOUNT_VALUE"]);
		?>
				<div class="col-md-4 cataloge-box">
					<div class="img"><img src="<?=SITE_TEMPLATE_PATH?>/img/no_photo.jpg"></div>
					<div class="title"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a></div>
					<?if($arElement["PROPERTIES"]["ARTNUMBER"]["VALUE"]):?>
						<div class="art">Артикул: <?=$arElement["PROPERTIES"]["ARTNUMBER"]["VALUE"]?> </div>
					<?endif;?>
					<?if($arElement["PRICES"]["BASE"]["VALUE"] && $arElement["PRICES"]["BASE"]["VALUE"] > 0.01):?>
					<div class="price">
						<div><?=$arElement["PRICES"]["BASE"]["PRINT_DISCOUNT_VALUE"]?></div>
						<?if($arElement["CATALOG_QUANTITY"] > 0):?>						
							<div> есть на складе </div>
						<?else:?>
							<div> нет на складе </div>
						<?endif?>
					</div>
					<div class="footer">
						<div>Кол-во:</div>
						<div>
							<form id='myform' method='POST' action='#'>
							    <input type='button' value='-' class='qtyminus<?=$arElement["ID"]?>' field='quantity<?=$arElement["ID"]?>' />
							    <input type='text' name='quantity<?=$arElement["ID"]?>' value='1' class='qty' />
							    <input type='button' value='+' class='qtyplus<?=$arElement["ID"]?>' field='quantity<?=$arElement["ID"]?>' />
							</form>
							<script>
								$('.qtyplus<?=$arElement["ID"]?>').click(function(e){
									// Stop acting like a button
									e.preventDefault();
									// Get the field name
									fieldName = $(this).attr('field');
									// Get its current value
									var currentVal = parseInt($(this).siblings('input[name='+fieldName+']').val());
									// If is not undefined
									if (!isNaN(currentVal)) {
										// Increment
										$(this).siblings('input[name='+fieldName+']').val(currentVal + 1);
									} else {
										// Otherwise put a 0 there
									   $(this).siblings('input[name='+fieldName+']').val(0);
									}
								});
								// This button will decrement the value till 0
								$(".qtyminus<?=$arElement["ID"]?>").click(function(e) {
									// Stop acting like a button
									e.preventDefault();
									// Get the field name
									fieldName = $(this).attr('field');
									// Get its current value
									var currentVal = parseInt($(this).siblings('input[name='+fieldName+']').val());
									// If it isn't undefined or its greater than 0
									if (!isNaN(currentVal) && currentVal > 0) {
										// Decrement one
										$(this).siblings('input[name='+fieldName+']').val(currentVal - 1);
									} else {
										// Otherwise put a 0 there
										$(this).siblings('input[name='+fieldName+']').val(0);
									}
								});
							</script>
						</div>
						<div><a href="<?=$arElement["ADD_URL"]?>" rel="nofollow" data-href="<?=$arElement["ADD_URL"]?>" class="basketAdd">В корзину</a></div>
					</div>
					<?else:?>
						<div class="price">
							<div style="font-size: 18px;">Цена по запросу</div>
							<div></div>
						</div>
					<?endif?>
				</div>
<?endforeach;?>

<?/*?>
<div class="b-catalog"><!-- CATALOG -->
	<ul class="catalog">
	<?foreach($arResult["ITEMS"] as $cell=>$arElement):
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		//debugmessage($arElement["PRICES"]["BASE"]["PRINT_DISCOUNT_VALUE"]);
		?>
		
		<li>
			<div class="item-caption"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?><?if($arElement["PROPERTIES"]["ARTNUMBER"]["VALUE"]) echo ", ".$arElement["PROPERTIES"]["ARTNUMBER"]["VALUE"];?></a></div>
			<div class="item-text"><?=$arElement["PREVIEW_TEXT"]?></div>
			 
            <div class="item-basket">
                <?if($arElement["PRICES"]["BASE"]["VALUE"]):?>
					<?//debugmessage($arElement);die();?>
					
					<div class="bPrice"> <?=$arElement["PRICES"]["BASE"]["PRINT_DISCOUNT_VALUE"]?> </div>
					
					<div class="basket-input">
						<input type="text" name="" disabled="disabled" value="1">
						<div class="icon-left"></div>
						<a class="icon-right" data-href="<?=$arElement["ADD_URL"]?>" class="basketAdd" href="<?=$arElement["ADD_URL"]?>"><div class="basket-icon <?if($arElement["QUANTITY_ORDER"]) echo "active";?>"></div></a>
						<div class="icon-plus"></div>
						<div class="icon-minus"></div>
						
					</div>
					<br/>
					
				<?else:?>
					<div class="basket-icon" style="background: none;"></div>
				<?endif;?>
				<?if($arElement["CATALOG_QUANTITY"] > 0):?>						
					<span> есть на складе </span>
				<?else:?>
					<span> нет на складе </span>
				<?endif?>
				<div class="art">
					<?if($arElement["PROPERTIES"]["ARTNUMBER"]["VALUE"]):?>
						<span> арт. <?=$arElement["PROPERTIES"]["ARTNUMBER"]["VALUE"]?> </span>
					<?endif;?>
				</div>
            </div>
			
        </li>
		
		<?endforeach;?>
	</ul>
</div>
<?*/?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
<?if(array_key_exists("IS_AJAX", $_REQUEST) && $_REQUEST["IS_AJAX"] == "Y")
{
    	die();
}?>
<?else:?>
	<h2 style="padding: 140px 0px; text-align: center;">нет результатов по вашему запросу</h2>
<?endif;?>
