<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<div>
			<p>Beste {{{ $user->firstname }}},</p>
			<p>
				Hartelijk dank voor je registratie bij voertuigverhuurbedrijf LeenMeij. LeenMeij is een
				van de grootste aanbieders voor voertuigverhuur in de regio Leiden en hopen u van dienst te
				kunnen zijn bij het zoeken naar een voertuig. 
			</p>
			<p>
				Je kunt nu inloggen op <a href="http://leenmeij.vblinden.com" target="_blank">de LeenMeij website</a> met
				de volgende gegevens.
			</p>
			<p>
				<strong>E-mail:</strong> {{ $user->email }}<br/>
				<strong>Wachtwoord:</strong> Uw persoonlijk gekozen wachtwoord.
			</p>

			<p>
				Veel plezier met uw toekomstige gehuurde voertuigen!
			</p>
		</div>
	</body>
</html>