@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
			<h1>FAQ <small>Veelgestelde vragen</small></h1>
		</div>
		<p>Hieronder vind u een aantal vragen die veelgesteld zijn door onze klanten.</p>
	</div>
</div>

<div class='row' style="margin-bottom: 20px;">
	<div class='col-lg-12'>
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							Waarom LeenMeij?
						</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body">
						LeenMeij heeft een uitgebreid wagenpark, waardoor we een completer aanbod hebben voor de klanten. Hierdoor kunnen wij het u als klant een stuk makkelijker maken in het maken van een keuze. 
						<br><br>
						Daarbij garanderen wij een actueel aanbod op de website tegen scherpe prijzen. Hierdoor proberen we de kwaliteit te waarborgen, en het u als klant zo makkelijk mogelijk te maken. Daarboven op hebben we de 6 sterren garantie van de BOVAG verkregen, dit betekend alleen maar meer zekerheid en service voor u!
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
							Op welke manieren kan ik betalen?
						</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse">
					<div class="panel-body">
						<p>LeenMeij biedt u de mogelijkheid om op 3 verschillende manieren te betalen.</p> <br>

						<strong>iDeal</strong>
						<p>Via de website geven we de mogelijkheid om het voertuig volledig te betalen via de betaalmodule van iDeal. Deze methode is verwerkt op de website.</p>
						<strong>PayPal</strong>
						<p>De betalingsmodule van PayPal is ook in de website verwerkt. Via deze module kunt u net als bij iDeal een directe betaling doen van het volledige bedrag van het voertuig.</p>
						<strong>Vooruitbetaling</strong>
						<p>Bij een vooruitbetaling maakt u het gehele bedrag over op de rekening van LeenMeij. Zodra LeenMeij deze betaling heeft ontvangen, zal de financiele afdeling een bevesting sturen naar u.</p>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
							Wat gebeurd er als ik schade rij?
						</a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse">
					<div class="panel-body">
						Is er tijdens de huurperiode kleine schade aan de huurauto ontstaan zoals lakschade of een (kleine) deuk, dan is het niet nodig om contact op te nemen met LeenMeij. Deze schade zal bij inlevering van uw huurauto door een vestigingsmedewerker worden opgenomen op een schadeformulier en worden afgehandeld.
						<br>
						Krijgt u tijdens de huurperiode ernstige schade aan de huurauto door een aanrijding met een ander voertuig, een lekke band, inbraak, bedreiging, vandalisme of diefstal dan dient u de volgende stappen te doorlopen:
						<br>

						- Rijd niet verder met de huurauto;<br>
						- Neem contact op met de politie;<br>
						- Vul het Europees schadeformulier in (deze bevindt zich in het dashboardkastje);<br>
						- Zorg dat u en de tegenpartij, beiden het formulier ondertekent;<br>
						- Meld de schade z.s.m. bij LeenMeij;<br>
						- Binnen openingstijden bij één van onze vestigingen in Nederland;<br>
						- Lever het Europees schadeformulier in bij één van onze vestigingen.
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
							Wat is de kwaliteit van het wagenpark?
						</a>
					</h4>
				</div>
				<div id="collapseFour" class="panel-collapse collapse">
					<div class="panel-body">
						Ons wagenpark bevindt zich in een uitstekende conditie en de huurauto’s worden goed technisch onderhouden. De meeste personenauto’s zijn niet ouder dan 9 maanden. Bestel- en vrachtauto’s zijn meestal niet ouder dan 3 tot 4 jaar. 
						<br> 
						Bovendien worden onze huurauto’s voor een nieuwe verhuring altijd goed schoongemaakt en gecontroleerd. LeenMeij is lid van BOVAG en trotste bezitter van de BOVAG 6 sterren kwalificatie. LeenMeij wordt door BOVAG regelmatig gecontroleerd op kwaliteit en service.
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop