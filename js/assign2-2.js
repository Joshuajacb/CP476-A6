function formValidation() {

	var fn = document.getElementById('fname').value;
	var ln = document.getElementById('lname').value;
	var email = document.getElementById('email').value;
	var pw1 = document.getElementById('pw1').value;
	var pw2 = document.getElementById('pw2').value;
	var add = document.getElementById('address').value;
	var city = document.getElementById('city').value;
	var state = document.getElementById('state').value;
	var zip = document.getElementById('zip').value;
	var country = document.getElementById('countries').value;
	var cont = document.getElementById('continents').value;
	var phone = document.getElementById('phone').value;
	var bday = document.getElementById('bday').value;
	var termsbox = document.getElementById('termsbox').checked;


	var isOkay;

	if(fn == "") {
		document.getElementById('fname').classList.add('error-set');
		isOkay = false;
	} else {
		document.getElementById('fname').classList.remove('error-set');
	}
	if(ln == "") {
		document.getElementById('lname').classList.add('error-set');
		isOkay = false;
	} else {
		document.getElementById('lname').classList.remove('error-set');
	}
	if(email == "") {
		document.getElementById('email').classList.add('error-set');
		isOkay = false;
	} else {
		document.getElementById('email').classList.remove('error-set');
	}
	if(pw1 == "") {
		document.getElementById('pw1').classList.add('error-set');
		isOkay = false;
	} else {
		document.getElementById('pw1').classList.remove('error-set');
	}
	if(pw2 == "") {
		document.getElementById('pw2').classList.add('error-set');
		isOkay = false;
	} else {
		document.getElementById('pw2').classList.remove('error-set');
	}
	if(add == "") {
		document.getElementById('address').classList.add('error-set');
		isOkay = false;
	} else {
		document.getElementById('address').classList.remove('error-set');
	}
	if(city == "") {
		document.getElementById('city').classList.add('error-set');
		isOkay = false;
	} else {
		document.getElementById('city').classList.remove('error-set');
	}
	if(state == "") {
		document.getElementById('state').classList.add('error-set');
		isOkay = false;
	} else {
		document.getElementById('state').classList.remove('error-set');
	}
	if(zip == "") {
		document.getElementById('zip').classList.add('error-set');
		isOkay = false;
	} else {
		document.getElementById('zip').classList.remove('error-set');
	}
	if(country == "") {
		document.getElementById('countries').classList.add('error-set');
		isOkay = false;
	} else {
		document.getElementById('countries').classList.remove('error-set');
	}
	// if(cont == "") {
	// 	document.getElementById('continents').style.border = "2px solid red";
	// 	document.getElementById('continents').style.backgroundColor = "#ef8383";
	// 	isOkay = false;
	// }
	if(phone == "") {
		document.getElementById('phone').classList.add('error-set');
		isOkay = false;
	} else {
		document.getElementById('phone').classList.remove('error-set');
	}
	if(bday == "") {
		document.getElementById('bday').classList.add('error-set');
		isOkay = false;
	} else {
		document.getElementById('bday').classList.remove('error-set');
	}
	if(!termsbox) {
		document.getElementById('tos').classList.add('error-set');
		document.getElementById('tos-msg').classList.remove('hidden');
		isOkay = false;
	} else {
		document.getElementById('tos').classList.remove('error-set');
		document.getElementById('tos-msg').classList.add('hidden');
	}

	return isOkay;


};