$(document).ready(function(){

	let form = $('#document_translate_form');
	let button = form.find('button');

	button.attr('disabled',true);
	form.find('input').each(function (i, e) {

		let self = $(e);

		//
		self.keyup(function () {

			if(self.val().length != 0) {

				button.attr('disabled', false);

			} else {

				button.attr('disabled',true);

			}

		});

	});

	//
	form.find("button[type=submit]").click(function (e) {

		//
		e.preventDefault();


		let self = $(this);

		self.attr("disabled", "disabled").val("Идет поиск...");


		let code = form.find("input[name=code]");
		let lot = form.find("input[name=lot]");
		let key = form.find("input[name=key]");


		$.ajax({
			type: "GET",
			url: form.attr('action'),
			data: {
				code: code.val(),
				lot: lot.val(),
				action: 'get_key'
			},
			dataType: "JSON",
			async: false,
			success: function (response) {

				// Ключ для защиты от ботов
				key.val(response.key);

				//
				form.submit();


				// Ключ для защиты от ботов
				key.val('');
				code.val('');
				lot.val('');

			},
			error: function (response) {

				alert(response.responseJSON.message + ': ' + response.responseJSON.errors);

			}
		});

	});

});