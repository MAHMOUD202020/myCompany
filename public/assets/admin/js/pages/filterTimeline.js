$(function () {

    $('body').on('keyup', '.customers input', function () {

        if ($(this).val().length > 0) {
            $.ajax({
                method: 'post',
                dataType: 'json',
                url: "ajax_get_customers",
                data: {
                    _token: $('meta[name=csrf-token]').attr('content'),
                    'customer': $(this).val()
                },
                success(response) {

                    $options = [];

                    $.each(response.data, function ($key, $value) {
                        $options.push(`<option value="${$value.CustomerID}"> ${$value.CustomerID} - ${$value.CustomerAraName}</option>`)
                    })

                    $('.active.show .customers-select-search').html($options)
                }
            })
        } else {

            $('.active.show .customers-select-search').html('')
        }
    })
})
