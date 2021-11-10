<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="b-gray"><!-- GRAY -->
    <div class="caption">Каталог<br>продукции</div>
    <div class="caption-icon"></div>
        <div class="content">
            <ul>
<?foreach($arResult["SECTIONS"] as $arSection):?>
		<li class="select <?if($arSection["SELECTED"]) echo "active";?>">
			<div class="select-icon"></div>
			<?if(count($arSection["SUBSECTIONS"]) > 0):?>
			<div class="select-caption"><?=$arSection["NAME"]?></div>
            <ul class="select-list">
				<?foreach($arSection["SUBSECTIONS"] as $subSection):?>
                    <li>
                      <a href="<?=$subSection["SECTION_PAGE_URL"]?>"><?=$subSection["NAME"]?></a>
                    </li>
				<?endforeach;?>
            </ul>
			<?else:?>
				<div class="select-caption captionLink"><a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a></div>
			<?endif;?>
        </li>
<?endforeach?>

			</ul>
        </div>
		
		<div class="caption">Поиск</div>
        <div class="caption-icon"></div>
        <div class="search">
        <div class="content ">
			<form action="/catalog/" id="filter">
				<marquee behavior="scroll" direction="left">Поиск по названию, артикулу, CAS номеру</marquee>
				<div class="checkbox">
					<input type="text" name="NAME" value="" style="height: 23px;width: 200px;"/>
				</div>
				<center><button class="btn-catrosa" type="submit">Найти</button></center>
			</form>
        </div>
        </div>
    <div class="bottom-icon"></div>
</div>

