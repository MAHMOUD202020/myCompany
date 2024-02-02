$(function () {

    var customersLocations = JSON.parse($('#map').attr('data-locations'));

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: new google.maps.LatLng($lat, $long),
        mapTypeId: google.maps.MapTypeId.HYBRID,
    });

    var infowindow = new google.maps.InfoWindow();

    var marker = {}, i;

    saveMarker()


    let index= 1;
    let clearIntervalType = false;

    $('#nextMarker').on('click', function () {

        addAndRemoveActive(this);

        nextMarker()
    })
    $('#prevMarker').on('click', function () {

        addAndRemoveActive(this);

        prevMarker()
    })

    $('#playMarker').on('click', function () {

        if ($(this).hasClass('active') != true){
            addAndRemoveActive(this);

            clearIntervalType = false;

            markerInterval =  setInterval(function () {

                if (clearIntervalType === true) {
                    clearInterval(markerInterval);
                }else {
                    nextMarker()
                }

            }, 1000)
        }
    })

    $('#stopMarker').on('click', function () {

        addAndRemoveActive(this);

        clearIntervalType = true;

    })

    function nextMarker(){

        $marker = marker[(index+1)]

        if (jQuery.type($marker) !== 'undefined'){
            index++
        }else{
            index = 1;
        }

        moveMarker()
    }

    function prevMarker(){


        $marker = marker[index-1]

        if (jQuery.type($marker) !== 'undefined' && (index-1) !== 0){
            index--
        }else{
            index = customersLocations.length;
        }

        moveMarker()
    }

    function moveMarker(){


        let markerNow = marker[index]
        let lat = markerNow.getPosition().lat();
        let lng = markerNow.getPosition().lng();


        var NewLatLng = new google.maps.LatLng(lat, lng);

        map.setCenter(NewLatLng)

        marker[0].setPosition(NewLatLng);
    }



    function addAndRemoveActive($this) {
        $('.btn-map').removeClass('active')
        $($this).addClass('active')
    }
    function saveMarker(){

        marker[0] = new google.maps.Marker({
            position: new google.maps.LatLng($lat, $long),
            map: map,
            icon:window.origin+'/assets/admin/images/map/pin-active.png',
            label:{
                text: $name,
                className: 'marker-label',
            },
        });

        for (i = 0; i < customersLocations.length; i++) {

            marker[i+1] = new google.maps.Marker({
                position: new google.maps.LatLng(customersLocations[i]['lat'], customersLocations[i]['long']),
                map: map,
                icon:window.origin+'/assets/admin/images/map/pin.png',
                label:{
                    text:`${i+1}`,
                    className: 'marker-label-number',
                },
            });

            let infoWindowContent = `<div class="infowindow"> ${customersLocations[i]['time']}</div>`

            google.maps.event.addListener(marker[i+1], 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(infoWindowContent);
                    infowindow.open(map, marker);
                }
            })(marker[i+1], i));

        }

    }

})
