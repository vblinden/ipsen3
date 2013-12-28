@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		@if(Session::has('success'))
		<div class="alert alert-success">
			<p><strong>Succes!</strong> {{ Session::get('success') }}</p>
		</div>
		@endif
		@if(Session::has('failed'))
		<div class="alert alert-danger">
			<p><strong>Fout!</strong> {{ Session::get('failed') }}</p>
		</div>
		@endif
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div id="carousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel" data-slide-to="0" class="active"></li>
				<li data-target="#carousel" data-slide-to="1"></li>
				<li data-target="#carousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
				<a href="/vehicle/detail/13">
						<img src="/img/slide2.png" alt="De allergekste AUDI!">
						<div class="carousel-caption">
							Nieuwe Suzuki GSX-R 1000 is vanaf nu te huur!
						</div>
					</a>
				</div>
				<div class="item">
					<a href="/vehicle/detail/17">
						<img src="/img/slide1.png" alt="De allergekste AUDI!">
						<div class="carousel-caption">
							Reseveer nu de nieuwe Audi A6 2013! Voor maar €299,00 per dag! 
						</div>
					</a>
				</div>
				<div class="item">
				<a href="/vehicle/detail/23">
					<img src="/img/slide3.png" alt="De allergekste AUDI!">
					<div class="carousel-caption">
						Bedrijfswagens nodig? LeenMeij heeft een uitgebreid aanbod van bedrijfswagens.
					</div>
				</a>
				</div>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>
	</div>
</div>


<!-- style="background-color: #4f83c4;" -->
<div class="row" style="margin-top: 20px;">
	<div class="col-lg-9">
		<div class="panel panel-default">
			<div class="panel-heading">Laatste nieuws</div>
			<div class="panel-body">
				De afgelopen maanden zijn wij druk bezig geweest met het ontwikkelen van een nieuwe website, die binnenkort volledig online zal komen.
				De website heeft een nieuwe frisse uitstraling gekregen, en beschikt over talloze nieuwe functies en mogelijkheden om u als klant nog beter van dienst te kunnen zijn.
				<br><br>
				De nieuwe website voor LeenMeij is ontwikkeld in samenwerking met Vinnie&Deampie enterprises, een full-service internetbureau dat gespecialiseerd is in het bedenken, ontwerpen en bouwen van hoogwaardige internetapplicaties. De nieuwe website is overzichtelijker en gebruiksvriendelijker, waar we er blij mee zijn.
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">Waarom LeenMeij</div>
			<div class="panel-body">
				<div class="col-lg-8" style="padding: 0px;">
				 LeenMeij heeft een uitgebreid wagenpark, waardoor we een completer aanbod hebben voor de klanten. Hierdoor kunnen wij het u als klant een stuk makkelijker maken in het maken van een keuze. 
				 <br><br>
				 Daarbij garanderen wij een actueel aanbod op de website tegen scherpe prijzen. Hierdoor proberen we de kwaliteit te waarborgen, en het u als klant zo makkelijk mogelijk te maken. Daarboven op hebben we de 6 sterren garantie van de BOVAG verkregen, dit betekend alleen maar meer zekerheid en service voor u!
				</div>
				<div class="col-lg-4">
					<ul class="bulletless">
						<li><span style="color: green;">✔</span> Kwaliteit</li>
						<li><span style="color: green;">✔</span> Actueel aanbod</li>
						<li><span style="color: green;">✔</span> Scherpe prijzen</li>
						<li><span style="color: green;">✔</span> Bovag 6 sterren kwalificatie</li>
						<li><span style="color: green;">✔</span> Gratis inleveren bij elke vestiging</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 visible-lg">
		<a class="twitter-timeline" href="https://twitter.com/twitterapi" data-widget-id="407876171682959360">Tweets door LeenMeij</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
</div>

<div class="row visible-lg">
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading" style="padding: 0px;"><img src="/img/panel2.png" /></div>
			<div class="panel-body">
				Tijdens deze winter maanden is veiligheid op de weg de hoogste prioriteit. Huur daarom nu alle voertuigen voorzien van een set winterbanden.
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading" style="padding: 0px;"><img src="/img/panel3.png" /></div>
			<div class="panel-body">
				Wij bieden vanaf nu meer opties bij het verhuren van voertuigen onder andere: navigatiesystemen, portable dvd speler, dakdrager, skibox enzovoort.
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading" style="padding: 0px;"><img src="/img/panel1.png" /></div>
			<div class="panel-body">
				Als je twee maanden van te voren een voertuig reseveert bij LeenMeij ontvang je automatisch 5% korting op je resevering.
			</div>
		</div>
	</div>
</div>


@stop