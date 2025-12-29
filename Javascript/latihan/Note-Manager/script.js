/**
 *  @typedef {Object} Note
 *  @property {number} id
 *  @property {string} title
 *  @property {string} description
 *  @property {boolean} done
 */

/**
 *  @typedef {Object|null} EditorState
 *  @property {number} editId
 */

// initiate and state
let title = document.getElementById("title");
let description = document.getElementById("description");
let submit = document.getElementById("submit");
let tableList = document.getElementById("table-list");
let list = document.getElementById("list");

/** @type {EditorState} */
let initialState = {
	notes: JSON.parse(localStorage.getItem("note")) || [],
	editor: null, // {id}
};
let state = initialState;

/** @type {actionType} */
const actionType = {
	ADD: "ADD_NOTE",
	UPDATE: "UPDATE_NOTE",
	DELETE: "DELETE_NOTE",
	TOGGLE: "TOGGLE_NOTE",
	EDIT_START: "EDIT_START",
	EDIT_END: "EDIT_END",
};

// data logic/core logic

function reducer(state, action) {
	switch (action.type) {
		case actionType.ADD:
			return {
				...state,
				notes: [
					...state.notes,
					{
						id: Date.now(),
						title: action.payload.title,
						description: action.payload.description,
						done: false,
					},
				],
			};
		case actionType.UPDATE:
			return {
				...state,
				notes: state.notes.map((n) =>
					n.id === action.payload.id ? { ...n, ...action.payload.data } : n
				),
			};
		case actionType.DELETE:
			return {
				...state,
				notes: state.notes.filter((n) => n.id !== action.payload.id),
			};
		case actionType.TOGGLE:
			return {
				...state,
				notes: state.notes.map((n) =>
					n.id === action.payload.id ? { ...n, done: !n.done } : n
				),
			};
		case actionType.EDIT_START:
			return {
				...state,
				editor: { id: action.payload.id },
			};
		case actionType.EDIT_END:
			return {
				...state,
				editor: null,
			};
		default:
			return state;
	}
}

function dispatch(action) {
	state = reducer(state, action);
	persist();
	render(createViewModel(state.notes));
}

// form and input handling
function handleSubmit() {
	const titleValue = title.value.trim();
	const descriptionValue = description.value.trim();
	if (!titleValue || !descriptionValue) return;

	if (state.editor) {
		dispatch({
			type: actionType.UPDATE,
			payload: {
				id: state.editor.id,
				data: { title: titleValue, description: descriptionValue },
			},
		});
		dispatch({ type: actionType.EDIT_END });
	} else {
		dispatch({
			type: actionType.ADD,
			payload: { title: titleValue, description: descriptionValue },
		});
	}

	resetForm();
}

function checkInput() {
	const isEmpty = title.value.trim() === "" || description.value.trim() === "";

	submit.disabled = isEmpty;
}

function enterEditMode(id) {
	const item = state.notes.find((n) => n.id === id);
	if (!item) return;

	title.value = item.title;
	description.value = item.description;

	dispatch({ type: actionType.EDIT_START, payload: { id } });
	submit.textContent = "Update";
	checkInput();
}

function resetForm() {
	title.value = "";
	description.value = "";
	dispatch({ type: actionType.EDIT_END });
	submit.textContent = "Submit";
}

// state management and persistance
function persist() {
	localStorage.setItem("note", JSON.stringify(state.notes));
}

function update() {
	checkInput();
	persist();
	render(createViewModel(state.notes));
}

// rendering engine
/**
 * @param {note[]} notes
 */
function createViewModel(notes) {
	return {
		isEmpty: notes.length === 0,
		rows: notes.map((n, index) => ({
			no: index + 1,
			id: n.id,
			title: n.title,
			description: n.description,
			done: n.done,
		})),
	};
}

function renderEmpty() {
	let tr = document.createElement("tr");
	tableList.style.height = "100%";
	tr.classList.add("empty-row");

	let td = document.createElement("td");
	td.setAttribute("colspan", "4");
	td.textContent = "BELUM ADA CATATAN";

	tr.appendChild(td);
	list.appendChild(tr);
}

function showConfirm(onOK) {
	const divConfirm = document.createElement("div");
	divConfirm.classList.add("confirm");

	const divConfirmContainer = document.createElement("div");
	divConfirmContainer.classList.add("confirm-container");

	const h1Confirm = document.createElement("h1");
	h1Confirm.textContent = "confirm-delete";

	const pConfirm = document.createElement("p");
	pConfirm.textContent = "are you sure you want to delete this note?";

	const divButtonConfirm = document.createElement("div");
	divButtonConfirm.classList.add("confirm-button");

	const buttonOk = document.createElement("button");
	buttonOk.textContent = "ok";
	buttonOk.addEventListener("click", () => {
		onOK(); // menjalakan fungsi jika klik ok
		document.body.removeChild(divConfirm); // menurtup confirm page
	});

	const buttonCancel = document.createElement("button");
	buttonCancel.textContent = "cancel";
	buttonCancel.addEventListener("click", () => {
		document.body.removeChild(divConfirm); // menutup dan membatalkan penghapusan
	});

	divButtonConfirm.append(buttonOk, buttonCancel);
	divConfirmContainer.append(h1Confirm, pConfirm, divButtonConfirm);
	divConfirm.appendChild(divConfirmContainer);
	document.body.appendChild(divConfirm);
}

/**
 *  @param {{ no:number, id:number, title:string, description:string, done:boolean }} row
 */
function renderRow(row) {
	let tr = document.createElement("tr");

	let tNum = document.createElement("td");
	tNum.textContent = row.no;

	let tTitle = document.createElement("td");
	tTitle.className = `title ${row.done ? "done" : ""}`;
	tTitle.textContent = row.title;

	let tDescription = document.createElement("td");
	tDescription.className = `description ${row.done ? "done" : ""}`;
	tDescription.textContent = row.description;

	let tAct = document.createElement("td");
	tAct.classList.add("act");
	tAct.appendChild(createActionButton(row.id));

	tr.append(tNum, tTitle, tDescription, tAct);
	list.appendChild(tr);
}

/**
 *  @param {{id:number}} id
 */
function createActionButton(id) {
	const wrap = document.createElement("div");
	wrap.classList.add("divBtn");

	["Edit", "Done", "Delete"].forEach((type) => {
		const btn = document.createElement("button");
		btn.className = `btn${type}`;
		btn.dataset.id = id;
		btn.textContent = type === "Edit" ? "✎" : type === "Done" ? "✔" : "X";
		wrap.appendChild(btn);
	});

	return wrap;
}

/**
 *  @param {{isEmpty: boolean, rows: any[]}} vm
 */
function render(vm) {
	list.innerHTML = "";
	tableList.style.height = vm.isEmpty ? "100%" : "auto";

	if (vm.isEmpty) {
		renderEmpty();
		return;
	}

	vm.rows.forEach(renderRow);
}

list.addEventListener("click", (e) => {
	const id = Number(e.target.dataset.id);
	if (!id) return;

	if (e.target.classList.contains("btnEdit")) {
		dispatch({ type: actionType.EDIT_START, payload: { id } });
		enterEditMode(id);
	}

	if (e.target.classList.contains("btnDone")) {
		dispatch({ type: actionType.TOGGLE, payload: { id } });
	}

	if (e.target.classList.contains("btnDelete")) {
		dispatch({ type: actionType.DELETE, payload: { id } });
	}
});

// eventListener and initialization
submit.addEventListener("click", handleSubmit);
title.addEventListener("input", checkInput);
description.addEventListener("input", checkInput);

render(createViewModel(state.notes));
