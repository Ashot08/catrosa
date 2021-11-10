<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?//debugmessage($arResult);?>

<?if(count($arResult["ITEMS"])):?>
<div class="doc tab">
    <h1 class="active"><?=$arParams["CAPTION"]?></h1>
	<ul>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));	
	?>
	<li>        
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
    </li>
			
<?endforeach;?>
	</ul>
</div>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<br/><br/><br/>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>

<?else:?>
	<h2>Не найдено документов по вашему запросу</h2>
<?endif;?>