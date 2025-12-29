let display = document.getElementById("display");
let button = document.getElementById("btn");

let count = 0;

button.addEventListener("click", function () {
	count += 1;
	display.textContent = count;
});
