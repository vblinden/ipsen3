<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<div>
			<p>Beste {{{ $user->firstname }}},</p>
			<p>
				Hartelijk dank voor je reservering bij voertuigverhuurbedrijf LeenMeij. 
			</p>
			<p>
				<strong>Auto:</strong> {{ $reservation->vehicle->brand }} {{ $reservation->vehicle->model }}<br/>
				<strong>Datums:</strong> {{ $reservation->startdate }} t/m {{ $reservation->enddate }} <br/>
				<strong>Bedrag:</strong> {{ $reservation->vehicle->hourlyrate * 24 }}
			</p>
			<p>
				Als u vragen heeft kunt u altijd bellen. Nailed it madderfakker. IYEAH.
			</p>
			<p>
				Met vriendelijke groet,
			</p>
			<p>
				LeenMeij Voertuigverhuur BV.
			</p>
		</div>
	</body>
</html>