<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="news-detail">
	<div style="float: right; padding: 0px 20px 20px 20px" >
		<a href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="fancybox"><img src="<?=MakeImage($arResult["DETAIL_PICTURE"]["SRC"], array("w" => 250, "h" => 250))?>"></a>
	</div>
	<h1><?=$arResult["NAME"]?></h1>
	<div class="post" style="font-size: 14px !important;">	<p><?=$arResult["DETAIL_TEXT"]?></p> </div>
	
	<ul>
		<?foreach($arResult["PRODUCTS_SECTIONS"] as $value):?>
			<li> <a href="<?=$value["SECTION_PAGE_URL"]?>?SUPPLIER=<?=$arResult["ID"]?>"><?=$value["NAME"]?></a> </li>
		<?endforeach;?>
	</ul>
</div>
<br/><br/><br/>
