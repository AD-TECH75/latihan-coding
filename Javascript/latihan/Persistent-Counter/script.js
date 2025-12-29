let display = document.getElementById("display");
let plus = document.getElementById("plus");
let minus = document.getElementById("minus");

let count = parseInt(localStorage.getItem("count")) || 0;

function render() {
	display.textContent = count;
	localStorage.setItem("count", count);
}

function add() {
	count += 1;
	render();
}

function substract() {
	if (count <= 0) {
		alert("can't substract bellow zero");
		return;
	} else {
		count -= 1;
		render();
	}
}

plus.addEventListener("click", add);
minus.addEventListener("click", substract);

render();
