ibg();

function ibg() {

	let ibg = document.querySelectorAll(".ibg");
	for (var i = 0; i < ibg.length; i++) {
		if (ibg[i].querySelector('img')) {
			ibg[i].style.backgroundImage = 'url(' + ibg[i].querySelector('img').getAttribute('src') + ')';
		}
	}
}

function addInputField() {
	var container = document.getElementById("inputContainer");
	var input = document.createElement("input");
	input.type = "text";
	input.name = "img";
	container.appendChild(input);
	container.appendChild(document.createElement("br"));
}
