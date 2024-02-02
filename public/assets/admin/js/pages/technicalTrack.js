setInterval(function () {

    $.ajax({
        method:'post',
        url: location.origin+'/admin/track/technical/updateStatus',

        success: function ($response) {

            $('.badge-status').each(function () {

                $techId = $(this).attr('data-id');

                if ($techId in $response){
                    $(this).text('متصل').addClass('badge-success').removeClass('badge-danger')
                }else{
                    $(this).text('غير متصل').addClass('badge-danger').removeClass('badge-success')
                }

            })
        },
    })



}, 3000)
