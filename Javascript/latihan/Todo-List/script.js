let text = document.getElementById("text");
let submit = document.getElementById("submit");
let todo = document.getElementById("todo");

let nama = JSON.parse(localStorage.getItem("todo-data")) || [];

function render() {
	todo.innerHTML = "";

	nama.forEach((item, index) => {
		const li = document.createElement("li");
		li.classList.add("list");

		const content = document.createElement("div");
		content.classList.add("content");
		if (item.done) content.classList.add("done");

		const span = document.createElement("span");
		span.textContent = item.text;

		const btnDone = document.createElement("button");
		btnDone.textContent = "✔";
		btnDone.classList.add("btn-done");
		btnDone.setAttribute("data-index", index);

		const btnClear = document.createElement("button");
		btnClear.textContent = "✖";
		btnClear.classList.add("btn-clear");
		btnClear.setAttribute("data-index", index);

		content.appendChild(span);
		content.appendChild(btnDone);
		content.appendChild(btnClear);

		li.appendChild(content);
		todo.appendChild(li);
	});
	localStorage.setItem("todo-data", JSON.stringify(nama));
}

function add() {
	if (text.value.trim() === "") return;

	nama.push({
		text: text.value,
		done: false,
	});
	text.value = "";
	render();
}

todo.addEventListener("click", (attribute) => {
	const index = attribute.target.getAttribute("data-index");

	if (attribute.target.classList.contains("btn-done")) {
		nama[index].done = !nama[index].done;
		render();
	}

	if (attribute.target.classList.contains("btn-clear")) {
		nama.splice(index, 1);
		render();
	}
});

submit.addEventListener("click", () => {
	if (text.value == "") {
		alert("your input is blank");
		return;
	}
	add();
});

render();
