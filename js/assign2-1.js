function enhanceImg(imgID) {
	var img = document.getElementById(imgID);
	img.style.transform = "scale(1.2)";
};

function resetImg(imgID) {
	var img = document.getElementById(imgID);
	img.style.transform = "scale(1)";
};

function openImg(imgID) {

	mainImg = document.getElementById("main-img");
	mainTitle = document.getElementById("main-img-title");

	if(imgID == "similar-img-1") {

		mainImg.src = "img/medium/113010.jpg";
		mainTitle.innerHTML = "Self-portrait in a Straw Hat";

	} else if(imgID == "similar-img-2") {

		mainImg.src = "img/medium/116010.jpg";
		mainTitle.innerHTML = "Artist Holding a Thistle";

	} else if(imgID == "similar-img-3") {

		mainImg.src = "img/medium/120010.jpg";
		mainTitle.innerHTML = "Portrait of Eleanor of Toledo";
		
	} else if(imgID == "similar-img-4") {

		mainImg.src = "img/medium/106020.jpg";
		mainTitle.innerHTML = "Girl with a Pearl Earring";
		
	}

};