$(document).ready(function(){

$('.tab-click > div').on('click',function(){
  $('.tab-click > div').removeClass('active');
  $(this).toggleClass('active');
})


$('.tab-click > div:first-child').on('click',function(){
  $('.news-box').css('display', 'table');
  $('.article-box').css('display', 'none');
})


$('.tab-click > div:last-child').on('click',function(){
  $('.news-box').css('display', 'none');
  $('.article-box').css('display', 'table');
})



$('.vcs_brand-toggle').on('click',function(){
  $(this).toggleClass('vc_active');
  $('.top-menu').slideToggle();
})



if ($(window).width() < 991) {

$('.partner-box-first').click(function() {
$(this).closest('.tab-box').find('.partner-box').removeClass('partner-box-arrow');
$(this).closest('.tab-box').parent().find('.partner-box').removeClass('partner-box-arrow');
$(this).addClass('partner-box-arrow');
$(this).closest('.tab-box').find('.partner-box-text > div').css("display","none");
$(this).closest('.tab-box').parent().find('.partner-box-text > div').css("display","none");
$(this).closest('.tab-box').find('.partner-box > div').css("display","none");
$(this).closest('.tab-box').parent().find('.partner-box > div').css("display","none");
$(this).closest('.tab-box').find('.partner-box-text > div:nth-of-type(1)').not('.cloned').clone().appendTo($(this));
$(this).closest('.tab-box').find('.partner-box-text > div:nth-of-type(1)').not('.cloned').addClass('cloned');

$(this).closest('.tab-box').find('.partner-box-first > div').slideToggle();
//$(this).closest('.tab-box').find('.partner-box-text > div:nth-of-type(1)').slideToggle();
});

$('.partner-box-two').click(function() {
$(this).closest('.tab-box').find('.partner-box').removeClass('partner-box-arrow');
$(this).closest('.tab-box').parent().find('.partner-box').removeClass('partner-box-arrow');
$(this).addClass('partner-box-arrow');
$(this).closest('.tab-box').find('.partner-box-text > div').css("display","none");
$(this).closest('.tab-box').parent().find('.partner-box-text > div').css("display","none");
$(this).closest('.tab-box').find('.partner-box > div').css("display","none");
$(this).closest('.tab-box').parent().find('.partner-box > div').css("display","none");
$(this).closest('.tab-box').find('.partner-box-text > div:nth-of-type(2)').not('.cloned').clone().appendTo($(this));
$(this).closest('.tab-box').find('.partner-box-text > div:nth-of-type(2)').not('.cloned').addClass('cloned');

$(this).closest('.tab-box').find('.partner-box-two > div').slideToggle();
//$(this).closest('.tab-box').find('.partner-box-text > div:nth-of-type(2)').slideToggle();
});

$('.partner-box-tree').click(function() {
$(this).closest('.tab-box').find('.partner-box').removeClass('partner-box-arrow');
$(this).closest('.tab-box').parent().find('.partner-box').removeClass('partner-box-arrow');
$(this).addClass('partner-box-arrow');
$(this).closest('.tab-box').find('.partner-box-text > div').css("display","none");
$(this).closest('.tab-box').parent().find('.partner-box-text > div').css("display","none");
$(this).closest('.tab-box').find('.partner-box > div').css("display","none");
$(this).closest('.tab-box').parent().find('.partner-box > div').css("display","none");
$(this).closest('.tab-box').find('.partner-box-text > div:nth-of-type(3)').not('.cloned').clone().appendTo($(this));
$(this).closest('.tab-box').find('.partner-box-text > div:nth-of-type(3)').not('.cloned').addClass('cloned');

$(this).closest('.tab-box').find('.partner-box-tree > div').slideToggle();
//$(this).closest('.tab-box').find('.partner-box-text > div:nth-of-type(3)').slideToggle();
});

$('.partner-box-four').click(function() {
$(this).closest('.tab-box').find('.partner-box').removeClass('partner-box-arrow');
$(this).closest('.tab-box').parent().find('.partner-box').removeClass('partner-box-arrow');
$(this).addClass('partner-box-arrow');
$(this).closest('.tab-box').find('.partner-box-text > div').css("display","none");
$(this).closest('.tab-box').parent().find('.partner-box-text > div').css("display","none");
$(this).closest('.tab-box').find('.partner-box > div').css("display","none");
$(this).closest('.tab-box').parent().find('.partner-box > div').css("display","none");
$(this).closest('.tab-box').find('.partner-box-text > div:nth-of-type(4)').not('.cloned').clone().appendTo($(this));
$(this).closest('.tab-box').find('.partner-box-text > div:nth-of-type(4)').not('.cloned').addClass('cloned');

$(this).closest('.tab-box').find('.partner-box-four > div').slideToggle();
//$(this).closest('.tab-box').find('.partner-box-text > div:nth-of-type(4)').slideToggle();
});

}
else {

$('.partner-box-first').click(function() {
$(this).closest('.tab-box').find('.partner-box').removeClass('partner-box-arrow');
$(this).closest('.tab-box').parent().find('.partner-box').removeClass('partner-box-arrow');
$(this).addClass('partner-box-arrow');
$(this).closest('.tab-box').find('.partner-box-text > div').css("display","none");
$(this).closest('.tab-box').parent().find('.partner-box-text > div').css("display","none");

$(this).closest('.tab-box').find('.partner-box-text > div:nth-of-type(1)').slideToggle();
});

$('.partner-box-two').click(function() {
$(this).closest('.tab-box').find('.partner-box').removeClass('partner-box-arrow');
$(this).closest('.tab-box').parent().find('.partner-box').removeClass('partner-box-arrow');
$(this).addClass('partner-box-arrow');
$(this).closest('.tab-box').find('.partner-box-text > div').css("display","none");
$(this).closest('.tab-box').parent().find('.partner-box-text > div').css("display","none");

$(this).closest('.tab-box').find('.partner-box-text > div:nth-of-type(2)').slideToggle();
});

$('.partner-box-tree').click(function() {
$(this).closest('.tab-box').find('.partner-box').removeClass('partner-box-arrow');
$(this).closest('.tab-box').parent().find('.partner-box').removeClass('partner-box-arrow');
$(this).addClass('partner-box-arrow');
$(this).closest('.tab-box').find('.partner-box-text > div').css("display","none");
$(this).closest('.tab-box').parent().find('.partner-box-text > div').css("display","none");

$(this).closest('.tab-box').find('.partner-box-text > div:nth-of-type(3)').slideToggle();
});

$('.partner-box-four').click(function() {
$(this).closest('.tab-box').find('.partner-box').removeClass('partner-box-arrow');
$(this).closest('.tab-box').parent().find('.partner-box').removeClass('partner-box-arrow');
$(this).addClass('partner-box-arrow');
$(this).closest('.tab-box').find('.partner-box-text > div').css("display","none");
$(this).closest('.tab-box').parent().find('.partner-box-text > div').css("display","none");

$(this).closest('.tab-box').find('.partner-box-text > div:nth-of-type(4)').slideToggle();
});

}





$('.callpopup').click(function(e) {
e.preventDefault();
$('.popup').css("display","table");
});
$('.closeform').click(function(e) {
e.preventDefault();
$('.popup').css("display","none");
});


$('.butone').click(function() {

$(this).next('.butone-item').addClass('butone-item-active');
$(this).addClass('butone-active');
$(this).removeClass('butone');

});


$('.butone-active').click(function() {

$(this).next('.butone-item').addClass('butone-item-active');
$(this).removeClass('butone-active');
$(this).addClass('butone');


});


  $(".first-slider .owl-carousel").owlCarousel({
  	loop:true,
    nav:true,
    items:1
  });
  $(".cataloge-color .owl-carousel").owlCarousel({
  	loop:true,
    nav:true,
    items:6
  });

  $('.selectfile #button').click(function(){
   $("input[type='file']").trigger('click');
  })
    
  $(".selectfile input[type='file']").change(function(){
    $('#val').text(this.value.replace(/C:\\fakepath\\/i, ''))
  })  



  $('.class-stile').on('click', function() {


        if ( $(this).hasClass( "activered") ) { 
          $(this).toggleClass( "activered" );
          $('.class-stile-item').removeClass('activeitem');
          $('.cataloge-list-box').css('display','none');
        } else {
          $(this).toggleClass( "activered" );
          $('.cataloge-list-box').css('display','none');
          $('.class-stile-item').addClass('activeitem');
        }
if (!$('.cataloge-list .row > div').hasClass("activeitem")) {
    $('.cataloge-list-box').css('display','table');
}

});


$('.cantri-stile').on('click', function() {

        if ( $(this).hasClass( "activered") ) { 
          $(this).toggleClass( "activered" );
          $('.cantri-stile-item').removeClass('activeitem');
          $('.cataloge-list-box').css('display','none');
        } else {
          $(this).toggleClass( "activered" );
          $('.cataloge-list-box').css('display','none');
          $('.cantri-stile-item').addClass('activeitem');
        }

if (!$('.cataloge-list .row > div').hasClass("activeitem")) {
    $('.cataloge-list-box').css('display','table');
}

});




$('.zena-do80000').on('click', function() {

        if ( $(this).hasClass( "activered") ) { 
          $(this).toggleClass( "activered" );
          $('.zena-do80000-item').removeClass('activeitem');
          $('.cataloge-list-box').css('display','none');
        } else {
          $(this).toggleClass( "activered" );
          $('.cataloge-list-box').css('display','none');
          $('.zena-do80000-item').addClass('activeitem');
        }

if (!$('.cataloge-list .row > div').hasClass("activeitem")) {
    $('.cataloge-list-box').css('display','table');
}

});



$('.mat-shpon').on('click', function() {

        if ( $(this).hasClass( "activered") ) { 
          $(this).toggleClass( "activered" );
          $('.mat-shpon-item').removeClass('activeitem');
          $('.cataloge-list-box').css('display','none');
        } else {
          $(this).toggleClass( "activered" );
          $('.cataloge-list-box').css('display','none');
          $('.mat-shpon-item').addClass('activeitem');
        }

if (!$('.cataloge-list .row > div').hasClass("activeitem")) {
    $('.cataloge-list-box').css('display','table');
}

});












$('.sortirovka-class').on('click', function() {

        if ( $(this).hasClass( "activered") ) { 
          $(this).toggleClass( "activered" );
          $('.sortirovka-class-item').removeClass('activeitem');
          $('.sortirovka-item').css('display','none');
          $('.sortirovka-item').parent().removeClass('removewidth');
        } else {
          $(this).toggleClass( "activered" );
          $('.sortirovka-class-item').parent().addClass('activeitem');
          $('.sortirovka-item').parent().addClass('removewidth');
        }

if (!$('.owl-carousel .sortirovka-item').hasClass("activeitem")) {
    $('.sortirovka-item').css('display','table');
}

});





$('.sortirovka-cantri').on('click', function() {

        if ( $(this).hasClass( "activered") ) { 
          $(this).toggleClass( "activered" );
          $('.sortirovka-cantri-item').removeClass('activeitem');
          $('.sortirovka-item').css('display','none');
          $('.sortirovka-item').parent().removeClass('removewidth');
        } else {
          $(this).toggleClass( "activered" );
          $('.sortirovka-cantri-item').parent().addClass('activeitem');
          $('.sortirovka-item').parent().addClass('removewidth');
        }

if (!$('.owl-carousel .sortirovka-item').hasClass("activeitem")) {
    $('.sortirovka-item').css('display','table');
}

});
	$('#searchDoc button').attr('disabled',true);
	$('#searchDoc input').each(function () {
		$(this).keyup(function(){
			if($(this).val().length !=0) {
				$('#searchDoc button').attr('disabled', false);            
			} else {
				$('#searchDoc button').attr('disabled',true);
			}
		});
		})
    
		$("form#searchDoc button[type=submit]").click(function(e){
			$(this).attr("disabled", "disabled");
			$(this).val("Идет поиск...");

			var code = $(this).parent("form").find("input[name=code]").val();
			var lot = $(this).parent("form").find("input[name=lot]").val();
			
			var key; // Ключ для защиты от ботов
			$.ajax({
				type: "GET",
				url: "/documentation/get_key.php",
				data: {
					code  : code,
					lot  : lot
				},
				dataType: "TEXT",
				async: false,
				success: function(data){
					key = data;
				},
				error: function(data){
					console.log("Ajax запрос выполнен неудачно");
				}
			});

			$(this).parent("form").find("input[name=key]").val(key);
			
			$(this).parent("form").submit();

			e.preventDefault();
		});
});
$(function() {
    var load_more = false;

    $(window).scroll(function() {
        if($("#ajax_next_page").length && !load_more) {
            var url = $("#ajax_next_page").attr("href");
            var offset_button = $("#ajax_next_page").offset();
            if($(this).scrollTop() >= offset_button.top - $(window).height()) {
                load_more = true;
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {IS_AJAX: 'Y'},
                    success: function(data) {
                        $("#ajax_next_page").after(data);
                        $("#ajax_next_page").remove();
                        load_more = false;
                    }
                });
            }
        }
    });
});





