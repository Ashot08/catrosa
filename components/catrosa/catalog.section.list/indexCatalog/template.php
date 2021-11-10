<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="b-catalog"><!-- CATALOG -->
<?foreach($arResult["SECTIONS"] as $cell => $arSection):?>
				
		<div class="catalog-item <?if(($cell+1)%3==0) echo "no-margin";?>">
            <div class="item-image">
                <a href="<?=$arSection["SECTION_PAGE_URL"]?>">
					<?if($arSection["PICTURE"]["SRC"]):?>
						<img src="<?=MakeImage($arSection["PICTURE"]["SRC"], array("w" => 224,"h" => 183))?>" alt="">
					<?else:?>
						<img src="/img/catrosa_default_image.jpg" alt="">
					<?endif;?>
				</a>
            </div>
            <div class="item-basket">
				<div class="basket-icon" style="background: none;"></div>
				<div class="basket-line"></div>
            </div>
			
            <div class="item-caption"><h2><a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a></h2></div>
            <div class="item-text">
				<?if(count($arSection["SUBSECTIONS"] > 0)):?>
					<ul style="list-style: none; margin: 0px;">
						<?foreach($arSection["SUBSECTIONS"] as $subSection):?>
							<li>
							  <a href="<?=$subSection["SECTION_PAGE_URL"]?>"><?=$subSection["NAME"]?></a>
							</li>
						<?endforeach;?>
					</ul>
				<?endif;?>
			</div>
            <div class="catalog-item-bg-top"></div>
            <div class="catalog-item-bg"></div>
            <div class="catalog-item-bg-bottom"></div>
        </div>
<?endforeach?>

			
</div><!-- CATALOG END -->