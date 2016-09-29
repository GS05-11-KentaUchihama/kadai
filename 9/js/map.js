function initMap (){
	var lat1 = localStorage.getItem(1);
	var lng2 = localStorage.getItem(2);

	new google.maps.Map(document.getElementById('map'), {
		 center: new google.maps.LatLng(lat1, lng2), //緯度,経度を設定
		 zoom: 10 //Zoom値設定
	});
}
