<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="modal">
	<div class="bg"></div>
	
	<form id="question">
		<div class="modalClose"></div>
		<input type="hidden" name="price" value=""/>
		<input type="hidden" name="USER" value="<?=$USER->GetID()?>"/>
		<input type="hidden" name="ELEMENT" value="<?=$arResult["ID"]?>"/>
		<input type="hidden" name="PAGE" value="<?=$arResult["DETAIL_PAGE_URL"]?>"/>
		<legend></legend>
		<label>
			Имя:<br/>
			<input type="text" name="NAME" required/>
		</label>
		<label>
			E-Mail:<br/>
			<input type="email" name="EMAIL" required/>
		</label>
		<label>
			Коментарий:<br/>
			<textarea name="TEXT" row="3" required></textarea>			
		</label>
		<center><button class="btn-catrosa" type="submit">Отправить</button></center>
		
	</form>
</div>
<?//debugmessage($arResult);?>
<h1><?=$arResult["SECTION"]["NAME"]?></h1>

<div class="b-page"><!-- PAGE -->
    <div class="image">
        <div class="big">
			<?if($arResult["DETAIL_PICTURE"]["SRC"]):?>
				<a href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="fancybox">
					<img src="<?=MakeImage($arResult["DETAIL_PICTURE"]["SRC"], array("w" => 235))?>" alt="">
				</a>
			<?else:?>
				<img src="/img/catrosa_default_image.jpg" alt="">
			<?endif;?>
        </div>
        <div class="small">
            <div class="preview-layer">
				<?foreach($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $key => $value):
					if($key == 4) break;
					$src = CFile::GetPath($value);
				?>
					<div class="bg-layer">
						<div class="bg top"></div>
						<img data-src="<?=$src?>" src="<?=MakeImage($src, array("w" => 235))?>" alt="">
						<div class="bg bottom"></div>
					</div>
				<?endforeach;?>
               
                <div class="clear"></div>
            </div>
            <div class="bg-layer-line"></div>
        </div>
    </div>
	
    <div class="in">
        <h2><?=$arResult["NAME"]?></h2>
        <div class="about">
			<div class="price">
				<div>
					<div class="overflow-layer">
						<?if($arResult["PRICES"]["BASE"]["VALUE"]):?>
							<?=$arResult["PRICES"]["BASE"]["PRINT_DISCOUNT_VALUE"]?>
						<?endif;?>
						<?if($arResult["CATALOG_QUANTITY"] > 0):?>						
							<span class="green">(есть на складе)</span>
						<?else:?>
							Нет на складе
						<?endif?>
					</div>						
				</div>
			</div>
			<?if($arResult["PROPERTIES"]["CAS"]["VALUE"]):?>
				<div class="number">
					CAS-номер:&nbsp;<span><?=$arResult["PROPERTIES"]["CAS"]["VALUE"]?></span>
				</div>
			<?endif;?>
			<div class="question">
				<div class="icon"></div>
				<a href="#">Задайте вопрос по этому товару</a>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="basket">
			<div class="caption">Количество</div>
			<div class="input">
				<input type="text" name="" disabled="disabled" value="1">
				<div class="icon-input"></div>
				<div class="count">
					<div class="buttons">
						<div class="button-inc"></div>
						<div class="button-dec"></div>
					</div>
					<div class="icon-basket"></div>
					<div class="clear"></div>
				</div>
			</div>
			<?if($arResult["PRICES"]["BASE"]["VALUE"]):?>
				<a data-href="<?=$arResult["ADD_URL"]?>" href="<?=$arResult["ADD_URL"]?>" class="link btn-catrosa">В корзину</a>
				<div class="clear"></div>
			<?else:?>
				<div class="icon-price"></div>
				<a href="#" id="app" class="link">Цена по запросу</a>
				<div class="clear"></div>
			<?endif;?>
        </div>
        <div class="text">
            <?=$arResult["PREVIEW_TEXT"]?>
        </div>
    </div>
    <div class="clear"></div>
