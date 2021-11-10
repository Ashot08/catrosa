<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
if (array_key_exists('is_ajax', $_REQUEST) && $_REQUEST['is_ajax']=='y') {
    return;
}
?>
<?php if($APPLICATION->GetCurPage(true)!= SITE_DIR."index.php"):?>
		
	</div>
</section>
<?php endif?>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-4 footer-logo">
				<a href="" ></a>
				<div>г. Москва, ул. Малая Пироговская, д. 13с1, оф. 314 <br> +7 (495) 543 89 84</div>
			</div>
			<div class="col-md-5 footer-menu">
                <?php $APPLICATION->IncludeComponent(
				"bitrix:menu", 
				"bottomMenu", 
				array(
					"ROOT_MENU_TYPE" => "bottom",
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
			<div class="col-md-3">
				<div class="footer-phone">
					<a href="tel:+74955438984">+7 (495) 543 89 84</a>
					<a href="http://www.youtube.com/watch?v=YfWt9bY8E80&feature=plcp&context=C32f13cbUDOEgsToPDskLsomKuVzqYOIdp_cWapbcy" target="_blank"></a>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php
$APPLICATION->AddHeadScript('http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/bootstrap.min.js');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/main.js');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/owl.carousel.min.js');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/script.js');
?>

<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter47579257 = new Ya.Metrika({ id:47579257, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/47579257" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<script>
    /*
    * Ajax search
    ***********************************************************************/
    $('header .search .input').on('input', function(){
        var _self = $(this)

        setTimeout(function() {
            if( _self.val().length > 2 ){
                // число 2 можно менять, число 2 значит что запрос выполнится только если введено минимум 3 символа в строку поиска.
                // Здесь ajax запрос на сервер со вставкой результата
                $('header .search-result').fadeIn(300)

                var text=_self.val();
                var url="/bitrix/templates/catrosa_2021/ajax/search.php?text="+text;

                $.ajax({
                    type: "GET",
                    dataType: "html",
                    url: url,
                    success: function(data){
                        $('header .search-result').html(data);
                    }
                });


            } else {
                $('header .search-result').fadeOut(200)
            }
        }, 10)
    });
    /***********************************************************************/


    /*header catalog menu
    ************************************************************************/
    $(document).on('click', '.catalog-menu-toggle', function(e){
        $('.main-header__catalog').toggleClass('active');
        e.target.closest('.catalog-menu-toggle').classList.toggle('active');
    })
    /***********************************************************************/

</script>
</body>
</html>