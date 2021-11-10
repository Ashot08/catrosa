<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

	<div class="b-gray"><!-- GRAY -->
        <div class="caption">О компании</div>
        <div class="caption-icon"></div>
			<div class="content">
				<ul>
					<?foreach($arResult as $arItem):?>
						<?if($arItem["SELECTED"]):?>
							<li><span><?=$arItem["TEXT"]?></span></li>
						<?else:?>
							<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
						<?endif?>
							
					<?endforeach?>
				</ul>
			</div>
        <div class="bottom-icon"></div>
    </div><!-- GRAY END -->
	
<?endif?>