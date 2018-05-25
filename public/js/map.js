$(function() {

    let mymap = L.map('mapid').setView([51.505, -0.09], 13);

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

});