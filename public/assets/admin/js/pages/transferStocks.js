$('body').on('click', '.transfer', function (e) {

    e.preventDefault();

    $columns = $(this).parents('tr');

    $thisButton = $(this);

    type = $(this).attr('data-type'); // get  button  click

    $message = type === 'accept' ? 'هل انت متاكد من موافقتك علي هاذا الطلب' : 'هل انت متاكد من رفضك لهاذا الطلب' ;

    swal({ // start swal (sweat alert)
        title: $message,
        text: ` ${$columns.find('.transfer-item').text()} من الفني ${$columns.find('.transfer-from-technical').text()} الي الفني ${$columns.find('.transfer-to-technical').text()}`,
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
