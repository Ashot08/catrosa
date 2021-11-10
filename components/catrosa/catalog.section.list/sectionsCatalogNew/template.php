<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
            
			<?foreach($arResult["SECTIONS"] as $key => $arSection):?>
					<li>
						<a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a>
						<?if (!empty($arResult["SECTIONS"][$key]["SUBSECTIONS"])):?>
						<ul>
							<?foreach($arResult["SECTIONS"][$key]["SUBSECTIONS"] as $subSection):?>
								<li>
								  <a href="<?=$subSection["SECTION_PAGE_URL"]?>"><?=$subSection["NAME"]?></a>
								</li>
							<?endforeach;?>
						</ul>
						<?endif?>
					</li>
			<?endforeach?>
	