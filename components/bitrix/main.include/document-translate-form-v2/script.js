$(document).ready(function(){

	let form = $('#document_translate_form');
	let button = form.find('button[type=submit]');

	/*button.attr('disabled',true);
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

	});*/

	//
	button.click(function (e) {

		//
		e.preventDefault();


		let self = $(this);

		self/*.attr("disabled", "disabled")*/.val("Идет поиск...");


		let code = form.find("input[name=code]");
		let lot = form.find("input[name=lot]");
		let key = form.find("input[name=key]");
		let file_name = form.find("input[name=file_name]");

		//
		let data = new FormData(form.get(0));
		data.append('action', 'get_key');


		$.ajax({
			type: 'POST',
			url: form.attr('action'),
			contentType: false,
			processData: false,
			dataType: "JSON",
			data: data,
			success: function (response) {

				if (response.key) {

					// Ключ для защиты от ботов
					key.val(response.key);
				}


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