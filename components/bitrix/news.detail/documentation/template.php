<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="news-detail" style="padding: 0px 20px;">
    <ul class="pdf">
        <li> <a href="?pdf=Y&ln=ru">Скачать PDF</a> </li>
        <li> | </li>
        <li> <a href="?pdf=Y&ln=en">Download PDF</a> </li>
    </ul>
    <a class="btn-catrosa" id="lang" href="" data-lang="Показать английскую версию"> Показать русскую версию </a>
    
    <br/><br/>
	
    <div class="lang en active"><?=$arResult["PREVIEW_TEXT"]?></div>
    <div class="lang ru"><?=$arResult["DETAIL_TEXT"]?></div>
</div>
<br/><br/><br/>