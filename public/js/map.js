$(function() {



    let mymap = L.map('mapid').setView([51.505, -0.09], 5);

        L.tileLayer('https://api.mapbox.com/styles/v1/neokiller113/cjgpehvma00992sqmhyxveaa6/tiles/256/{z}/{x}/{y}@2x?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'pk.eyJ1IjoibmVva2lsbGVyMTEzIiwiYSI6ImNqZ2h2c2xxMzBsbm0ycWsxemJ6YnNpZXEifQ.PiGeZsNjVNyo1G80Y1KD4Q'
        }).addTo(mymap);




    $('#autocomplete-input').blur(function(e) {
        console.log(e.target.value);
        if (e.target.value.length >= 5) {
            //appel ajax
            console.log('ok');
            //tableau et affichage de la liste
            $.getJSON('http://api.wunderground.com/api/50a65432f17cf542/conditions/q/France/Lyon.json',function(data){
                console.log();
                $('<div id="message">'+data.current_observation.temp_c+'</div>').insertAfter($('#autocomplete-input').fadeIn(1000));
            });
        } else {
            //message si recherche imprécise
            $('<p id="message">veuillez affiner votre recherche</p>').insertAfter($('#autocomplete-input'));
            $('#message').fadeOut(4000);
        }
    });

    let popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent(e.latlng.toString())
            .openOn(mymap);
    }

    mymap.on('click', onMapClick);

    let latitude = $('input#observe_latitude');
    let longitude = $('input#observe_longitude');

    function success(pos) {

       let cLat = pos.coords.latitude;
       latitude.val(cLat);

       let cLong = pos.coords.longitude;
       longitude.val(cLong);


       mymap.flyTo([cLat,cLong], 10);

       let marker = L.marker([cLat,cLong]);
       marker.addTo(mymap);

    };

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
    };

    let geo = navigator.geolocation;
    geo.getCurrentPosition(success,error,{maximumAge:10000,enableHighAccuracy:true});


});