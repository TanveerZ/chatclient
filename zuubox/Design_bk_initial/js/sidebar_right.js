$(function(){
	var $map = $('.sidebar_r .map');

	function initMap() {
		var center = [25.782741, -80.224444]
		var center = {lat: center[0], lng: center[1]};
		var map = new google.maps.Map($map[0], {
			zoom: 10,
			center: center,
			mapTypeId: 'roadmap',
			zoomControl: true,
			mapTypeControl: false,
			scaleControl: false,
			streetViewControl: false,
			rotateControl: false,
			fullscreenControl: false
		});
		/*var marker = new google.maps.Marker({
			position: center,
			map: map
		});*/
	}

	$(window).load(initMap);
});