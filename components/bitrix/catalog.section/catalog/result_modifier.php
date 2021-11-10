<?php

//Кол-во заказанный для каждого товара
$item_ids = array();

foreach($arResult['ITEMS'] as $v)
{
	$item_ids[] = $v['ID'];
}
CModule::IncludeModule("sale");
$q = CSaleBasket::GetList(array(),array(
	'PRODUCT_ID'=>$item_ids,
	"FUSER_ID" => CSaleBasket::GetBasketUserID(),
	"ORDER_ID" => "NULL",
));
while($res = $q->Fetch())
{	
	foreach($arResult['ITEMS'] as $k=>$v)
	{
		if($v['ID'] == $res['PRODUCT_ID'])
		{
			$arResult['ITEMS'][$k]['QUANTITY_ORDER'] = (int)$res['QUANTITY'];
			break;
		}
	}
}