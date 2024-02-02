$(function () {

    var customersLocations = JSON.parse($('#locations').attr('data-locations'));
    console.log(customersLocations)
    var map = new google.maps.Map(document.getElementById('mapSingle'), {
        zoom: 10,
        center: new google.maps.LatLng($lat, $long),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    });

    var infowindow = new google.maps.InfoWindow();

    var marker = {}, i;

    saveMarker()


    let alertMap = $('#alert-status-map');

    setInterval(function () {

        $.ajax({
            method:'post',
            url: location.origin+'/admin/track/technical/updateMap',
            data:{'technical_id': $technical_id},

            success: function ($response) {

                var NewLatLng = new google.maps.LatLng($response['lat'], $response['long']);

                oldCenter = map.getCenter()

                if (oldCenter.lat() == 0 && oldCenter.lng() == 0){
                    map.setCenter(NewLatLng)
                }

                marker[0].setPosition(NewLatLng);

                if ($response['lat'] === undefined || $response['long'] === undefined)
                    alertMap.removeClass('d-none')
                else
                    alertMap.addClass('d-none')
            },
        })



    }, 3000)

    function saveMarker(){

        marker[0] = new google.maps.Marker({
            position: new google.maps.LatLng($lat, $long),
            map: map,
            icon:window.origin+'/assets/admin/images/map/delivery-man.png',
            label:{
                text: $name,
                className: 'marker-label',
            },
        });

        for (i = 0; i < customersLocations.length; i++) {

            marker[customersLocations[i]['id']] = new google.maps.Marker({
                position: new google.maps.LatLng(customersLocations[i]['location']['lat'], customersLocations[i]['location']['long']),
                map: map,
                icon:window.origin+'/assets/admin/images/map/home.png',
            });

            let infoWindowContent = `<div class="infowindow">
اسم العميل :   ${customersLocations[i]['name']} <br>
العنوان :  ${customersLocations[i]['address']} <br>
  الهاتف :${customersLocations[i]['phone']}
 الخدمه : ${customersLocations[i]['service']}
</div>`

            google.maps.event.addListener(marker[customersLocations[i]['id']], 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(infoWindowContent);
                    infowindow.open(map, marker);
                }
            })(marker[customersLocations[i]['id']], i));

        }

    }

})
