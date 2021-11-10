<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="id-cart-list">
	
<table class="equipment mycurrentorders" rules="rows" style="width:100%; text-align: center;">
	<thead>
		<tr>
			<td style="padding: 20px; font-weight: bold;">Картинка</td>
			<td style="padding: 20px; font-weight: bold;"><?= GetMessage("SALE_NAME")?></td>
			<td style="padding: 20px; font-weight: bold;">Артикул</td>
			<td style="padding: 20px; font-weight: bold;" class="cart-item-quantity"><?= GetMessage("SALE_QUANTITY")?></td>
			
			<td style="padding: 20px; font-weight: bold;" class="cart-item-price"><?= GetMessage("SALE_PRICE")?></td>
			
			<td style="padding: 20px; font-weight: bold;" class="cart-item-delay"></td>
		</tr>
	</thead>
<?if(count($arResult["ITEMS"]["AnDelCanBuy"]) > 0):?>
	<tbody>
	<?
	$i=0;
	foreach($arResult["ITEMS"]["AnDelCanBuy"] as $arBasketItems)
	{
		?>
		<tr>
			<td>
				<?if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):?>
					<a href="<?=$arBasketItems["DETAIL_PAGE_URL"]?>">
				<?endif;?>
				
				<?if (!empty($arResult["ITEMS_IMG"][$arBasketItems["ID"]]["SRC"]) && @fopen($arResult["ITEMS_IMG"][$arBasketItems["ID"]]["SRC"],'r')) :?>
					<img src="<?=$arResult["ITEMS_IMG"][$arBasketItems["ID"]]["SRC"]?>" alt="<?=$arBasketItems["NAME"] ?>"/>
				<?else:?>
					<img src="/img/catrosa_default_image.jpg" alt="<?=$arBasketItems["NAME"] ?>" class="img-responsive"/>
				<?endif?>
				<?if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):?>
					</a>
				<?endif;?>
			</td>
			<td class="cart-item-name">
				<?if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):?>
					<a href="<?=$arBasketItems["DETAIL_PAGE_URL"]?>">
				<?endif;?>
					<?=$arBasketItems["NAME"] ?>
				<?if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):?>
					</a>
				<?endif;?>
				<?if (in_array("PROPS", $arParams["COLUMNS_LIST"])) {
					foreach($arBasketItems["PROPS"] as $val) {
						echo "<br />".$val["NAME"].": ".$val["VALUE"];
					}
				}?>
			</td>
			
			<td>
				<?=$arBasketItems["PROPERTIES"]["ARTNUMBER"]["VALUE"]?>
			</td>
			
			<td>
				<input maxlength="18" class="basket-quantity" style="padding: 4px; width: 60px;" type="number" data-id="<?php echo $arBasketItems["ID"] ?>" name="QUANTITY_<?=$arBasketItems["ID"]?>" value="<?=$arBasketItems["QUANTITY"]?>" size="3" id="QUANTITY_<?=$arBasketItems["ID"]?>">
				
			</td>
			
			<td class="cart-item-price">
				<?if(doubleval($arBasketItems["DISCOUNT_PRICE_PERCENT"]) > 0):?>
					<div class="discount-price"><?=$arBasketItems["PRICE_FORMATED"]?></div>
					<div class="old-price"><?=$arBasketItems["FULL_PRICE_FORMATED"]?></div>
				<?else:?>
					<div class="price"><?=$arBasketItems["PRICE_FORMATED"];?></div>
				<?endif?>
			</td>
			
			<td>
				<a href="<?=str_replace("#ID#", $arBasketItems["ID"], $arUrlTempl["delete"])?>">Удалить из корзины</a>
			</td>
		</tr>
		<?
		$i++;
	}
	?>
	</tbody>
</table>
<table class="myorders_itog">
	<tbody>
		<?if ($arParams["HIDE_COUPON"] != "Y"):?>
		<tr>
			<td rowspan="5" class="tal">
				<input class="input_text_style"
					<?if(empty($arResult["COUPON"])):?>
						onclick="if (this.value=='<?=GetMessage("SALE_COUPON_VAL")?>')this.value=''; this.style.color='black'"
						onblur="if (this.value=='') {this.value='<?=GetMessage("SALE_COUPON_VAL")?>'; this.style.color='#a9a9a9'}"
						style="color:#a9a9a9"
					<?endif;?>
						value="<?if(!empty($arResult["COUPON"])):?><?=$arResult["COUPON"]?><?else:?><?=GetMessage("SALE_COUPON_VAL")?><?endif;?>"
						name="COUPON">
			</td>
		</tr>
		<?endif;?>
		<?if (in_array("WEIGHT", $arParams["COLUMNS_LIST"])):?>
			<tr>
				<td><?echo GetMessage("SALE_ALL_WEIGHT")?>:</td>
				<td><?=$arResult["allWeight_FORMATED"]?></td>
			</tr>
		<?endif;?>
		<?if (doubleval($arResult["DISCOUNT_PRICE"]) > 0):?>
			<tr>
				<td><?echo GetMessage("SALE_CONTENT_DISCOUNT")?><?
					if (strLen($arResult["DISCOUNT_PERCENT_FORMATED"])>0)
						echo " (".$arResult["DISCOUNT_PERCENT_FORMATED"].")";?>:
				</td>
				<td><?=$arResult["DISCOUNT_PRICE_FORMATED"]?></td>
			</tr>
		<?endif;?>
		<?if ($arParams['PRICE_VAT_SHOW_VALUE'] == 'Y'):?>
			<tr>
				<td><?echo GetMessage('SALE_VAT_EXCLUDED')?></td>
				<td><?=$arResult["allNOVATSum_FORMATED"]?></td>
			</tr>
			<tr>
				<td><?echo GetMessage('SALE_VAT_INCLUDED')?></td>
				<td><?=$arResult["allVATSum_FORMATED"]?></td>
			</tr>
		<?endif;?>
		
	</tbody>
</table>
<br/>
<center>
<table class="w100p" style="font-size: 20pt; text-align: center;">
	<tr>
		<td><?= GetMessage("SALE_ITOGO")?>:</td>
		<td id="itog_price"><?=$arResult["allSum_FORMATED"]?></td>
	</tr>
	<tr style="margin-bottom:40px;">
		<?/*?><td style="padding:30px 2px;" class="tal"><input type="submit" value="<?echo GetMessage("SALE_UPDATE")?>" name="BasketRefresh" class="bt2"></td><?*/?>
		
		<td style="padding:30px 2px;" class="tar"><input type="submit" value="<?echo GetMessage("SALE_ORDER")?>" name="BasketOrder"  id="basketOrderButton2" class="bt3"></td>
	</tr>
</table>
</center>
<?else:?>
	<tbody>
		<tr>
			<td  style="text-align:center">
				<div class="cart-notetext"><?=GetMessage("SALE_NO_ACTIVE_PRD");?></div>
				<a href="<?=SITE_DIR?>" class="bt3"><?=GetMessage("SALE_NO_ACTIVE_PRD_START")?></a><br><br>
			</td>
		</tr>
	</tbody>
</table>
<?endif;?>
</div>
<?