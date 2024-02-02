
$('body').on('click', '.notifyVisit', function (e) {

    e.preventDefault();

    $columns = $(this).parents('tr');

    $thisButton = $(this);

    type = $(this).attr('data-type'); // get  button  click

    $message = type === 'accept' ? 'هل انت متاكد من تاكيدك لطلب عودة امر الشغل' : 'هل انت متاكد من رفضك  لطلب عودة امر الشغل'; // message alert

    swal({ // start swal (sweat alert)
        title: $message,
        text: `طلب تاكيد علي عودة امر الشغل للفني${$columns.find('.visit-technical').text()} للعميل ${$columns.find('.visit-customer').text()} `,
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'تاكيد الطب',
        padding: '2em'

    }).then(function(json_data) {

        if (json_data == true) { // check trigger button

            $.ajax({
                method: 'post',
                url: $thisButton.attr('href'),
                data: {'type': type},

                success($response){

                    if ($response.status === 'success') {


                        swal({
                            title: 'عملية ناجه',
                            text: $response.message,
                            type: 'success',
                            padding: '2em'
                        })

                        $thisButton.parents('tr').hide(750, function () {
                            $(this).remove()
                        })

                        if ($response.sort_count > 0 && $response.type === 'accept'){

                            if (confirm('تم ترتيب خط سير الفني بشكل يدوي من قبل احد المشرفين وفي هذه الحالة يجب اعادة ترتيب هاذه الزياره بشكل يدوي او اعادة الترتيب جميع الزياره في خط السير بشكل تلقائي - هل تريد اعادة ترتيب جميع الزيارات بشكل تلقائي ؟'))
                            {
                                $.ajax({
                                    method: 'post',
                                    url: location.origin+'/admin/itinerary/reset/'+$response.technical_code,
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

            }) // end ajax

        } // end status trigger button

    }); // end swal

})// end on click




