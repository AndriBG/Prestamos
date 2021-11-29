
<h1 class="text-center mt-4 display-4">Calculadora de Préstamos</h1>

<div class="row mt-5 p-2">
	<div class="col-xl-6 col-md-6">
		<div class="row">
			<div class="col-xl-6 col-md-6">
				<div class="cont-img">
					<img src="<?= base_url('public/img/fondo.jpg'); ?>" alt="imagen calculadora">
				</div>
			</div>
			<div class="col-xl-6 col-md-6">
				<form>
					<div class="form-group mb-3">
						<label for="capital">Capital</label>
						<input type="number" class="form-control form-control-sm" id="capital">
					</div>
					<div class="form-group mb-3">
						<label for="amount_of_fees">Cantidad de cuotas</label>
						<input type="number" class="form-control form-control-sm" id="fees">
					</div>
					<div class="form-group mb-3">
						<select class="custom-select" name="freq" id="frequency">
							<option >Frecuencia</option>
							<option value="1">Diario</option>
							<option value="2">Semanal</option>
							<option value="3">Quincenal</option>
							<option value="4">Mensual</option>
						</select>
					</div>
					<div class="form-group mb-3">
						<label for="start_date">Fecha de inicio</label>
						<input type="date" name="date" class="form-control" id="start_date">
					</div>
					<button type="button" id="calculate" class="btn btn-primary">Calcular</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-xl-6 col-md-6">
	<div class="table-responsive mt-4">
		<table class="table table-hover bg-ligth" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>Cuota</th>
					<th>Fecha</th>
					<th>Monto</th>
				</tr>
			</thead>
			<tbody id="body-loan">

			</tbody>
		</table>
	</div>
	</div>
</div>
