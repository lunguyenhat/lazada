function initMap() {
    
    const params = Joomla.getOptions('params');
    const mapCentre = { lat: Number(params.latitude), lng: Number(params.longitude) };
    
    // Define the types of maps which can be shown, eg road, satellite
    var mapTypeIds = [];
    for (var type in google.maps.MapTypeId) {
        mapTypeIds.push(google.maps.MapTypeId[type]);
    }
    
    // Now draw the map
    var map = new google.maps.Map(document.getElementById('map'), {
        center: mapCentre, 
        zoom: Number(params.zoom), 
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControlOptions: { mapTypeIds: mapTypeIds }, streetViewControl: false, scrollwheel: true, gestureHandling: 'cooperative' 
    });
    
    // Add a marker at the position in the helloworld record
    var marker = new google.maps.Marker({ 
        position: mapCentre, 
        map: map, 
        title: 'Click here to see the helloworld greeting',
    });
    
    // Finally add an info window which displays the greeting when the map marker is clicked
    var infoWindow = new google.maps.InfoWindow({});
    marker.addListener('click', function() {
        infoWindow.setContent(params.greeting);
        infoWindow.open(map, marker);  
    });
}