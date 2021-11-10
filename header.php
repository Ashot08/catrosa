<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php

use Bitrix\Main\Page\Asset;

if($_REQUEST["pdf"] == "Y") {
	ob_end_clean();
	CModule::IncludeModule("iblock");
	$res = CIBlockElement::GetByID($_REQUEST["ELEMENT_ID"]);
	$html = "<div style='width: 100%; text-align: center;'><img src='/images/shapka.jpg'></div>";
	if($arItem = $res->GetNextElement()) {
		$fields = $arItem->GetFields();
		$fields["PROPERTIES"] = $arItem->GetProperties();
		require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/include/dompdf/dompdf_config.inc.php");
		if($fields["IBLOCK_ID"] == 9) {

			$result = CIBlockElement::GetList (array(), array("IBLOCK_ID" => 9, "ID" => $_REQUEST["ELEMENT_ID"]), false, false, array("IBLOCK_ID", "ID", "PROPERTY_ARTNUMBER"));
			if ($arFields = $result->Fetch()):
				$artNum = $arFields['PROPERTY_ARTNUMBER_VALUE'];
				$artNum = substr($artNum,0,6);
			endif;

			$result1 = CIBlockElement::GetList(array(), array("IBLOCK_ID" => 14, "SECTION_ID" => 49, "CODE" => $artNum),false,false, array());
			if ($arFields1 = $result1->Fetch()):
				if($_REQUEST["ln"] == "ru"){
					$html .= $arFields1["DETAIL_TEXT"];
				}elseif($_REQUEST["ln"] == "en"){
					$html .= $arFields1["PREVIEW_TEXT"];
			}
			endif;

		}
		if($fields["IBLOCK_ID"] == 14) {
			if($_REQUEST["ln"] == "ru")
				$html .= $fields["DETAIL_TEXT"];
			elseif($_REQUEST["ln"] == "en")
				$html .= $fields["PREVIEW_TEXT"];
		}


$html = str_replace("'", '"', $html);
$html = str_replace("\n", "", $html);
$html = str_replace("<br>", "<br />", $html);
$html = str_replace("<ol ", "<div ", $html);
$html = str_replace("</ol", "</div", $html);
$html = str_replace("<table ", "<table width=\"100%\" ", $html);
$html = str_replace("<tr><td></td><td", "<tr><td width=\"10%\"></td><td width=\"90%\"", $html);
$html = str_replace("src=\"/", "src=\"http://www.catrosa.ru/", $html);
$html = str_replace("//>", "/>", $html);

//$html = str_replace("style", "", $html);
//$html = str_replace("class", "", $html);
$html = str_replace("lang", "", $html);
$html = str_replace("width", "", $html);
$html = str_replace("valign", "", $html);

$html = '<style>
p, div, table { 
	margin: 0;	
}
.ft00{font-size:9px;color:#000000;}
.ft01{font-size:-1px;color:#000000;}
.ft02{font-size:9px;color:#000000;}
.ft03{font-size:9px;color:#000000;}
.ft04{font-size:8px;color:#000000;}
.ft05{font-size:9px;color:#000000;}
.ft06{font-size:9px;color:#000000;}
.ft07{font-size:9px;color:#000000;}
.ft08{font-size:9px;color:#000000;}
.ft09{font-size:9px;color:#000000;}
.ft010{font-size:9px;color:#008000;}
.ft011{font-size:9px;color:#000000;}
.ft012{font-size:9px;color:#000000;}
.ft013{font-size:9px;color:#000000;}
.ft014{font-size:9px;color:#000000;}
.ft015{font-size:9px;color:#000000;}
.ft016{font-size:9px;line-height:21px;color:#000000;}
.ft017{font-size:9px;line-height:21px;color:#000000;}
.ft018{font-size:9px;line-height:18px;color:#000000;}
.ft019{font-size:9px;line-height:15px;color:#000000;}
.ft020{font-size:9px;line-height:15px;color:#000000;}
.ft021{font-size:7px;line-height:11px;color:#000000;}
.ft022{font-size:9px;line-height:17px;color:#000000;}
</style>
'.$html;

$dompdf = new DOMPDF();
$dompdf->set_paper("A4");
$dompdf->load_html($html);
$dompdf->render();

$dompdf->stream($fields["NAME"].'.pdf');
exit();
	}
}

?>
<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
  <title><?php $APPLICATION->ShowTitle()?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/css/style.css">
	<?php
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/bootstrap.min.css');
		//$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/bootstrap.min.css');
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/owl.carousel.min.css');
		$APPLICATION->SetAdditionalCSS('/js/fancybox/jquery.fancybox.css');
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/style.css');

		$APPLICATION->AddHeadScript('https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js');
		$APPLICATION->AddHeadScript('/js/jquery.jcarousel.js');
		$APPLICATION->AddHeadScript('/js/bxSlider.js');
		$APPLICATION->AddHeadScript('/js/inputmask.js');
		$APPLICATION->AddHeadScript('/js/fancybox/jquery.fancybox.js');
		$APPLICATION->AddHeadScript('/js/script.js');
		$APPLICATION->ShowHead();
    ?>
  <!--[if IE]>	<link rel="stylesheet" type="text/css" href="/css/style_ie.css">  <![endif]-->
</head>
<body>

<?php $APPLICATION->ShowPanel();?>
 <section class="before-header">
     <div class="before-header__inner">
         <div class="container">
             <div class="row">
                 <div class="col-md-12">
                     <div class="top-contacts">
                         <span class="before-course-text">По курсу ЦБ</span>
                         <span class="course-text"><?php $APPLICATION->IncludeComponent(
                                 "sopdu:curse",
                                 "",
                                 array(
                                     "ChoiceCurrency" => array("EUR"),
                                     "ChoicePercent" => ""
                                 )
                             ); ?></span>
                         <a href="mailto:info@catrosa.ru" class="email-top">info@catrosa.ru</a>
                         <a href="tel:+74955438984" class="phone-top">+7 (495) 543 89 84</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</section>

<header class="main-header">
	<div class="container">
		<div class="main-header__blocks">
            <div class="main-header__left">
                <div class="">
                    <a href="<?=SITE_DIR?>" class="logo">
                        <img src="<?php echo SITE_TEMPLATE_PATH; ?>/images/logo.svg" alt="logo">
                    </a>
                </div>
                <div class="main-header__menu">
                    <div class="vcs_brand-toggle" data-vc-accordion="" data-vc-container=".vcs_menu" data-vc-target=".vcs_nav" data-vc-action="toggle">
                        <span class="vcs_brand-sign">
                            <span class="vcs_brand-sign-s"></span>
                            <span class="vcs_brand-sign-s"></span>
                            <span class="vcs_brand-sign-x"></span>
                        </span>
                    </div>
                    <div class="top-menu">
                        <?php
                        //if ($USER->IsAdmin()) {
                            //$type_menu = "top_new";
                        //} else {
                            $type_menu = "top_new";
                            //$type_menu = "top";
                        //}
                    ?>
                        <?php $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "topMenu",
                    array(
                        "ROOT_MENU_TYPE" => $type_menu,
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "N",
                        "MENU_CACHE_GET_VARS" => array(),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "drop",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                    false
                );?>
                    </div>
                </div>
            </div>
			<div class="main-header__right">
                <div class="" style="line-height: 38px;"><!-- AUTH -->
                    <?php if (!$USER->IsAuthorized()):?>
                        <!--<a href="/personal/registration/" class="registration">Регистрация</a>
                        <div class="or">или</div>-->
                        <div class="private-office">
                            <a href="#" class="lk-top">Войти</a>
                            <div class="auth">
                                <?php $APPLICATION->IncludeComponent(
                                    "bitrix:system.auth.form",
                                    "",
                                    array(
                                        "REGISTER_URL" => "/personal/registration/",
                                        "FORGOT_PASSWORD_URL" => "/personal/forgot/",
                                        "PROFILE_URL" => "/personal/profile/",
                                        "SHOW_ERRORS" => "N"
                                    ),
                                    false
                                );?>
                            </div>

                        </div>
                    <?php else:?>
                        <a href="/?logout=yes" class="registration">Выйти</a>
                        <div class="or">или</div>
                        <div class="private-office">
                            <a href="/personal/profile/" class="lk-top">Личный кабинет</a>

                        </div>
                    <?php endif;?>

                </div><!-- AUTH END -->
                <?php
				CModule::IncludeModule('sale');
				$newBasketUserID = CSaleBasket::GetBasketUserID(true);

				if($newBasketUserID>0){
					$q = CSaleBasket::GetList(array(),array('ORDER_ID'=>"NULL","FUSER_ID" => $newBasketUserID));
					$PRODUCTS_IN_CARD = array();
					while($res = $q->Fetch())
					{

						$PRODUCTS_IN_CARD[] = $res;
					}
				}
			?>
                <?php $APPLICATION->IncludeComponent(
				"catrosa:sale.basket.basket.line",
				"topBasket",
				Array(
					"PATH_TO_BASKET" => "/personal/cart/",	// Страница корзины
					"PATH_TO_PERSONAL" => "/personal/profile/",	// Персональный раздел
					"SHOW_PERSONAL_LINK" => "N",	// Отображать ссылку на персональный раздел
					"PRODUCTS_IN_CARD" => $PRODUCTS_IN_CARD
				),
				false
			);?>

			</div>
		</div>
        <div class="main-header__bottom">
            <button class="accent-button main-header__catalog-button catalog-menu-toggle">
                <img class="main-header__button-image" src="<?php echo SITE_TEMPLATE_PATH; ?>/images/i-catalog.svg" alt="catalog button">
                <img class="main-header__button-close-image" src="<?php echo SITE_TEMPLATE_PATH; ?>/images/i-close-catalog.svg" alt="catalog button close">
                <span>Каталог</span>
            </button>
            <div class="small-find-box-left search">
                <form method="get" action="/catalog/">
                    <input class="input" name="NAME" placeholder="Название, артикул, CAS номер">
                    <button type="submit"></button>
                </form>
                <div class="search-result">
                </div>
            </div>
        </div>
	</div>
</header>
<div class="main-header__catalog">
    <div class="main-header__catalog-wrapper">
        <div class="container">
            <div>
                <div>Химические реактивы <br> для лаборатории и производства</div>
                <? $APPLICATION->IncludeComponent(
                    "catrosa:catalog.section.list",
                    "sectionsMain",
                    array(
                        "IBLOCK_TYPE" => "catalog",
                        "IBLOCK_ID" => "9",
                        "SECTION_ID" => "14",
                        "SECTION_CODE" => "",
                        "SECTION_URL" => "",
                        "COUNT_ELEMENTS" => "Y",
                        "TOP_DEPTH" => "1",
                        "SECTION_FIELDS" => "",
                        "SECTION_USER_FIELDS" => "",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "36000",
                        "CACHE_NOTES" => "",
                        "CACHE_GROUPS" => "Y"
                    )
                ); ?>
            </div>
            <div>
                <div>Расходные материалы <br> для лабораторий</div>
                <? $APPLICATION->IncludeComponent(
                    "catrosa:catalog.section.list",
                    "sectionsMain",
                    array(
                        "IBLOCK_TYPE" => "catalog",
                        "IBLOCK_ID" => "9",
                        "SECTION_ID" => "23",
                        "SECTION_CODE" => "",
                        "SECTION_URL" => "",
                        "COUNT_ELEMENTS" => "Y",
                        "TOP_DEPTH" => "1",
                        "SECTION_FIELDS" => "",
                        "SECTION_USER_FIELDS" => "",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "36000",
                        "CACHE_NOTES" => "",
                        "CACHE_GROUPS" => "Y"
                    )
                ); ?>
            </div>
        </div>
    </div>
</div>

<?/* Если мы находимся на главной */?>
<? if ($APPLICATION->GetCurPage(false) === '/'): ?>
    <section class="main-banner">
        <img src="<?php echo SITE_TEMPLATE_PATH; ?>/images/banner.png" alt="banner">
    </section>
<? endif; ?>


<?php if($APPLICATION->GetCurPage(true)!= SITE_DIR."index.php"):?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12 bread">
                <?php $APPLICATION->IncludeComponent(
					"bitrix:breadcrumb",
					"all",
					Array(
						"START_FROM" => "0",
						"PATH" => "",
						"SITE_ID" => ""
					)
				);?>
			</div>
		</div>
	</div>
</section>





<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="tab">
					<div class="active"><?php $APPLICATION->ShowTitle(false)?></div>
				</div>
			</div>
		</div>
	</div>
</section>



<section class="contact-wrap">
	<div class="container">

        <?php endif?>
