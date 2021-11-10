<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(count($arResult["ITEMS"])):?>
<div class="b-last-views"><!-- LAST-VIEWS -->
    <div class="last-views-caption">Просмотренные товары</div>
    <div id="mycarousel2">
        <ul class="jcarousel-skin-tango2">
    <?foreach($arResult["ITEMS"] as $cell=>$arElement):
        $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
        //debugmessage($arElement);
    ?>
    
    <li class="list-item">
        <div class="item-image">
            <a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
                <?if($arElement["DETAIL_PICTURE"]["SRC"]):?>
                    <img src="<?=MakeImage($arElement["DETAIL_PICTURE"]["SRC"], array("w" => 224,"h" => 183))?>" alt="">
                <?else:?>
                    <img src="/img/catrosa_default_image.jpg" alt="">
                <?endif;?>
            </a>
        </div>
        <div class="item-icon">
            <?if($arElement["PRICES"]["BASE"]["VALUE"]):?>
                <a href="<?=$arElement["ADD_URL"]?>" rel="nofollow"><div class="icon-basket <?if($arElement["QUANTITY_ORDER"]) echo "active";?>"></div></a>
            <?else:?>
                <div class="icon-basket" style="background: none;"></div>
                <div class="basket-line"></div>
            <?endif;?>
            <div class="icon-line"></div>
        </div>
        <a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="item-link"><?=$arElement["NAME"]?><?if($arElement["PROPERTIES"]["ARTNUMBER"]["VALUE"]) echo ", ".$arElement["PROPERTIES"]["ARTNUMBER"]["VALUE"];?></a>
        <div class="item-text"><?=$arElement["PREVIEW_TEXT"]?></div>
    </li>
        
              
        
        
    <?endforeach;?>
        </ul>
    </div>
    <div class="last-views-shadow next"></div>
    <div class="last-views-shadow prev"></div>
</div><!-- LAST-VIEWS END -->

<?endif;?>