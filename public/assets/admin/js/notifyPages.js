$(function () {


    Echo.channel('events')
        .listen('RemoveNotify', (e) => {

            table = $(".table-customers tbody");



            $("#row-"+e.row_id).hide(500, _=>{$(this).remove()})

            ///////////////////// replace ul //////////////

            ulCount = $('#notify-count');

            ulCountNumber = parseInt(ulCount.attr('data-count'));

            ulCount.text(`(${ulCountNumber - 1})`).addClass('text-warning').attr('data-count', ulCountNumber - 1);

            ///////////////////// replace li //////////////

            liCount = $('#li-'+ e.notify_type+' .count');

            liCountNumber = parseInt(liCount.attr('data-count'));

            liCount.text(`(${liCountNumber - 1})`).addClass('text-warning').attr('data-count', liCountNumber - 1);


            $('#hideNotify')[0].play()

            if (table.find('tr').length === 1){
                // setTimeout(function () {
                    table.append('<tr> <td colspan="12"><div class="alert alert-info">لم تعد هناك اي اشعارات</div></td></tr>')
                // }, 2000)
            }
        });


    Echo.channel('events')
        .listen('CreateNotify', (e) => {

            table = $(".table-customers tbody");


            if (table.find('.alert.alert-info').length <= 0){
                table.append(e.row)
            }else {
                table.html(e.row)
            }

            ///////////////////// replace ul //////////////

            ulCount = $('#notify-count');

            ulCountNumber = parseInt(ulCount.attr('data-count'));

            ulCount.text(`(${ulCountNumber + 1})`).addClass('text-warning').attr('data-count', ulCountNumber + 1);

            ///////////////////// replace li //////////////

            liCount = $('#li-'+ e.notify_type+' .count');

            liCountNumber = parseInt(liCount.attr('data-count'));

            liCount.text(`(${liCountNumber + 1})`).addClass('text-warning').attr('data-count', liCountNumber + 1);

        });
})
