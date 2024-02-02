$(function () {

    var locations = JSON.parse($('#map').attr('data-locations'));

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: new google.maps.LatLng(30.0899081, 31.4282973),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        title : 'test'
    });

    var infowindow = new google.maps.InfoWindow();

    var marker = {}, i;

    saveMarker(locations);

    let alertCount = $('#alert-count-map')

    setInterval(function () {

        $.ajax({
            method:'post',
            url: location.origin+'/admin/dashboard/updateMap',

            success: function ($response) {

                responseCount =  Object.keys($response).length

                // replace position technical and remove technical not active
                $.each(marker, function ($key, $value) {


                    if ($key !== '__e3_') {

                        // if technical active replace position
                        if ($response[$key]) {

                            var NewLatLng = new google.maps.LatLng($response[$key]['lat'], $response[$key]['long']);

                            marker[$key].setPosition(NewLatLng);

                            delete $response[$key]

                            // if not active remove in map
                        } else {
                            console.log('delete marker')
                            marker[$key].setPosition(null);
                            delete marker[$key]
                        }

                    }

                })

                newLocations = [];

                $.each($response, function ($key, $value) {
                    newLocations.push($value)
                });


                saveMarker(newLocations);

                if (responseCount > 0){
                    alertCount.removeClass('alert-danger').addClass('alert-primary').text("عدد الفنين المتصلين حاليا :  " + responseCount)
                }else {
                    alertCount.removeClass('alert-primary').addClass('alert-danger').text('لا يوجد اي فني متصل')
                }
            },
        })

    }, 3000)



    function saveMarker(locations){


        for (i = 0; i < locations.length; i++) {
            $location =  locations[i];

            marker[$location['id']] = new google.maps.Marker({
                position: new google.maps.LatLng($location['lat'], $location['long']),
                map: map,
                icon:window.origin+'/assets/admin/images/map/delivery-man.png',
                label:{
                    text: $location['name'],
                    className: 'marker-label',
                },

            });
            let infowindowData = `<div class="infowindow"><a href="${$location['url']}"> ${$location['name']} <br> ${$location['phone']} <br> ${$location['phone2'] ? $location['phone2'] : ''}</a></div>`;

            google.maps.event.addListener(marker[$location['id']], 'click', (function(marker, number) {
                return function() {
                    infowindow.setContent(infowindowData);
                    infowindow.open(map, marker);
                }
            })(marker[$location['id']], i));

        }

    }
})
