<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<div>
			<p>Beste {{{ $user->firstname }}},</p>
		
			<p>Hartelijk dank voor je reservering bij voertuigverhuurbedrijf LeenMeij. </p>
			<p>Wij stellen uw vertrouwen erg op prijs, en hopen u in de toekomst nog verder van dienst te kunnen zijn.</p>
			
			<p>Volgens ons systeem heeft u de {{ $reservation->vehicle->brand }} {{ $reservation->vehicle->model }} gereserveerd</p>
			<p>van  {{ $reservation->startdate }} t/m {{ $reservation->enddate }}.</p>

			<br>
			<p>Hieronder een gedetailleerd overzicht van uw reservering. Controleer de gegevens goed.</p>
			<hr>
			<br/>
			<div>
				<a>
					<img src="http://leenmeij.vblinden.com/uploaded/vehicles/{{ $reservation->vehicle->image }}" alt="{{ $reservation->vehicle->brand }} {{ $reservation->vehicle->model }}" style="width: 50%; height: 50%">
				</a>
			</div>

			<div>
				<table style="border-collapse:collapse;border-spacing:0">
					<thead>
						<tr>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Reserveringsnummer</td>
							<td><strong>{{ $reservation->id }}</strong></td>
						</tr>
						<tr>
							<td>Voertuig</td>
							<td><strong>{{ $reservation->vehicle->brand }} {{ $reservation->vehicle->model }}</strong></td>
						</tr>
						<tr>
							<td>Prijs per dag</td>
							<td><strong>€ {{ $reservation->vehicle->hourlyrate * 24 }}</strong></td>
						</tr>
						@foreach ($reservation->vehicleoptions as $vehicleoption)
						<tr>
							<td>{{ $vehicleoption->name }}</td>
							<td><strong>€ {{ $vehicleoption->price * 24 }}</strong></td>
						</tr>
						@endforeach
						<tr>
							<td>Aantal dagen</td>
							<td><strong>{{ Carbon::parse($reservation->startdate)->diffInDays(Carbon::parse($reservation->enddate)); }} dag(en)</strong></td>
						</tr>
						<tr>
							<td>Datums:</td>
							<td><strong>van: {{ $reservation->startdate }} t/m {{ $reservation->enddate }} </strong></td>
						</tr>
						<!-- Intentionally left blank -->
						<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Totaal: </td>
							<td><strong>€ {{ $invoice->total }}</strong></td>
						</tr>
					</tbody>
				</table>
			</div>
			<br/>
			<hr>
			<br>
			<p>Mocht er iets niet kloppen aan deze gegevens, dan kunt u contact opnemen met de klantenservice van LeenMeij.</p>
			<p>Onze medewerkers zullen er alles aan doen om uw reservering op orde te krijgen.</p>
			<p>
				LeenMeij Voertuigverhuur BV.
			</p>
		</div>
	</body>
</html>