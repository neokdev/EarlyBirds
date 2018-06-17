$(function() {

    let mymap = L.map('map')
                 .setView([51.505,
                           -0.09],
                          5
                 );

    L.tileLayer('https://api.mapbox.com/styles/v1/neokiller113/cjgpehvma00992sqmhyxveaa6/tiles/256/{z}/{x}/{y}@2x?access_token={accessToken}',
                {
                    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
                    maxZoom: 18,
                    id: 'mapbox.streets',
                    accessToken: 'pk.eyJ1IjoibmVva2lsbGVyMTEzIiwiYSI6ImNqZ2h2c2xxMzBsbm0ycWsxemJ6YnNpZXEifQ.PiGeZsNjVNyo1G80Y1KD4Q'
                }
    )
     .addTo(mymap);

    //INIT_GEOLOCATION
    let latitude = $('input#observe_latitude');
    let longitude = $('input#observe_longitude');

    function success(pos) {
        let cLong = pos.coords.longitude;
        let cLat = pos.coords.latitude;

        if(longitude.val() === "" && latitude.val() === "") {
            latitude.val(cLat);
            longitude.val(cLong);
        }
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

});