<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="b-gray"><!-- GRAY -->
    <div class="caption">Каталог<br>продукции</div>
    <div class="caption-icon"></div>
        <div class="content">
            <ul>
<?foreach($arResult["SECTIONS"] as $arSection):?>
		<li class="select">
			<div class="select-icon"></div>
			<div class="select-caption"><?=$arSection["NAME"]?></div>
			<?if(count($arSection["SUBSECTIONS"] > 0)):?>
            <ul class="select-list">
				<?foreach($arSection["SUBSECTIONS"] as $subSection):?>
                    <li>
                      <a href="<?=$subSection["SECTION_PAGE_URL"]?>"><?=$subSection["NAME"]?></a>
                    </li>
				<?endforeach;?>
            </ul>
			<?endif;?>
        </li>
<?endforeach?>

			</ul>
        </div>
		
    <div class="bottom-icon"></div>
</div><!-- GRAY END -->