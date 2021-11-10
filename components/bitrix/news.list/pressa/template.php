<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?//debugmessage($arResult);?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	
	$date = strtotime($arItem["ACTIVE_FROM"]);
	?>
	<div class="content-box">
	<?if (!empty($arItem["PREVIEW_PICTURE"]["SRC"])):?>
	<div class="img_pressa">
		<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>">
	</div>
	<?endif?>
	<div class="desc_pressa">
        <div class="date">
            <?=$arItem["ACTIVE_FROM"]?>
        </div>
		<div class="content-box-title">
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
		</div>
		<div class="content-box-text">
			<?=$arItem["PREVIEW_TEXT"]?>
		</div>
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="content-box-link">Подробнее</a>
    </div>
    </div>
			
<?endforeach;?>
	<?if($arParams["MAIN_PAGE"] == "Y"):?>
		<a href="<?=$arParams["MAIN_LINK"]?>" class="link">Все новости</a>
	<?endif;?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<br/><br/><br/>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>


<?if(array_key_exists("IS_AJAX", $_REQUEST) && $_REQUEST["IS_AJAX"] == "Y")
{
    	die();
}?>

            
          