<div class="row">
	<div class="col-lg-12" style="border-bottom: 5px solid #f86b02; height: 50px;">
		<div class="col-sm-4">
			<img src="/img/ing.jpg" alt="ING logo" style="width:100%;" />
		</div>
		<div class="col-lg-8">
		</div>
	</div>
	<div class="col-lg-12">
		<h3>Uw iDeal betaling afronden</h3>
		<p>Vul hieronder uw TAN code in om de betaling aan LeenMeij ltd. te voltooien.</p>
	</div>
	<div class="col-lg-12">
		<table class="table table-striped">
			<thead>
				<td></td>
				<td></td>
			</thead>
			<tbody>
				<tr>
					<td>Transactienummer:</td>
					<td><strong>{{ $reservation->id }}</strong></td>
				</tr>
				<tr>
					<td>Bedrag: </td>
					<td><strong>€ {{$totalPrice + $vat}}</strong></td>
				</tr>
				<tr>
					<td>Van betaalrekening: </td>
					<td><strong>{{ rand(100000000, 999999999); }}</strong></td>
				</tr>
				<tr>
					<td>Naam begunstigde:</td>
					<td><strong>LeenMeij voertuigverhuur Leiden</strong></td>
				</tr>
				<tr>
					<td>Datum:</td>
					<td><strong>{{ Carbon::now()->formatLocalized('%A %d %B %Y'); }}</strong></td>
				</tr>
				<tr>
					<td>Tancode:</td>
					<td><strong>{{ Form::text('tancode', null, array('class' => 'form-control')); }}</strong></td>
				</tr>
			</tbody>
		</table>
		<p>Controleer de bovenstaande gegevens goed voordat u de betaling voltooid.</p>
	</div>
</div>