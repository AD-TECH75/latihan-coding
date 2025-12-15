const display = document.querySelector(".display-calculator");
const buttons = document.getElementById("calculator-button");

let expression = "";

buttons.addEventListener("click", (event) => {
	const btn = event.target.closest("button");
	if (!btn) return;

	const value = btn.value;

	// reset
	if (btn.classList.contains("delete")) {
		expression = "";
		display.value = "0";
		return;
	}

	// equals
	if (btn.classList.contains("equals")) {
		try {
			expression = expression.replace(/×/g, "*").replace(/÷/g, "/");
			const result = eval(expression);
			display.value = result;
			expression = result.toString();
		} catch {
			display.value = "Error";
			expression = "";
		}
		return;
	}

	// angka & operator
	if (expression === "" && value === ".") {
		expression = "0.";
	} else {
		expression += value;
	}

	display.value = expression;
});
