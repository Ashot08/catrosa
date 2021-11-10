<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>


					<?foreach($arResult as $arItem):?>
						<?if($arItem["SELECTED"]):?>
							<a class="active" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
						<?else:?>
							<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
						<?endif?>
							
					<?endforeach?>
				
	
<?endif?>