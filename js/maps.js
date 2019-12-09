function initMap(lat, lng) {
    //membuat objek untuk titik koordinat
    var marker = {
        lat: lat,
        lng: lng
    };

    var mapDetails = {
        zoom: 9,
        center: marker,
        mapTypeId: 'roadmap'
    }

    //membuat objek peta
    var map = new google.maps.Map(document.getElementById("mapsGoogle"), mapDetails);

    // Marker
    var marker = new google.maps.Marker({
        position: marker,
        map: map,
        animation: google.maps.Animation.BOUNCE
    });
}
google.maps.event.addDomListener(window, 'load', initMap(lat, lng));