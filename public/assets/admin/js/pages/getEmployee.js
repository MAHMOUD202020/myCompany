let inp_name = $('form #name');
let inp_phone = $('form #phone');

$('form #employee_code').on('keyup', function () {

    $.ajax({
        method: 'post',
        dataType: 'json',
        url: "ajax_get_employee",
        data: {
            _token: $('meta[name=csrf-token]').attr('content'),
            'employee_code': $(this).val()
        },

        beforeSend(){
            inp_name.val('')
            inp_phone.val('')
        },

        success($response){
            if ($response.employee) {
                inp_name.val($response.employee.name)
                inp_phone.val($response.employee.phone)
            }
        }
    })

})
