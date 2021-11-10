<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


            <ul>
<?foreach($arResult["SECTIONS"] as $arSection):?>
		
			
			<?if(count($arSection["SUBSECTIONS"]) > 0):?>
				
					<?foreach($arSection["SUBSECTIONS"] as $subSection):?>
						<li>
						  <a href="<?=$subSection["SECTION_PAGE_URL"]?>"><?=$subSection["NAME"]?></a>
						</li>
					<?endforeach;?>
				
			<?else:?>
			<li>
				<a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a>
				</li>
			<?endif;?>
        
<?endforeach?>

			</ul>
       