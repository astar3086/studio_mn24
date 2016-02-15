var skObj1;
var skObj2;

jQuery(document).ready(function(){

    jQuery('#editForm').on('submit',function(event){
        event.preventDefault();
        var submitForm = jQuery('#editForm');

        var Obj =
        {
            price:submitForm.find('input[name=price]').val(),
            date_pay:submitForm.find('input[name=date_pay]').val(),
            iduser:submitForm.find('select[name=user]').val(),
            iduser_credit:submitForm.find('select[name=credit]').val()
        };

        jQuery.ajax({
            cache:false,
            data:Obj,
            type:jQuery(this).attr('method'),
            url:jQuery(this).attr('action'),
            dataType:'json',
            success: function(data)
            {
                switch(data.code)
                {
                    case -1:
                        bootbox.alert('System error. Some data not saving');
                        break;
                    case 0:
                        bootbox.alert('Успешно сохранен',function()
                        {
                            window.location.href = "/admin/Payments/Index";

                        });
                        break;

                }

            },
            error:function(msg)
            {
                bootbox.alert('Network error');
            }
        });

        return false;
    });


});