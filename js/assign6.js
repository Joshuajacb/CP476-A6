$(document).ready(function() {
	
	if(top.location.pathname === '/browse-paintings.php') {
		var ajax = new XMLHttpRequest();
		var method = "GET";
		var url = "listInfo.php";
		var asynchronous = true;

		ajax.open(method, url, asynchronous);
		ajax.send();

		ajax.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200) {
				var data = JSON.parse(this.responseText);
				//console.log(data);

				var namesList = document.getElementById(inputArtist);
				var museumList = document.getElementById(inputMuseum);
				var shapesList = document.getElementById(inputShape);

				for(var i = 0; i < data.length; i++) {

					namesList.append('<option value="' + data[i].ArtistID + '">"' + data[i].LastName + '"</option>');
					museumList.append('<option value="' + data[i].GalleryID + '">"' + data[i].GalleryName + '"</option>');
					shapesList.append('<option value="' + data[i].ShapeID + '">"' + data[i].ShapeName + '"</option>');

				}
			}
		}
	}

});