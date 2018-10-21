   	function initMap() {
   	  var latLong = new google.maps.LatLng(-33.98056, 18.46528);
   	  var mapOptions = {
   	    zoom: 13,
   	    center: latLong,
   	    styles: [{
   	      "featureType": "landscape",
   	      "stylers": [{
   	        "saturation": -100
   	      }, {
   	        "lightness": 65
   	      }, {
   	        "visibility": "on"
   	      }]
   	    }, {
   	      "featureType": "poi",
   	      "stylers": [{
   	        "saturation": -100
   	      }, {
   	        "lightness": 51
   	      }, {
   	        "visibility": "simplified"
   	      }]
   	    }, {
   	      "featureType": "road.highway",
   	      "stylers": [{
   	        "saturation": -100
   	      }, {
   	        "visibility": "simplified"
   	      }]
   	    }, {
   	      "featureType": "road.arterial",
   	      "stylers": [{
   	        "saturation": -100
   	      }, {
   	        "lightness": 30
   	      }, {
   	        "visibility": "on"
   	      }]
   	    }, {
   	      "featureType": "road.local",
   	      "stylers": [{
   	        "saturation": -100
   	      }, {
   	        "lightness": 40
   	      }, {
   	        "visibility": "on"
   	      }]
   	    }, {
   	      "featureType": "transit",
   	      "stylers": [{
   	        "saturation": -100
   	      }, {
   	        "visibility": "simplified"
   	      }]
   	    }, {
   	      "featureType": "administrative.province",
   	      "stylers": [{
   	        "visibility": "off"
   	      }]
   	    }, {
   	      "featureType": "water",
   	      "elementType": "labels",
   	      "stylers": [{
   	        "visibility": "on"
   	      }, {
   	        "lightness": -25
   	      }, {
   	        "saturation": -100
   	      }]
   	    }, {
   	      "featureType": "water",
   	      "elementType": "geometry",
   	      "stylers": [{
   	        "hue": "#ffff00"
   	      }, {
   	        "lightness": -25
   	      }, {
   	        "saturation": -97
   	      }]
   	    }]
   	  };

   	  var mapElement = document.getElementById('map-pop');
   	  var map = new google.maps.Map(mapElement, mapOptions);

   	  var marker = new google.maps.Marker({
   	    position: latLong,
   	    map: map,
   	    title: '22 Digital'
   	  });
   	}
