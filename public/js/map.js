$(function() {

    let mymap = L.map('mapid').setView([51.505, -0.09], 13);

    L.tileLayer('https://api.mapbox.com/styles/v1/neokiller113/cjgpehvma00992sqmhyxveaa6/tiles/256/{z}/{x}/{y}@2x?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoibmVva2lsbGVyMTEzIiwiYSI6ImNqZ2h2c2xxMzBsbm0ycWsxemJ6YnNpZXEifQ.PiGeZsNjVNyo1G80Y1KD4Q'
    }).addTo(mymap);





    $('#autocomplete-input').keypress(function (e) {
        let letter = String.fromCharCode(e.which);
        let word = '';
        word += letter;
        console.log(word);
    });


});