</div><!-- PAGE END -->
<div class="b-tab font-black"><!-- TAB -->
    <div class="tab-nav">
		<?if($arResult["PROPERTIES"]["PROPERTIES"]["VALUE"]):?>
			<div class="tab active" data-value="box-1"><span>Характеристики</span></div>
		<?endif;?>
		<?
		CModule::IncludeModule("iblock");
		
		if(strcasecmp($arResult['PROPERTIES']['ARTNUMBER']['VALUE']{0}, 'a') == 0){
			$doc = 1;
		}
		if(!empty($arResult['PROPERTIES']["SPECIFICATION"]["VALUE"])){
			$doc = 2;
		}else{
			$doc = 0;
		}
		if($doc == 0){
			$art = $arResult['PROPERTIES']['ARTNUMBER']['VALUE'];
			$art = substr($art,0,6);
			$res = CIBlockElement::GetList(array(), array("IBLOCK_ID" => 14, "SECTION_ID" => 49, "CODE" => $art),false,false, array());
			if ($arFields = $res->Fetch()):?>
				<div class="tab <?if(!$arResult["PROPERTIES"]["PROPERTIES"]["VALUE"]) echo "active";?>" data-value="box-2"><span>Описание</span></div>
				
				<ul class="pdf">
				        <li> <a href="?pdf=Y&ln=ru">Скачать PDF</a> </li>
				        <li> | </li>
				        <li> <a href="?pdf=Y&ln=en">Download PDF</a> </li>
				    </ul>
			<?endif;?>
		<?}?>
		
		<?if($doc == 1){
			$file = substr($arResult['PROPERTIES']['ARTNUMBER']['VALUE'], 0, 5);
			$fileurl = "../documents/".$file.".pdf";
			$fileurl1 = "/documents/".$file.".pdf";
			
			if(file_exists($fileurl)){
				?>
				<div class="tab <?if(!$arResult["PROPERTIES"]["PROPERTIES"]["VALUE"]) echo "active";?>" data-value="box-2"><span>Описание</span></div>
				
				<ul class="pdf">
					<li> <a href="<?=$fileurl1?>">Скачать PDF</a> </li>
				</ul>
				<?
			}else{
				$file = substr($arResult['PROPERTIES']['ARTNUMBER']['VALUE'], 0, 5);
				$filename = "../documents/".$file.".pdf";
				
				require($_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/include/phpQuery.php");
				$page = file_get_contents("http://www.panreac.es/en/index.php?searchword=".$file."&ordering=newest&searchphrase=all&limit=100&areas%5B0%5D=catalogo&option=com_search&clave=".$file);
				if($page === false) return false;
				$page = iconv("cp1252","utf-8",$page);
				$html = phpQuery::newDocument($page);
				$link = $html -> find('a.catLink') -> attr('href');
				if($link != ""){
					$pic = file_get_contents($link);
					file_put_contents($filename, $pic);
				}else{
					$doc = 0;
				}
			}
		?>
		
		<?}?>
		
		<?if($doc == 2){
			$fileArray = CFile::GetFileArray($arResult['PROPERTIES']["SPECIFICATION"]["VALUE"]);
			$fileurl = $fileArray["SRC"];

			if(file_exists($_SERVER["DOCUMENT_ROOT"].$fileurl)){
				?>
				<div class="tab <?if(!$arResult["PROPERTIES"]["PROPERTIES"]["VALUE"]) echo "active";?>" data-value="box-2"><span>Описание</span></div>

				<ul class="pdf">
					<li> <a href="<?=$fileurl?>">Скачать PDF</a> </li>
				</ul>
				<?
			}
			?>

		<?}?>
        <div class="clear"></div>
    </div>
	<?if($arResult["PROPERTIES"]["PROPERTIES"]["VALUE"]):?>
		<div class="box box-1 active">
			<div class="b-table"><!-- TABLE -->
				<?foreach($arResult["PROPERTIES"]["PROPERTIES"]["VALUE"] as $key => $value):?>
					<div class="table-line">
						<div class="line-left"><span><?=$value?></span></div>
						<div class="line-right"><span><?=$arResult["PROPERTIES"]["PROPERTIES"][$key]["DESCRIPTION"]?></span></div>
						<div class="clear"></div>
					</div>
				<?endforeach;?>
			</div><!-- TABLE END -->
		</div>
	<?endif;?>
	<?if($doc == 0){
		if($arFields['DETAIL_TEXT']):?>
			<div class="box box-2 <?if(!$arResult["PROPERTIES"]["PROPERTIES"]["VALUE"]) echo "active";?>"><!--BEGIN_PDF--><?=$arFields["DETAIL_TEXT"]?><!--END_PDF--></div>
			<div class="eng_sp"><!--BEGIN_PDF_EN--><?=$arFields["PREVIEW_TEXT"]?><!--END_PDF_EN--></div>
		<?endif;
	}
	if($doc == 1){
		$file = substr($arResult['PROPERTIES']['ARTNUMBER']['VALUE'], 0, 5);
		$fileurl = "/documents/".$file.".pdf";
		if(file_exists($fileurl)){}else{?>
			<object data="<?=$fileurl?>" type="application/pdf" width="730px" height="400px">
			alt: <a href="<?=$fileurl?>">Спецификация - <?=$arResult['PROPERTIES']['ARTNUMBER']['VALUE']?></a>
			</object>
		<?}
	}
	if($doc == 2){
		if(file_exists($_SERVER["DOCUMENT_ROOT"].$fileurl)){
			?>
			<object data="<?=$fileurl?>" type="application/pdf" width="730px" height="400px">
				alt: <a href="<?=$fileurl?>">Спецификация - <?=$arResult['PROPERTIES']['ARTNUMBER']['VALUE']?></a>
			</object>
		<?}
	}
	?>
	
	
</div><!-- TAB END -->
