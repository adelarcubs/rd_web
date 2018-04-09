var trackCookieName = 'adelarTrack';

function guid() {
	function s4() {
		return Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
	}
	return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
}

if(!document.cookie){
	document.cookie = trackCookieName + "=" + guid();
}

var xhttp = new XMLHttpRequest();
xhttp.open("POST", "https://secret-hamlet-70870.herokuapp.com/track", true);
xhttp.send('{"trackCode":"' + document.cookie + '","URL":"'+ document.URL +'"}');
