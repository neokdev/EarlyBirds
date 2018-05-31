/*create array:*/
var marker = new Array();

/*pushing items into array each by each and then add markers*/
function itemWrap(coords) {
    markerDelAgain();
    var lamMarker = L.marker(coords).addTo(mymap);
    lamMarker.addTo(mymap);
    marker.push(lamMarker);


}

/*Going through these marker-items again removing them*/
function markerDelAgain() {
    for(i=0;i<marker.length;i++) {
        mymap.remove(marker[i]);
    }
}

function onMapClick(e) {

    let coords = e.latlng;
    console.log(coords);
    itemWrap(coords);

};


mymap.on('click', onMapClick);