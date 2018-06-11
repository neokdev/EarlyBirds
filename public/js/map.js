$(function() {

    let mymap = L.map('mapid').setView([51.505, -0.09], 5);

        L.tileLayer('https://api.mapbox.com/styles/v1/neokiller113/cjgpehvma00992sqmhyxveaa6/tiles/256/{z}/{x}/{y}@2x?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'pk.eyJ1IjoibmVva2lsbGVyMTEzIiwiYSI6ImNqZ2h2c2xxMzBsbm0ycWsxemJ6YnNpZXEifQ.PiGeZsNjVNyo1G80Y1KD4Q'
        }).addTo(mymap);

    $('#observe_ref').keyup(function() {
        if ($('#observe_ref').val().length > 3) {
            //ajax call
            $.getJSON(
                'http://127.0.0.1:8000/recherche-'+$('#observe_ref').val(),
                function(data) {
                    //reading of the json object as a table
                    //and implementation under the field
                    $('<ul id="birdsList"></ul>').insertAfter($('#observe_ref').fadeIn(1000));
                    let birdsID = 0;
                    data.forEach(function(datas) {
                        birdsID++;
                        $('<li id="birds'+ birdsID +'">'+ datas.nomVern +'</li>').insertAfter(
                            $('#birdsList').fadeIn(1000)
                        );
                    });
                    //select value from the li, put it in input field and destroy ul list
                    let liId = $('#birdsList ~ li');
                    for (let i = 0 ; i < liId.length; i++) {
                        let idAttr = $(liId[i]);
                        $(idAttr).click(function () {
                            let value = $(idAttr).text();
                            let input = $('#observe_ref');
                            input.val(value);
                            $('#birdsList ~ li').remove();
                        });
                    }
                }
            );
        } else {
            //message si recherche imprécise
            $('<ul id="birdsList"><li id="message">veuillez affiner votre recherche</li></ul>').insertAfter($('#observe_ref'));
            $('#birdsList').fadeOut(4000);
        }
    });

//INIT_GEOLOCATION
    let latitude = $('input#observe_latitude');
    let longitude = $('input#observe_longitude');

    function success(pos) {
       let cLat = pos.coords.latitude;
       latitude.val(cLat);

       let cLong = pos.coords.longitude;
       longitude.val(cLong);

       mymap.flyTo([cLat,cLong], 10);
    }

    function error(err) {
        switch (err.code) {
            case err.TIMEOUT:
                cLat.val('temps de chargement dépassé');
                cLong.val('temps de chargement dépassé');
                break;

            case err.PERMISSION_DENIED:
                cLat.val('permission désaprouvée');
                cLong.val('permission désaprouvée');
                break;

            case err.POSITION_UNAVAILABLE:
                cLat.val('position indéterminée');
                cLong.val('position indéterminée');
                break;

            case err.UNKNOWN_ERRROR:
                cLat.val('erreur inconnue');
                cLong.val('erreur inconnue');
                break;
        }
    }

    let geo = navigator.geolocation;
    geo.getCurrentPosition(success,error,{maximumAge:10000,enableHighAccuracy:true});

//END_GEOLOCATION

//SET_UP_POSITION_ON_MAP_AFTER_CLICK
    let layer;

    function newMarker(e) {


        if (layer === undefined) {
            layer = L.marker(e.latlng).addTo(mymap);
            layer.addTo(mymap);

            let cLat = e.latlng.lat;
            latitude.val(cLat);

            let cLong = e.latlng.lng;
            longitude.val(cLong);
        }

        layer.remove();
        layer = L.marker(e.latlng).addTo(mymap);
        layer.addTo(mymap);

        let cLat = e.latlng.lat;
        latitude.val(cLat);

        let cLong = e.latlng.lng;
        longitude.val(cLong);

        return layer;
    }

    mymap.on('click', newMarker);

//END_SET_UP_POSITION_ON_MAP_AFTER_CLICK

//SET_UP_COORDS_FROM_FORM
    longitude.on('blur',function () {
        let lat = latitude.val();
        let long = longitude.val();

        console.log([lat,long]);

        if (layer === undefined) {

            layer = L.marker([lat,long]).addTo(mymap);
            layer.addTo(mymap);

        }
        layer.remove();
        layer = L.marker([lat,long]).addTo(mymap);
        layer.addTo(mymap);
    });

    latitude.on('blur', function () {
        let lat = latitude.val();
        let long = longitude.val();

        if (layer === undefined) {

            layer = L.marker([lat,long]).addTo(mymap);
            layer.addTo(mymap);

        }

        layer.remove();
        layer = L.marker([lat,long]).addTo(mymap);
        layer.addTo(mymap);
    });

});