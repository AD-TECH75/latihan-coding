let toggle = document.getElementById("toggle");
let bodyElement = document.querySelector("body");

function changeTheme() {
	if (toggle.checked) {
		localStorage.setItem("theme", "dark");
		bodyElement.classList.add("dark");
	} else {
		localStorage.setItem("theme", "light");
		bodyElement.classList.remove("dark");
	}
}

let theme = localStorage.getItem("theme");

if (theme === "dark") {
	toggle.checked = true;
	changeTheme();
} else {
	toggle.checked = false;
	changeTheme();
}

toggle.addEventListener("change", changeTheme);
