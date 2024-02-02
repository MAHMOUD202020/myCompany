let transfer_url = '' ;

let idTechnicalNow = '' ;

$('.transferCustomers').on('click', function (e) {

    e.preventDefault();

    $(this).parents('tr').addClass('active')

    transfer_url = $(this).attr('href');

    idTechnicalNow = $(this).parents('tr').find('.technical-info').attr('data-id');

    $('#technicalsModal').modal('show')
})

$('#technicalsModal .save').on('click', function () {

    selectValue = $('#technicals-select').selectpicker('val');

    $thisButton = $(this);


    if (selectValue == false) {

        alert(' من فضلك قم بتحديد الفني اولا قبل الحفظ')
        return false;
    }

    if (selectValue == idTechnicalNow) {

        alert('هاذا الفني خاص بهاذا العميل بالفعل')
        return false;
    }

    $.ajax({
        method: 'post',
        url: transfer_url,
        data: {'to_technical': selectValue},
        success($response) {

            if ($response.status === 'success') {

                swal({
                    title: 'عملية ناجه',
                    text: $response.message,
                    type: 'success',
                    padding: '2em'
                })

                let rowActiveNow = $('.table-customers tr.active');
                rowActiveNow.find('.technical-info').text($response.newTechnical.name).attr('data-id', $response.newTechnical.id)
                rowActiveNow.removeClass('active')
                rowActiveNow.find('.transferCustomers').attr('href', $response.newUrl)

                if ($response.sort_count > 0) {

                    if (confirm('تم ترتيب خط سير الفني الذي تم "نقل العميل اليه" بشكل يدوي من قبل احد المشرفين وفي هذه الحالة يجب اعادة ترتيب هاذه الزياره بشكل يدوي او اعادة الترتيب جميع الزياره في خط السير بشكل تلقائي - هل تريد اعادة ترتيب جميع الزيارات بشكل تلقائي ؟')) {
                        $.ajax({
                            method: 'post',
                            url: location.origin + '/admin/itinerary/reset/' + $response.newTechnical.employee_code,
                        })
                    }
                }

            }// end status success

            else {
                swal({
                    title: 'فشل النقل',
                    text: $response.message,
                    type: 'error',
                    padding: '2em'
                })
            } // end status error

        }, // end status success request

    })

    $('#technicalsModal').modal('hide')

    transfer_url = '';

    idTechnicalNow = '';

})
