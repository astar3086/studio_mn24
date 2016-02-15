jQuery(document).ready(function(){

	jQuery('#registerButton').on('click', function(event){
		//eMailValidation()
		jQuery.ajax({
			type: "POST",
			url: jQuery('#registerForm').attr("action"),
			cache: false,
			data: jQuery('#registerForm').serialize(),
			dataType: 'json',
			success: function(data)
			{
				if(data.code == true)
				{
					location.reload();
				}
				else
				{
					switch(data.code) {
						case -3:
							bootbox.alert('Не заполнены обязательные поля!');
						break;
						case -4:
							bootbox.alert('Такой Email уже существует');
						break;
						case -1:
                            bootbox.alert('Пароли не совпадают!');
                        break;
						case -2:
							bootbox.alert('Системная ошибка!');
						break;
					}

				}

			},
			error: function ()
			{

			}
		});
		//event.preventDefault();
		return false;
	});
});
function eMailValidation()
{
	var email = document.getElementById('email');
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	if (!filter.test(email.value)) {
		//alert('Please provide a valid email address');
		email.focus;
		return false;
	}
}