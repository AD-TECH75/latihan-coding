let balance = document.getElementById("balance");
let transaction = document.getElementById("transaction");
let amount = document.getElementById("amount");
let type = document.getElementById("type");
let tracker = document.getElementById("tracker");
let button = document.getElementById("add");

let nominal = JSON.parse(localStorage.getItem("nominal")) || [];
let currentFilter = "all";

function render() {
	tracker.innerHTML = "";

	let total = 0;

	nominal.forEach((trx, index) => {
		if (currentFilter !== "all" && trx.type !== currentFilter) {
			return;
		}

		const li = document.createElement("li");
		li.classList.add(trx.type);

		const value = trx.type === "income" ? trx.amount : -trx.amount;

		total += value;

		li.innerHTML = `
		<span>${trx.transaction}</span>
        <span>
		${trx.type === "income" ? "+" : "-"}${idrFormat(trx.amount)}
		</span>
        <button onclick='deletetransaction(${index})'>x</button>
        `;

		tracker.appendChild(li);
	});

	balance.value = idrFormat(total);
	localStorage.setItem("nominal", JSON.stringify(nominal));
}

function idrFormat(number) {
	return new Intl.NumberFormat("id-ID", {
		style: "currency",
		currency: "IDR",
		minimumFractionDigits: 0,
	}).format(number);
}

function setFilter(type) {
	currentFilter = type;
	render();
}

function addtransaction() {
	if (transaction.value == "" || amount.value == "") return;

	nominal.push({
		transaction: transaction.value,
		amount: Number(amount.value),
		type: type.value,
	});

	transaction.value = "";
	amount.value = "";

	render();
}

function deletetransaction(index) {
	nominal.splice(index, 1);
	render();
}

button.addEventListener("click", addtransaction);
render();
