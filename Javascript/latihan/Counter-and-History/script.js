let number = document.getElementById("number");
let plus = document.getElementById("plus");
let minus = document.getElementById("minus");
let reset = document.getElementById("reset");
let riwayat = document.getElementById("history");

let count = 0;
let save = [];

function render() {
	number.textContent = count;
	riwayat.innerHTML = "";

	save.forEach((text) => {
		let li = document.createElement("li");
		li.textContent = text;
		riwayat.appendChild(li);
	});
}

function add() {
	count += 1;
	save.push(`nilai berubah ke-${count}`);
	render();
}

function substract() {
	if (count === 0) {
		alert("can't substract under zero");
		return;
	}

	count -= 1;
	save.push(`nilai berubah ke-${count}`);
	render();
}

function resetNumber() {
	count = 0;
	save.push(`reset nilai menjadi ${count}`);
	render();
}

plus.addEventListener("click", add);
minus.addEventListener("click", substract);
reset.addEventListener("click", resetNumber);

render();
