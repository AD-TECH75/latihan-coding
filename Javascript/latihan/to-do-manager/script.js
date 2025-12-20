let input = document.getElementById("todoInput");
let button = document.getElementById("addButton");
let list = document.getElementById("todoList");

let todo = JSON.parse(localStorage.getItem("todo")) || [];

function render() {
	list.innerHTML = "";

	todo.forEach((item, index) => {
		const li = document.createElement("li");

		if (item.done) {
			li.classList.add("done");
		}

		li.innerHTML = `
        <span>${item.text}</span>
        <div>
        <button onclick="toggleDone(${index})">✔</button>
        <button onclick="deleteTodo(${index})">✖</button>
        </div>
        `;

		list.appendChild(li);
	});
	localStorage.setItem("todo", JSON.stringify(todo));
}

function add() {
	if (input.value.trim() === "") return;

	todo.push({
		text: input.value,
		done: false,
	});

	input.value = "";
	render();
}

function toggleDone(index) {
	todo[index].done = !todo[index].done;
	render();
}

function deleteTodo(index) {
	todo.splice(index, 1);
	render();
}

button.addEventListener("click", add);
render();
