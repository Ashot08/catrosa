<form id="document_translate_form" action="/translate/index_v2.php" method="get" target="_blank">
	<input type="text" name="code" placeholder="Код">
	<span>и</span>
	<input type="text" name="lot" placeholder="Лот">
	<?if ($USER->IsAdmin()) {?>
	<span>или</span>
	<label>
		<span>файл</span>
		<input type="file" name="file">
	</label>
	<?}?>
	<input type="hidden" name="key" value=""/>
	<input type="hidden" name="action" value="translate_document"/>
	<button type="submit"></button>
</form>