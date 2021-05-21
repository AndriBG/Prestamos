var cap = document.getElementById('capital');
var fees = document.getElementById('fees');
var freq = document.getElementById('frequency');
var date = document.getElementById('start_date');
var btnCalc = document.getElementById('calculate');

if (btnCalc) {

	btnCalc.addEventListener('click', function () {

		if (validateFiels()) {

			let data = {
				"capital": cap.value,
				"amt_fees": fees.value,
				"freq": freq.value,
				"s_date": date.value.replace(/-/g, '/')
			}

			$.ajax({

				url: "Calcular",
				type: "post",
				data: data,

			}).done(function (res) {

				showTable();

			});

		} else {

			Swal.fire({
				position: 'center',
				icon: 'warning',
				title: '!Debe llenar todo los campos!',
				showConfirmButton: false,
				timer: 1100
			})

		}
	});
}

function validateFiels() {
	let isValid = true;

	let value_cap = cap.value;
	let value_fees = fees.value;
	let value_freq = freq.value;
	let value_date = date.value;

	if (value_cap == '' || value_cap == undefined || value_cap == null) {
		isValid = false;
	}

	if (value_fees == '' || value_fees == undefined || value_fees == null) {
		isValid = false;
	}

	if (value_freq == '' || value_freq == undefined || value_freq == null || value_freq == 'Frecuencia') {

		if (value_freq != 1 || value_freq != 2 || value_freq != 3 || value_freq != 4) {

			isValid = false;
		}
	}

	if (value_date == '' || value_date == undefined || value_date == null) {
		isValid = false;
	}

	return isValid;
}

function showTable() {

	switch (freq.value) {
		case "1":
			createFee(1);
			break;
		case "2":
			createFee(7);
			break;
		case "3":
			createFee(15);
			break;
		case "4":
			createFee(30);
			break;
	}
}

function createFee(value) {

	let myDate = new Date(date.value.replace(/-/g, '/'));

	let amount_of_fee = cap.value / fees.value;

	let table = document.getElementById('body-loan');

	table.innerHTML = `
	<tr>
		<td>1</td>
		<td>${myDate.toLocaleDateString()}</td>
		<td>${amount_of_fee}</td>
	</tr>`;

	for (let i = 2; i <= fees.value; i++) {

		let tdDate = table.lastElementChild.children[1].textContent;

		let bloc = `
			<tr>
				<td>${i}</td>
				<td>${convertingDate(tdDate,value)}</td>
				<td>${amount_of_fee}</td>
			</tr>`;

		table.innerHTML += bloc;
	}
}

function convertingDate(tdDate, value) {

	let delim1 = tdDate.indexOf("/");
	let delim2 = tdDate.lastIndexOf("/");

	let day = parseInt(tdDate.substring(0, delim1), 10);

	let month = parseInt(tdDate.substring(delim1 + 1, delim2), 10);

	let year = parseInt(tdDate.substring(delim2 + 1), 10);

	let newDate = new Date(year, month - 1, day);

	newDate.setDate(newDate.getDate() + value);

	return newDate.toLocaleDateString();
}
