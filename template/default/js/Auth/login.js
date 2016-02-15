jQuery(document).ready(function(){

	$("#menu").on("click","a", function (event) {
		//отменяем стандартную обработку нажатия по ссылке
		event.preventDefault();

		//забираем идентификатор бока с атрибута href
		var id  = $(this).attr('href'),

		//узнаем высоту от начала страницы до блока на который ссылается якорь
				top = $(id).offset().top -40;

		//анимируем переход на расстояние - top за 1500 мс
		$('body,html').animate({scrollTop: top}, 1500);
	});

	jQuery('#loginButton').on('click', function(event){
		event.preventDefault();

		jQuery.ajax({
			type: "POST",
			url: jQuery('#loginForm').attr("action"),
			cache: false,
			data: jQuery('#loginForm').serialize(),
			dataType: 'json',
			success: function(data)
			{
				if(data.code)
				{
					switch (data.code) {
						case -1:
							bootbox.alert('Email not found!');
						break;
						case -2:
							bootbox.alert('Wrong Password!');
						break;
						case -3:
							bootbox.alert('You have no permissions!');
						break;
						case true:
							location.reload();
						break;
					}
				}
			},
			error: function ()
			{
				bootbox.alert('Ajax Login error');
			}
		});

		return false;
	});

	jQuery('#ExitBtn').on('click', function(event){
		jQuery.ajax({
			type: "POST",
			url: jQuery(this).attr("data-url"),
			cache: false,
			dataType: 'json',
			success: function(data)
			{
				if(data.code == 1)
				{
					location.reload();
				}
				else
				{
					bootbox.alert('Logout error');
				}
			},
			error: function ()
			{
				bootbox.alert('Ajax Login error');
			}
		});
	});

});
