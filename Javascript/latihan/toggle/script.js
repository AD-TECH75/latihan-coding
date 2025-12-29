let display = document.getElementById("display");
let toggle = document.getElementById("toggle");

function updateDisplay() {
	if (toggle.checked) {
		display.textContent = "on";
	} else {
		display.textContent = "off";
	}
}

updateDisplay();

toggle.addEventListener("change", () => {
	updateDisplay();
});
