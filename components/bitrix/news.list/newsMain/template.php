<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?//debugmessage($arResult);?>
    <div class="caption"><?=$arParams["CAPTION"]?></div>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	
	$date = strtotime($arItem["ACTIVE_FROM"]);
	?>
	<div class="news">
        <div class="date">
            <div class="icon"><?=date("d", $date)?></div>
            <span><?=FormatDate("F", MakeTimeStamp($arItem["ACTIVE_FROM"]))?></span>
            <span class="year"><?=date("Y", $date)?></span>
            <div class="clear"></div>
        </div>
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
    </div>
			
<?endforeach;?>
	<?if($arParams["MAIN_PAGE"] == "Y"):?>
		<a href="<?=$arParams["MAIN_LINK"]?>" class="link">Все новости</a>
	<?endif;?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<br/><br/><br/>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>




            
          